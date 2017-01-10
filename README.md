ZfrTradeGecko
=============

[![Latest Stable Version](https://poser.pugx.org/zfr/zfr-tradegecko/v/stable.png)](https://packagist.org/packages/zfr/zfr-tradegecko)
[![Build Status](https://travis-ci.org/zf-fr/zfr-tradegecko.svg)](https://travis-ci.org/zf-fr/zfr-tradegecko)

ZfrTradeGecko is a modern PHP library based on Guzzle for [TradeGecko](https://www.tradegecko.com).

## Dependencies

* PHP 7
* [Guzzle](http://www.guzzlephp.org): ^6.1

## Installation

Installation of ZfrTradeGecko is only officially supported using Composer:

```sh
php composer.phar require 'zfr/zfr-tradegecko:1.0'
```

## Usage

ZfrTradeGecko provides a one-to-one mapping with API methods defined in [TradeGecko doc](http://developer.tradegecko.com/).

You can easily create a client using the following code:

```php
use ZfrTradeGecko\TradeGeckoClient;

$client = new TradeGeckoClient('your-access-token');
```

Then, you can simply do requests for supported endpoints:

```php
$response = $client->getPriceLists();
$response = $client->createProduct([
  'name' => 'My Product'
]);
```

### Using a container

ZfrTradeGecko also provides built-in [container-interop](https://github.com/container-interop/container-interop) factories
that you can use. You must make sure that your container contains a service called "config" that is an array with a key
`zfr_tradegecko` containing the required config:

```php
// myconfig.php

return [
    'zfr_tradegecko' => [
        'access_token' => 'ACCESS_TOKEN'
    ],
];
```

If you're using Zend\ServiceManager 3, you can use [Zend\ComponentInstaller](https://zendframework.github.io/zend-component-installer/)
to register our factories into Zend\ServiceManager automatically.

However if you're using other framework or other container, you can still manually register our factories, they are
under [src/Container](/src/Container) folder.

### Exploiting responses

ZfrTradeGecko returns TradeGecko response directly. However, by default, TradeGecko wrap the responses by a top-key. For instance, if
you want to retrieve account information, TradeGecko will return this payload:

```json
{
    "account": {
        "id": 123
    }
}
```

This is a bit inconvenient to use as we would need to do that:

```php
$id = $tradeGeckoClient->getCurrentAccount()['account']['id'];
```

Instead, ZfrTradeGecko automatically "unwraps" response, so you can use the more concise code:

```php
$id = $tradeGeckoClient->getCurrentAccount()['id'];
```

When reading TradeGecko API doc, make sure you remove the top key when exploiting responses.

## Implemented endpoints

Here is a list of supported endpoints (more to come in the future):

**ACCOUNT RELATED METHODS:**

* getAccounts(array $args = [])
* getAccount(array $args = [])
* getCurrentAccount(array $args = [])
* createAccount(array $args = [])
* updateAccount(array $args = [])

**ADDRESS RELATED METHODS:**

* getAddresses(array $args = [])
* getAddress(array $args = [])
* createAddress(array $args = [])
* updateAddress(array $args = [])
* deleteAddress(array $args = [])

**COMPANIES RELATED METHODS:**

* getCompanies(array $args = [])
* getCompany(array $args = [])
* createCompany(array $args = [])
* updateCompany(array $args = [])
* deleteCompany(array $args = [])

**CONTACT RELATED METHODS:**

* getContacts(array $args = [])
* getContact(array $args = [])
* createContact(array $args = [])
* updateContact(array $args = [])
* deleteContact(array $args = [])

**CURRENCY RELATED METHODS:**

* getCurrencies(array $args = [])
* getCurrency(array $args = [])
* createCurrency(array $args = [])
* updateCurrency(array $args = [])
* deleteCurrency(array $args = [])

**FULFILLMENT RELATED METHODS:**

* getFulfillments(array $args = [])
* getFulfillment(array $args = [])
* createFulfillment(array $args = [])
* updateFulfillment(array $args = [])
* deleteFulfillment(array $args = [])

**FULFILLMENT LINE ITEM RELATED METHODS:**

* getFulfillmentLineItems(array $args = [])
* getFulfillmentLineItem(array $args = [])
* createFulfillmentLineItem(array $args = [])
* updateFulfillmentLineItem(array $args = [])
* deleteFulfillmentLineItem(array $args = [])

**IMAGE RELATED METHODS:**

* getImages(array $args = [])
* getImage(array $args = [])
* createImage(array $args = [])
* updateImage(array $args = [])
* deleteImage(array $args = [])

**INVOICE RELATED METHODS:**

* getInvoices(array $args = [])
* getInvoice(array $args = [])
* createInvoice(array $args = [])
* updateInvoice(array $args = [])
* deleteInvoice(array $args = [])

**INVOICE LINE ITEM RELATED METHODS:**

* getInvoiceLineItems(array $args = [])
* getInvoiceLineItem(array $args = [])
* createInvoiceLineItem(array $args = [])
* updateInvoiceLineItem(array $args = [])
* deleteInvoiceLineItem(array $args = [])

**LOCATION RELATED METHODS:**

* getLocations(array $args = [])
* getLocation(array $args = [])
* createLocation(array $args = [])
* updateLocation(array $args = [])
* deleteLocation(array $args = [])

**NOTES RELATED METHODS:**

* getNotes(array $args = [])
* getNote(array $args = [])
* createNote(array $args = [])
* updateNote(array $args = [])
* deleteNote(array $args = [])

**ORDER RELATED METHODS:**

* getOrders(array $args = [])
* getOrder(array $args = [])
* createOrder(array $args = [])
* updateOrder(array $args = [])
* deleteOrder(array $args = [])

**ORDER LINE ITEMS RELATED METHODS:**

* getOrderLineItems(array $args = [])
* getOrderLineItem(array $args = [])
* createOrderLineItem(array $args = [])
* updateOrderLineItem(array $args = [])
* deleteOrderLineItem(array $args = [])

**PAYMENT TERM RELATED METHODS:**

* getPaymentTerms(array $args = [])
* getPaymentTerm(array $args = [])
* createPaymentTerm(array $args = [])
* updatePaymentTerm(array $args = [])
* deletePaymentTerm(array $args = [])

**PRICE LIST RELATED METHODS:**

* getPriceLists(array $args = [])
* getPriceList(array $args = [])
* createPriceList(array $args = [])
* updatePriceList(array $args = [])
* deletePriceList(array $args = [])

**PRODUCT RELATED METHODS:**

* getProducts(array $args = [])
* getProduct(array $args = [])
* createProduct(array $args = [])
* updateProduct(array $args = [])
* deleteProduct(array $args = [])

**PURCHASE ORDER RELATED METHODS:**

* getPurchaseOrders(array $args = [])
* getPurchaseOrder(array $args = [])
* createPurchaseOrder(array $args = [])
* updatePurchaseOrder(array $args = [])
* deletePurchaseOrder(array $args = [])

**PURCHASE ORDER LINE ITEM RELATED METHODS:**

* getPurchaseOrderLineItems(array $args = [])
* getPurchaseOrderLineItem(array $args = [])
* createPurchaseOrderLineItem(array $args = [])
* updatePurchaseOrderLineItem(array $args = [])
* deletePurchaseOrderLineItem(array $args = [])

**STOCK ADJUSTMENT RELATED METHODS:**

* getStockAdjustments(array $args = [])
* getStockAdjustment(array $args = [])
* createStockAdjustment(array $args = [])
* updateStockAdjustment(array $args = [])
* deleteStockAdjustment(array $args = [])

**STOCK ADJUSTMENT LINE ITEM RELATED METHODS:**

* getStockAdjustmentLineItems(array $args = [])
* getStockAdjustmentLineItem(array $args = [])
* createStockAdjustmentLineItem(array $args = [])
* updateStockAdjustmentLineItem(array $args = [])
* deleteStockAdjustmentLineItem(array $args = [])

**STOCK TRANSFER RELATED METHODS:**

* getStockTransfers(array $args = [])
* getStockTransfer(array $args = [])
* createStockTransfer(array $args = [])
* updateStockTransfer(array $args = [])
* deleteStockTransfer(array $args = [])

**STOCK TRANSFER LINE ITEM RELATED METHODS:**

* getStockTransferLineItems(array $args = [])
* getStockTransferLineItem(array $args = [])
* createStockTransferLineItem(array $args = [])
* updateStockTransferLineItem(array $args = [])
* deleteStockTransferLineItem(array $args = [])

**TAX COMPONENT RELATED METHODS:**

* getTaxComponents(array $args = [])
* getTaxComponent(array $args = [])
* createTaxComponent(array $args = [])
* updateTaxComponent(array $args = [])
* deleteTaxComponent(array $args = [])

**TAX TYPE RELATED METHODS:**

* getTaxTypes(array $args = [])
* getTaxType(array $args = [])
* createTaxType(array $args = [])
* updateTaxType(array $args = [])
* deleteTaxType(array $args = [])

**USER RELATED METHODS:**

* getUsers(array $args = [])
* getUser(array $args = [])
* updateUser(array $args = [])
* deleteUser(array $args = [])

**VARIANT RELATED METHODS:**

* getVariants(array $args = [])
* getVariant(array $args = [])
* createVariant(array $args = [])
* updateVariant(array $args = [])
* deleteVariant(array $args = [])