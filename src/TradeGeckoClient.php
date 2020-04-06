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
use GuzzleHttp\Command\Guzzle\QuerySerializer\Rfc3986Serializer;
use GuzzleHttp\Command\Guzzle\RequestLocation\QueryLocation;
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
 * @method array updateAddress(array $args = []) {@command TradeGecko UpdateAddress}
 * @method array deleteAddress(array $args = []) {@command TradeGecko DeleteAddress}
 *
 * COMPANIES RELATED METHODS:
 *
 * @method array getCompanies(array $args = []) {@command TradeGecko GetCompanies}
 * @method array getCompany(array $args = []) {@command TradeGecko GetCompany}
 * @method array createCompany(array $args = []) {@command TradeGecko CreateCompany}
 * @method array updateCompany(array $args = []) {@command TradeGecko UpdateCompany}
 * @method array deleteCompany(array $args = []) {@command TradeGecko DeleteCompany}
 *
 * CONTACT RELATED METHODS:
 *
 * @method array getContacts(array $args = []) {@command TradeGecko GetContacts}
 * @method array getContact(array $args = []) {@command TradeGecko GetContact}
 * @method array createContact(array $args = []) {@command TradeGecko CreateContact}
 * @method array updateContact(array $args = []) {@command TradeGecko UpdateContact}
 * @method array deleteContact(array $args = []) {@command TradeGecko DeleteContact}
 *
 * CURRENCY RELATED METHODS:
 *
 * @method array getCurrencies(array $args = []) {@command TradeGecko GetCurrencies}
 * @method array getCurrency(array $args = []) {@command TradeGecko GetCurrency}
 * @method array createCurrency(array $args = []) {@command TradeGecko CreateCurrency}
 * @method array updateCurrency(array $args = []) {@command TradeGecko UpdateCurrency}
 * @method array deleteCurrency(array $args = []) {@command TradeGecko DeleteCurrency}
 *
 * FULFILLMENT RELATED METHODS:
 *
 * @method array getFulfillments(array $args = []) {@command TradeGecko GetFulfillments}
 * @method array getFulfillment(array $args = []) {@command TradeGecko GetFulfillment}
 * @method array createFulfillment(array $args = []) {@command TradeGecko CreateFulfillment}
 * @method array updateFulfillment(array $args = []) {@command TradeGecko UpdateFulfillment}
 * @method array deleteFulfillment(array $args = []) {@command TradeGecko DeleteFulfillment}
 *
 * FULFILLMENT LINE ITEM RELATED METHODS:
 *
 * @method array getFulfillmentLineItems(array $args = []) {@command TradeGecko GetFulfillmentLineItems}
 * @method array getFulfillmentLineItem(array $args = []) {@command TradeGecko GetFulfillmentLineItem}
 * @method array createFulfillmentLineItem(array $args = []) {@command TradeGecko CreateFulfillmentLineItem}
 * @method array updateFulfillmentLineItem(array $args = []) {@command TradeGecko UpdateFulfillmentLineItem}
 * @method array deleteFulfillmentLineItem(array $args = []) {@command TradeGecko DeleteFulfillmentLineItem}
 *
 * IMAGE RELATED METHODS:
 *
 * @method array getImages(array $args = []) {@command TradeGecko GetImages}
 * @method array getImage(array $args = []) {@command TradeGecko GetImage}
 * @method array createImage(array $args = []) {@command TradeGecko CreateImage}
 * @method array updateImage(array $args = []) {@command TradeGecko UpdateImage}
 * @method array deleteImage(array $args = []) {@command TradeGecko DeleteImage}
 *
 * INVOICE RELATED METHODS:
 *
 * @method array getInvoices(array $args = []) {@command TradeGecko GetInvoices}
 * @method array getInvoice(array $args = []) {@command TradeGecko GetInvoice}
 * @method array createInvoice(array $args = []) {@command TradeGecko CreateInvoice}
 * @method array updateInvoice(array $args = []) {@command TradeGecko UpdateInvoice}
 * @method array deleteInvoice(array $args = []) {@command TradeGecko DeleteInvoice}
 *
 * INVOICE LINE ITEM RELATED METHODS:
 *
 * @method array getInvoiceLineItems(array $args = []) {@command TradeGecko GetInvoiceLineItems}
 * @method array getInvoiceLineItem(array $args = []) {@command TradeGecko GetInvoiceLineItem}
 * @method array createInvoiceLineItem(array $args = []) {@command TradeGecko CreateInvoiceLineItem}
 * @method array updateInvoiceLineItem(array $args = []) {@command TradeGecko UpdateInvoiceLineItem}
 * @method array deleteInvoiceLineItem(array $args = []) {@command TradeGecko DeleteInvoiceLineItem}
 *
 * LOCATION RELATED METHODS:
 *
 * @method array getLocations(array $args = []) {@command TradeGecko GetLocations}
 * @method array getLocation(array $args = []) {@command TradeGecko GetLocation}
 * @method array createLocation(array $args = []) {@command TradeGecko CreateLocation}
 * @method array updateLocation(array $args = []) {@command TradeGecko UpdateLocation}
 * @method array deleteLocation(array $args = []) {@command TradeGecko DeleteLocation}
 *
 * NOTES RELATED METHODS:
 *
 * @method array getNotes(array $args = []) {@command TradeGecko GetNotes}
 * @method array getNote(array $args = []) {@command TradeGecko GetNote}
 * @method array createNote(array $args = []) {@command TradeGecko CreateNote}
 * @method array updateNote(array $args = []) {@command TradeGecko UpdateNote}
 * @method array deleteNote(array $args = []) {@command TradeGecko DeleteNote}
 *
 * ORDER RELATED METHODS:
 *
 * @method array getOrders(array $args = []) {@command TradeGecko GetOrders}
 * @method array getOrder(array $args = []) {@command TradeGecko GetOrder}
 * @method array createOrder(array $args = []) {@command TradeGecko CreateOrder}
 * @method array updateOrder(array $args = []) {@command TradeGecko UpdateOrder}
 * @method array deleteOrder(array $args = []) {@command TradeGecko DeleteOrder}
 *
 * ORDER LINE ITEMS RELATED METHODS:
 *
 * @method array getOrderLineItems(array $args = []) {@command TradeGecko GetOrderLineItems}
 * @method array getOrderLineItem(array $args = []) {@command TradeGecko GetOrderLineItem}
 * @method array createOrderLineItem(array $args = []) {@command TradeGecko CreateOrderLineItem}
 * @method array updateOrderLineItem(array $args = []) {@command TradeGecko UpdateOrderLineItem}
 * @method array deleteOrderLineItem(array $args = []) {@command TradeGecko DeleteOrderLineItem}
 *
 * PAYMENT TERM RELATED METHODS:
 *
 * @method array getPaymentTerms(array $args = []) {@command TradeGecko GetPaymentTerms}
 * @method array getPaymentTerm(array $args = []) {@command TradeGecko GetPaymentTerm}
 * @method array createPaymentTerm(array $args = []) {@command TradeGecko CreatePaymentTerm}
 * @method array updatePaymentTerm(array $args = []) {@command TradeGecko UpdatePaymentTerm}
 * @method array deletePaymentTerm(array $args = []) {@command TradeGecko DeletePaymentTerm}
 *
 * PRICE LIST RELATED METHODS:
 *
 * @method array getPriceLists(array $args = []) {@command TradeGecko GetPriceLists}
 * @method array getPriceList(array $args = []) {@command TradeGecko GetPriceList}
 * @method array createPriceList(array $args = []) {@command TradeGecko CreatePriceList}
 * @method array updatePriceList(array $args = []) {@command TradeGecko UpdatePriceList}
 * @method array deletePriceList(array $args = []) {@command TradeGecko DeletePriceList}
 *
 * PROCUREMENT RELATED METHODS:
 *
 * @method array getProcurements(array $args = []) {@command TradeGecko GetProcurements}
 * @method array getProcurement(array $args = []) {@command TradeGecko GetProcurement}
 * @method array createProcurement(array $args = []) {@command TradeGecko CreateProcurement}
 * @method array deleteProcurement(array $args = []) {@command TradeGecko DeleteProcurement}
 *
 * PRODUCT RELATED METHODS:
 *
 * @method array getProducts(array $args = []) {@command TradeGecko GetProducts}
 * @method array getProduct(array $args = []) {@command TradeGecko GetProduct}
 * @method array createProduct(array $args = []) {@command TradeGecko CreateProduct}
 * @method array updateProduct(array $args = []) {@command TradeGecko UpdateProduct}
 * @method array deleteProduct(array $args = []) {@command TradeGecko DeleteProduct}
 *
 * PURCHASE ORDER RELATED METHODS:
 *
 * @method array getPurchaseOrders(array $args = []) {@command TradeGecko GetPurchaseOrders}
 * @method array getPurchaseOrder(array $args = []) {@command TradeGecko GetPurchaseOrder}
 * @method array createPurchaseOrder(array $args = []) {@command TradeGecko CreatePurchaseOrder}
 * @method array updatePurchaseOrder(array $args = []) {@command TradeGecko UpdatePurchaseOrder}
 * @method array deletePurchaseOrder(array $args = []) {@command TradeGecko DeletePurchaseOrder}
 *
 * PURCHASE ORDER LINE ITEM RELATED METHODS:
 *
 * @method array getPurchaseOrderLineItems(array $args = []) {@command TradeGecko GetPurchaseOrderLineItems}
 * @method array getPurchaseOrderLineItem(array $args = []) {@command TradeGecko GetPurchaseOrderLineItem}
 * @method array createPurchaseOrderLineItem(array $args = []) {@command TradeGecko CreatePurchaseOrderLineItem}
 * @method array updatePurchaseOrderLineItem(array $args = []) {@command TradeGecko UpdatePurchaseOrderLineItem}
 * @method array deletePurchaseOrderLineItem(array $args = []) {@command TradeGecko DeletePurchaseOrderLineItem}
 *
 * STOCK ADJUSTMENT RELATED METHODS:
 *
 * @method array getStockAdjustments(array $args = []) {@command TradeGecko GetStockAdjustments}
 * @method array getStockAdjustment(array $args = []) {@command TradeGecko GetStockAdjustment}
 * @method array createStockAdjustment(array $args = []) {@command TradeGecko CreateStockAdjustment}
 * @method array updateStockAdjustment(array $args = []) {@command TradeGecko UpdateStockAdjustment}
 * @method array deleteStockAdjustment(array $args = []) {@command TradeGecko DeleteStockAdjustment}
 *
 * STOCK ADJUSTMENT LINE ITEM RELATED METHODS:
 *
 * @method array getStockAdjustmentLineItems(array $args = []) {@command TradeGecko GetStockAdjustmentLineItems}
 * @method array getStockAdjustmentLineItem(array $args = []) {@command TradeGecko GetStockAdjustmentLineItem}
 * @method array createStockAdjustmentLineItem(array $args = []) {@command TradeGecko CreateStockAdjustmentLineItem}
 * @method array updateStockAdjustmentLineItem(array $args = []) {@command TradeGecko UpdateStockAdjustmentLineItem}
 * @method array deleteStockAdjustmentLineItem(array $args = []) {@command TradeGecko DeleteStockAdjustmentLineItem}
 *
 * STOCK TRANSFER RELATED METHODS:
 *
 * @method array getStockTransfers(array $args = []) {@command TradeGecko GetStockTransfers}
 * @method array getStockTransfer(array $args = []) {@command TradeGecko GetStockTransfer}
 * @method array createStockTransfer(array $args = []) {@command TradeGecko CreateStockTransfer}
 * @method array updateStockTransfer(array $args = []) {@command TradeGecko UpdateStockTransfer}
 * @method array deleteStockTransfer(array $args = []) {@command TradeGecko DeleteStockTransfer}
 *
 * STOCK TRANSFER LINE ITEM RELATED METHODS:
 *
 * @method array getStockTransferLineItems(array $args = []) {@command TradeGecko GetStockTransferLineItems}
 * @method array getStockTransferLineItem(array $args = []) {@command TradeGecko GetStockTransferLineItem}
 * @method array createStockTransferLineItem(array $args = []) {@command TradeGecko CreateStockTransferLineItem}
 * @method array updateStockTransferLineItem(array $args = []) {@command TradeGecko UpdateStockTransferLineItem}
 * @method array deleteStockTransferLineItem(array $args = []) {@command TradeGecko DeleteStockTransferLineItem}
 *
 * TAX COMPONENT RELATED METHODS:
 *
 * @method array getTaxComponents(array $args = []) {@command TradeGecko GetTaxComponents}
 * @method array getTaxComponent(array $args = []) {@command TradeGecko GetTaxComponent}
 * @method array createTaxComponent(array $args = []) {@command TradeGecko CreateTaxComponent}
 * @method array updateTaxComponent(array $args = []) {@command TradeGecko UpdateTaxComponent}
 * @method array deleteTaxComponent(array $args = []) {@command TradeGecko DeleteTaxComponent}
 *
 * TAX TYPE RELATED METHODS:
 *
 * @method array getTaxTypes(array $args = []) {@command TradeGecko GetTaxTypes}
 * @method array getTaxType(array $args = []) {@command TradeGecko GetTaxType}
 * @method array createTaxType(array $args = []) {@command TradeGecko CreateTaxType}
 * @method array updateTaxType(array $args = []) {@command TradeGecko UpdateTaxType}
 * @method array deleteTaxType(array $args = []) {@command TradeGecko DeleteTaxType}
 *
 * USER RELATED METHODS:
 *
 * @method array getUsers(array $args = []) {@command TradeGecko GetUsers}
 * @method array getUser(array $args = []) {@command TradeGecko GetUser}
 * @method array updateUser(array $args = []) {@command TradeGecko UpdateUser}
 * @method array deleteUser(array $args = []) {@command TradeGecko DeleteUser}
 *
 * VARIANT RELATED METHODS:
 *
 * @method array getVariants(array $args = []) {@command TradeGecko GetVariants}
 * @method array getVariant(array $args = []) {@command TradeGecko GetVariant}
 * @method array createVariant(array $args = []) {@command TradeGecko CreateVariant}
 * @method array updateVariant(array $args = []) {@command TradeGecko UpdateVariant}
 * @method array deleteVariant(array $args = []) {@command TradeGecko DeleteVariant}
 *
 * WEBHOOK RELATED METHODS:
 *
 * @method array getWebhooks(array $args = []) {@command TradeGecko GetWebhooks}
 * @method array getWebhook(array $args = []) {@command TradeGecko GetWebhook}
 * @method array createWebhook(array $args = []) {@command TradeGecko CreateWebhook}
 * @method array updateWebhook(array $args = []) {@command TradeGecko UpdateWebhook}
 * @method array deleteWebhook(array $args = []) {@command TradeGecko DeleteWebhook}
 *
 * PAYMENT RELATED METHODS:
 *
 * @method array getPayments(array $args = []) {@command TradeGecko GetPayments}
 * @method array getPayment(array $args = []) {@command TradeGecko GetPayment}
 * @method array createPayment(array $args = []) {@command TradeGecko CreatePayment}
 * @method array updatePayment(array $args = []) {@command TradeGecko UpdatePayment}
 * @method array deletePayment(array $args = []) {@command TradeGecko DeletePayment}
 *
 * ITERATOR METHODS:
 *
 * @method \Traversable getAccountsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetAccounts}
 * @method \Traversable getAddressesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetAddresses}
 * @method \Traversable getCompaniesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetCompanies}
 * @method \Traversable getContactsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetContacts}
 * @method \Traversable getCurrenciesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetCurrencies}
 * @method \Traversable getFulfillmentsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetFulfillments}
 * @method \Traversable getFulfillmentLineItemsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetFulfillmentLineItems}
 * @method \Traversable getImagesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetImages}
 * @method \Traversable getInvoicesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetInvoices}
 * @method \Traversable getInvoiceLineItemsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetInvoiceLineItems}
 * @method \Traversable getLocationsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetLocations}
 * @method \Traversable getNotesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetNotes}
 * @method \Traversable getOrdersIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetOrders}
 * @method \Traversable getOrderLineItemsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetOrderLineItems}
 * @method \Traversable getPaymentTermsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetPaymentTerms}
 * @method \Traversable getPriceListsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetPriceLists}
 * @method \Traversable getProductsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetProducts}
 * @method \Traversable getPurchaseOrdersIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetPurchaseOrders}
 * @method \Traversable getPurchaseOrderLineItemsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetPurchaseOrderLineItems}
 * @method \Traversable getStockAdjustmentsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetStockAdjustments}
 * @method \Traversable getStockAdjustmentLineItemsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetStockAdjustmentLineItems}
 * @method \Traversable getStockTransfersIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetStockTransfers}
 * @method \Traversable getStockTransferLineItemsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetStockTransferLineItems}
 * @method \Traversable getTaxComponentsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetTaxComponents}
 * @method \Traversable getTaxTypesIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetTaxTypes}
 * @method \Traversable getUsersIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetUsers}
 * @method \Traversable getVariantsIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetVariants}
 * @method \Traversable getWebhooksIterator(array $commandArgs = [], array $iteratorArgs = []) {@command TradeGecko GetWebhooks}
 */
class TradeGeckoClient
{
    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    /**
     * @var Serializer
     */
    private $serializer;

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
        $idempotencyToken;
        if (isset($args['idempotency_token'])) {
            $idempotencyToken = $args['idempotency_token'];
            unset($args['idempotency_token']);
        }

        $args = array_merge($args, [
            '@http' => [
                'headers' => [
                    'Authorization' => "Bearer $this->accessToken"
                ]
            ]
        ]);
        if (isset($idempotencyToken)) {
            $args['@http']['headers']['Idempotency-Key'] = $idempotencyToken;
        }

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

        $serializer = $this->getSerializer();
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
        // Retry connection exceptions
        if ($exception instanceof ConnectException) {
            return true;
        }

        $statusCode = $response->getStatusCode();

        // 503 being "Service unavailable", we retry in case it become available again. We also retry on 500 as we've found out that
        // TradeGecko API is quite unreliable and often returns 500

        if ($response && ($statusCode === 503 || $statusCode === 500)) {
            return true;
        }

        // Otherwise, if we're having a 429, we sleep until our quota reset
        if ($response && $statusCode === 429) {
            sleep((int) $response->getHeaderLine('X-Rate-Limit-Reset') - time());
            return true;
        }

        return false;
    }

    /**
     * @return GuzzleClient
     */
    private function createDefaultClient(): GuzzleClient
    {
        $handlerStack = HandlerStack::create(new CurlHandler());
        $handlerStack->push(Middleware::retry([$this, 'retryDecider']));

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
        $args = $args[0] ?? [];

        // When using the iterator, we force the maximum number of items per page to 250 (maximum allowed), and we init the page to 1 to start from start
        $args['limit'] = 250;
        $args['page']  = 1;

        do {
            $results = $this->$commandName($args);

            foreach ($results as $result) {
                yield $result;
            }

            // Advance the page
            $args['page']++;
        } while (count($results) >= 250);
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
        $result = $commandResult->toArray();

        // For PUT and DELETE, TradeGecko does not send any response so we just send back empty array
        if (empty($result)) {
            return $result;
        }

        $operation = $this->guzzleClient->getDescription()->getOperation($command->getName());
        $rootKey   = $operation->getData('root_key');

        return (null === $rootKey) ? $result : $result[$rootKey];
    }

    /**
     * @return Serializer
     */
    private function getSerializer(): Serializer
    {
        if ($this->serializer) {
            return $this->serializer;
        }

        $this->serializer = new Serializer($this->guzzleClient->getDescription(), [
            'query' => new QueryLocation('query', new Rfc3986Serializer(true))
        ]);

        return $this->serializer;
    }
}
