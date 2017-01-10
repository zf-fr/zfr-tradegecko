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

namespace ZfrTradeGecko;

use Generator;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Serializer;
use GuzzleHttp\Command\ToArrayInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * TradeGecko client used to interact with the TradeGecko API
 *
 * @author Michaël Gallego
 *
 * ACCOUNT RELATED METHODS:
 *
 * @method array getAccounts(array $args = []) {@command TradeGecko GetAccounts}
 * @method array getAccount(array $args = []) {@command TradeGecko GetAccount}
 * @method array getCurrentAccount(array $args = []) {@command TradeGecko GetCurrentAccount}
 * @method array createAccount(array $args = []) {@command TradeGecko CreateAccount}
 * @method array updateAccount(array $args = []) {@command TradeGecko UpdateAccount}
 *
 * ADDRESS RELATED METHODS:
 *
 * @method array getAddresses(array $args = []) {@command TradeGecko GetAddresses}
 * @method array getAddress(array $args = []) {@command TradeGecko GetAddress}
 * @method array createAddress(array $args = []) {@command TradeGecko CreateAddress}
 * @method array deleteAddress(array $args = []) {@command TradeGecko DeleteAddress}
 *
 * COMPANIES RELATED METHODS:
 *
 * @method array getCompanies(array $args = []) {@command TradeGecko GetCompanies}
 * @method array getCompany(array $args = []) {@command TradeGecko GetCompany}
 * @method array createCompany(array $args = []) {@command TradeGecko CreateCompany}
 * @method array deleteCompany(array $args = []) {@command TradeGecko DeleteCompany}
 *
 * CONTACT RELATED METHODS:
 *
 * @method array getContacts(array $args = []) {@command TradeGecko GetContacts}
 * @method array getContact(array $args = []) {@command TradeGecko GetContact}
 * @method array createContact(array $args = []) {@command TradeGecko CreateContact}
 * @method array deleteContact(array $args = []) {@command TradeGecko DeleteContact}
 *
 * CURRENCY RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * FULFILLMENT RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * FULFILLMENT LINE ITEM RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * IMAGE RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * INVOICE RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * INVOICE LINE ITEM RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * LOCATION RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * NOTES RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * ORDER RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * ORDER LINE ITEMS RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * PAYMENT TERM RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * PRICE LIST RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * PRODUCT RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * PURCHASE ORDER RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * PURCHASE ORDER LINE ITEM RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * STOCK ADJUSTMENT RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * STOCK ADJUSTMENT LINE ITEM RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * STOCK TRANSFER RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * STOCK TRANSFER LINE ITEM RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * TAX COMPONENT RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * TAX TYPE RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * USER RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * VARIANT RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * ITERATOR METHODS:
 *
 * @method \Traversable getAccountsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetAccounts}
 * @method \Traversable getAddressesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetAddresses}
 * @method \Traversable getCompaniesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetCompanies}
 * @method \Traversable getContactsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetContacts}
 * @method \Traversable getCurrenciesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetCurrencies}
 */
class TradeGeckoClient
{
    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @param string            $accessToken
     * @param GuzzleClient|null $guzzleClient
     */
    public function __construct(string $accessToken, GuzzleClient $guzzleClient = null)
    {
        $this->accessToken  = $accessToken;
        $this->guzzleClient = $guzzleClient ?? $this->createDefaultClient();
    }

    /**
     * Directly call a specific endpoint by creating the command and executing it
     *
     * Using __call magic methods is equivalent to creating and executing a single command. It also supports using optimized
     * iterator requests by adding "Iterator" keyword to the command
     *
     * @param  $method
     * @param  array $args
     * @return array|Generator
     */
    public function __call($method, $args = [])
    {
        // Allow magic method calls for iterators (e.g. $client-><CommandName>Iterator($params))
        if (substr($method, -8) === 'Iterator') {
            return $this->iterateResources(substr($method, 0, -8), $args);
        }

        $args = $args[0] ?? [];
        $args = array_merge($args, [
            '@http' => [
                'headers' => [
                    'Authorization' => "Bearer $this->accessToken"
                ]
            ]
        ]);

        $command = $this->guzzleClient->getCommand(ucfirst($method), $args);
        $result  = $this->guzzleClient->execute($command);

        return $this->unwrapResponseData($command, $result);
    }

    /**
     * Wrap request data around a top-key (only for POST and PUT requests)
     *
     * @internal
     * @param  CommandInterface $command
     * @return RequestInterface
     */
    public function wrapRequestData(CommandInterface $command): RequestInterface
    {
        $operation = $this->guzzleClient->getDescription()->getOperation($command->getName());
        $method    = strtolower($operation->getHttpMethod());
        $rootKey   = $operation->getData('root_key');

        $serializer = new Serializer($this->guzzleClient->getDescription()); // Create a default serializer to handle all the hard-work
        $request    = $serializer($command);

        if (($method === 'post' || $method === 'put') && $rootKey !== null) {
            $newBody = [$rootKey => json_decode($request->getBody()->getContents(), true)];
            $request = $request->withBody(Psr7\stream_for(json_encode($newBody)));
        }

        return $request;
    }

    /**
     * Decide when we should retry a request
     *
     * @internal
     * @param  int                    $retries
     * @param  RequestInterface       $request
     * @param  ResponseInterface|null $response
     * @param  RequestException|null  $exception
     * @return bool
     */
    public function retryDecider(int $retries, RequestInterface $request, ResponseInterface $response = null, RequestException $exception = null): bool
    {
        // Limit the number of retries to 5
        if ($retries >= 5) {
            return false;
        }

        // Retry connection exceptions
        if ($exception instanceof ConnectException) {
            return true;
        }

        // Otherwise, retry when we're having a 429 exception
        if ($response->getStatusCode() === 429) {
            return true;
        }

        return false;
    }

    /**
     * Basic retry delay
     *
     * @internal
     * @param  int $retries
     * @return int
     */
    public function retryDelay(int $retries): int
    {
        return 1000 * $retries;
    }

    /**
     * @return GuzzleClient
     */
    private function createDefaultClient(): GuzzleClient
    {
        $handlerStack = HandlerStack::create(new CurlHandler());
        $handlerStack->push(Middleware::retry([$this, 'retryDecider'], [$this, 'retryDelay']));

        $httpClient  = new Client(['handler' => $handlerStack]);
        $description = new Description(require __DIR__ . '/ServiceDescription/TradeGecko-v1.php');

        return new GuzzleClient($httpClient, $description, [$this, 'wrapRequestData']);
    }

    /**
     * @param  string $commandName
     * @param  array  $args
     * @return Generator
     */
    private function iterateResources(string $commandName, array $args): Generator
    {
        // When using the iterator, we force the maximum number of items per page to 100, and we init the page to 1 to start from start
        $args['limit'] = 100;
        $args['page']  = 1;

        do {
            $results = $this->$commandName($args);

            foreach ($results as $result) {
                yield $result;
            }

            // Advance the page
            $args['page']++;
        } while(count($results) >= 100);
    }

    /**
     * In TradeGecko, all API responses wrap the data by the resource name. For instance, using the "/accounts" endpoint will wrap
     * the data by the "accounts" key. This is a bit inconvenient to use in userland. As a consequence, we always "unwrap" the result.
     *
     * @param  CommandInterface $command
     * @param  ToArrayInterface $commandResult
     * @return array
     */
    private function unwrapResponseData(CommandInterface $command, ToArrayInterface $commandResult): array
    {
        $operation = $this->guzzleClient->getDescription()->getOperation($command->getName());
        $rootKey   = $operation->getData('root_key');

        return (null === $rootKey) ? $commandResult->toArray() : $commandResult->toArray()[$rootKey];
    }
}
