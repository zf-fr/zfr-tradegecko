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
    public function testStopRetryingAfterFiveAttempts()
    {
        $client = new TradeGeckoClient('access_token_123');

        $this->assertFalse($client->retryDecider(6, $this->prophesize(RequestInterface::class)->reveal()));
    }

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
           [400],
           [404],
           [429],
           [500]
        ];
    }

    /**
     * @dataProvider statusCodeProvider
     */
    public function testRetryOnTooManyRequestsStatusCode(int $statusCode)
    {
        $client = new TradeGeckoClient('access_token_123');

        $request  = $this->prophesize(RequestInterface::class)->reveal();
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->shouldBeCalled()->willReturn($statusCode);
        $exception = $this->prophesize(RequestException::class)->reveal();

        if ($statusCode === 429) {
            $this->assertTrue($client->retryDecider(4, $request, $response->reveal(), $exception));
        } else {
            $this->assertFalse($client->retryDecider(4, $request, $response->reveal(), $exception));
        }
    }

    public function testRetryDelay()
    {
        $client = new TradeGeckoClient('access_token_123');

        $this->assertEquals(1000, $client->retryDelay(1));
        $this->assertEquals(2000, $client->retryDelay(2));
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
}
