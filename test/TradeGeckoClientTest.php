<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrTradeGeckoTest;

use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\DescriptionInterface;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Operation;
use GuzzleHttp\Command\ToArrayInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use ZfrTradeGecko\TradeGeckoClient;

/**
 * @author Michaël Gallego
 */
class TradeGeckoClientTest extends \PHPUnit_Framework_TestCase
{
    public function testRetryOnConnectionException()
    {
        $client = new TradeGeckoClient('access_token_123');

        $request   = $this->prophesize(RequestInterface::class)->reveal();
        $response  = $this->prophesize(ResponseInterface::class)->reveal();
        $exception = $this->prophesize(ConnectException::class)->reveal();

        $this->assertTrue($client->retryDecider(4, $request, $response, $exception));
    }

    public function statusCodeProvider()
    {
        return [
           [400, false],
           [404, false],
           [429, true],
           [500, true],
           [503, true]
        ];
    }

    /**
     * @dataProvider statusCodeProvider
     */
    public function testRetryOnTooManyRequestsStatusCode(int $statusCode, bool $shouldRetry)
    {
        $client = new TradeGeckoClient('access_token_123');

        $request  = $this->prophesize(RequestInterface::class)->reveal();
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->shouldBeCalled()->willReturn($statusCode);
        $exception = $this->prophesize(RequestException::class)->reveal();

        if ($statusCode === 429) {
            $response->getHeaderLine('X-Rate-Limit-Reset')->shouldBeCalled()->willReturn(time());
            $this->assertTrue($client->retryDecider(1, $request, $response->reveal(), $exception));
        } else {
            $response->getHeaderLine('X-Rate-Limit-Reset')->shouldNotBeCalled();
            $this->assertEquals($shouldRetry, $client->retryDecider(1, $request, $response->reveal(), $exception));
        }
    }

    public function testMagicMethod()
    {
        $serviceClient = $this->prophesize(GuzzleClient::class);
        $client = new TradeGeckoClient('access_token_123', $serviceClient->reveal());

        $expectedArgs = [
            '@http'  => [
                'headers' => [
                    'Authorization' => 'Bearer access_token_123'
                ]
            ]
        ];

        $command = $this->prophesize(CommandInterface::class);
        $command->getName()->shouldBeCalled()->willReturn('GetCurrentAccount');

        $result = $this->prophesize(ToArrayInterface::class);
        $result->toArray()->shouldBeCalled()->willReturn(['account' => ['id' => 123]]);

        $serviceClient->getCommand('GetCurrentAccount', $expectedArgs)->shouldBeCalled()->willReturn($command->reveal());
        $serviceClient->execute($command)->shouldBeCalled()->willReturn($result->reveal());

        $description = $this->prophesize(DescriptionInterface::class);
        $serviceClient->getDescription()->shouldBeCalled()->willReturn($description->reveal());

        $operation = $this->prophesize(Operation::class);
        $description->getOperation('GetCurrentAccount')->shouldBeCalled()->willReturn($operation->reveal());

        $operation->getData('root_key')->shouldBeCalled()->willReturn('account');

        $payload = $client->getCurrentAccount([]);

        $this->assertEquals(['id' => 123], $payload);
    }

    public function testMagicMethodWithIdempotencyToken()
    {
        $serviceClient = $this->prophesize(GuzzleClient::class);
        $client = new TradeGeckoClient('access_token_123', $serviceClient->reveal());

        $expectedArgs = [
            '@http'  => [
                'headers' => [
                    'Authorization' => 'Bearer access_token_123',
                    'Idempotency-Key' => 'uniqueToken'
                ]
            ]
        ];

        $command = $this->prophesize(CommandInterface::class);
        $command->getName()->shouldBeCalled()->willReturn('UpdateOrder');

        $result = $this->prophesize(ToArrayInterface::class);
        $result->toArray()->shouldBeCalled()->willReturn([
            'order' => ['id' => 456],
        ]);

        $serviceClient->getCommand('UpdateOrder', $expectedArgs)->shouldBeCalled()->willReturn($command->reveal());
        $serviceClient->execute($command)->shouldBeCalled()->willReturn($result->reveal());

        $description = $this->prophesize(DescriptionInterface::class);
        $serviceClient->getDescription()->shouldBeCalled()->willReturn($description->reveal());

        $operation = $this->prophesize(Operation::class);
        $description->getOperation('UpdateOrder')->shouldBeCalled()->willReturn($operation->reveal());

        $operation->getData('root_key')->shouldBeCalled()->willReturn('order');

        $payload = $client->updateOrder(['idempotency_token' => 'uniqueToken']);

        $this->assertEquals(['id' => 456], $payload);
    }
}
