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

return [
    'name' => 'TradeGecko',
    'description' => 'TradeGecko is an easy-to-use yet powerful inventory management system',
    'baseUri' => 'https://api.tradegecko.com',
    'operations' => [
        /**
         * --------------------------------------------------------------------------------
         * ACCOUNT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#account
         * --------------------------------------------------------------------------------
         */

        'GetAccounts' => [
            'httpMethod' => 'GET',
            'uri' => 'accounts',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'accounts',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
            ],
        ],

        'GetAccount' => [
            'httpMethod' => 'GET',
            'uri' => 'accounts/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'account',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'GetCurrentAccount' => [
            'httpMethod' => 'GET',
            'uri' => 'accounts/account',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'account',
            ]
        ],

        'CreateAccount' => [
            'httpMethod' => 'POST',
            'uri' => 'accounts',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'account',
            ],
            'parameters' => [
                'contact_email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'contact_mobile' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'contact_phone' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'country' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'default_order_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_purchase_order_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_sales_ledger_account_on' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_tax_treatment' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_document_theme_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'industry' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'stock_level_warn' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'tax_label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_number_label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'time_zone' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'website' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'primary_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'primary_billing_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_currency_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_payment_term_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'billing_contact_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_sales_order_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_purchase_order_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_tax_exempt_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
            ],
        ],

        'UpdateAccount' => [
            'httpMethod' => 'PUT',
            'uri' => 'accounts/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'account',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'contact_email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'contact_mobile' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'contact_phone' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'country' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_order_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_purchase_order_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_sales_ledger_account_on' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_tax_treatment' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_document_theme_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'industry' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'stock_level_warn' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'tax_label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_number_label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'time_zone' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'website' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'primary_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'primary_billing_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_currency_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_payment_term_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'billing_contact_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_sales_order_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_purchase_order_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_tax_exempt_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * ADDRESS RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#address
         * --------------------------------------------------------------------------------
         */

        'GetAddresses' => [
            'httpMethod' => 'GET',
            'uri' => 'addresses',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'addresses',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetAddress' => [
            'httpMethod' => 'GET',
            'uri' => 'addresses/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'address',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateAddress' => [
            'httpMethod' => 'POST',
            'uri' => 'addresses',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'address',
            ],
            'parameters' => [
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'address1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'address2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'city' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'company_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'country' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'first_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'last_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'state' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'suburb' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'zip_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateAddress' => [
            'httpMethod' => 'PUT',
            'uri' => 'addresses/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'address',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'address1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'address2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'city' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'company_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'country' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'first_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'last_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'state' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'suburb' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'zip_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteAddress' => [
            'httpMethod' => 'DELETE',
            'uri' => 'addresses/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * COMPANIES RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#company
         * --------------------------------------------------------------------------------
         */

        'GetCompanies' => [
            'httpMethod' => 'GET',
            'uri' => 'companies',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'companies',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['active', 'disabled']
                ],
                'default_ledger_account_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'default_payment_term_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'default_stock_location_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'default_tax_type_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'company_code' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'company_type' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['business', 'supplier', 'consumer']
                ],
                'default_price_list_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'default_document_theme_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'email' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetCompany' => [
            'httpMethod' => 'GET',
            'uri' => 'companies/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'company',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateCompany' => [
            'httpMethod' => 'POST',
            'uri' => 'companies',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'company',
            ],
            'parameters' => [
                'assignee_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_ledger_account_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_payment_term_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'company_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'company_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                    'enum' => ['business', 'supplier', 'consumer']
                ],
                'default_discount_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_document_theme_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'description' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'fax' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'website' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateCompany' => [
            'httpMethod' => 'PUT',
            'uri' => 'companies/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'company',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'assignee_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_ledger_account_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_payment_term_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'company_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'company_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_discount_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'default_document_theme_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'description' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'fax' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'website' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteCompany' => [
            'httpMethod' => 'DELETE',
            'uri' => 'companies/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * CONTACT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#contact
         * --------------------------------------------------------------------------------
         */

        'GetContacts' => [
            'httpMethod' => 'GET',
            'uri' => 'contacts',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'contacts',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'online_ordering' => [
                    'location' => 'query',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetContact' => [
            'httpMethod' => 'GET',
            'uri' => 'contacts/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'contact',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateContact' => [
            'httpMethod' => 'POST',
            'uri' => 'contacts',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'contact',
            ],
            'parameters' => [
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'fax' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'first_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'last_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'location' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'mobile' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'iguana_admin' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'online_ordering' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'invitation_accepted_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateContact' => [
            'httpMethod' => 'PUT',
            'uri' => 'contacts/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'contact',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'fax' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'first_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'last_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'location' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'mobile' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'iguana_admin' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'online_ordering' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'invitation_accepted_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteContact' => [
            'httpMethod' => 'DELETE',
            'uri' => 'contacts/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * CURRENCY RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#currency
         * --------------------------------------------------------------------------------
         */

        'GetCurrencies' => [
            'httpMethod' => 'GET',
            'uri' => 'currencies',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'currencies',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetCurrency' => [
            'httpMethod' => 'GET',
            'uri' => 'currencies/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'currency',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateCurrency' => [
            'httpMethod' => 'POST',
            'uri' => 'currencies',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'currency',
            ],
            'parameters' => [
                'delimiter' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'format' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'iso' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'precision' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'separator' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'symbol' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateCurrency' => [
            'httpMethod' => 'PUT',
            'uri' => 'currencies/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'currency',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'delimiter' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'format' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'iso' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'precision' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'separator' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'symbol' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteCurrency' => [
            'httpMethod' => 'DELETE',
            'uri' => 'currencies/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * FULFILLMENT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#fulfillment
         * --------------------------------------------------------------------------------
         */

        'GetFulfillments' => [
            'httpMethod' => 'GET',
            'uri' => 'fulfillments',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillments',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['packed', 'fulfilled', 'void', 'deleted']
                ],
                'order_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'shipping_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetFulfillment' => [
            'httpMethod' => 'GET',
            'uri' => 'fulfillments/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillment',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateFulfillment' => [
            'httpMethod' => 'POST',
            'uri' => 'fulfillments',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillment',
            ],
            'parameters' => [
                'order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'shipping_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'delivery_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'exchange_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'packed_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'receipt' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'received_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'service' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'shipped_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['packed', 'fulfilled', 'void', 'deleted']
                ],
                'tracking_company' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tracking_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tracking_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'fulfillment_line_items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ]
            ],
        ],

        'UpdateFulfillment' => [
            'httpMethod' => 'PUT',
            'uri' => 'fulfillments/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillment',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'shipping_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'delivery_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'exchange_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'packed_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'receipt' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'received_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'service' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'shipped_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['packed', 'fulfilled', 'void', 'deleted']
                ],
                'tracking_company' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tracking_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tracking_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteFulfillment' => [
            'httpMethod' => 'DELETE',
            'uri' => 'fulfillments/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * FULFILLMENT LINE ITEM RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#fulfillmentlineitem
         * --------------------------------------------------------------------------------
         */

        'GetFulfillmentLineItems' => [
            'httpMethod' => 'GET',
            'uri' => 'fulfillment_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillment_line_items',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'fulfillment_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'order_line_item_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ]
            ],
        ],

        'GetFulfillmentLineItem' => [
            'httpMethod' => 'GET',
            'uri' => 'fulfillment_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillment_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateFulfillmentLineItem' => [
            'httpMethod' => 'POST',
            'uri' => 'fulfillment_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillment_line_item',
            ],
            'parameters' => [
                'fulfillment_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'order_line_item_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'base_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'UpdateFulfillmentLineItem' => [
            'httpMethod' => 'PUT',
            'uri' => 'fulfillment_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'fulfillment_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'fulfillment_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'order_line_item_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'base_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteFulfillmentLineItem' => [
            'httpMethod' => 'DELETE',
            'uri' => 'fulfillment_line_items/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * IMAGE RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#image
         * --------------------------------------------------------------------------------
         */

        'GetImages' => [
            'httpMethod' => 'GET',
            'uri' => 'images',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'images',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'variant_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'uploader_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetImage' => [
            'httpMethod' => 'GET',
            'uri' => 'images/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'image',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateImage' => [
            'httpMethod' => 'POST',
            'uri' => 'images',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'image',
            ],
            'parameters' => [
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'UpdateImage' => [
            'httpMethod' => 'PUT',
            'uri' => 'images/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'image',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteImage' => [
            'httpMethod' => 'DELETE',
            'uri' => 'images/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * INVOICE RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#invoice
         * --------------------------------------------------------------------------------
         */

        'GetInvoices' => [
            'httpMethod' => 'GET',
            'uri' => 'invoices',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoices',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'order_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'shipping_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'payment_term_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'invoice_number' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'payment_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'currency_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetInvoice' => [
            'httpMethod' => 'GET',
            'uri' => 'invoices/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoice',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateInvoice' => [
            'httpMethod' => 'POST',
            'uri' => 'invoices',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoice',
            ],
            'parameters' => [
                'order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'shipping_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'payment_term_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'due_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'exchange_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'invoice_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'invoiced_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'invoice_line_items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ]
            ],
        ],

        'UpdateInvoice' => [
            'httpMethod' => 'PUT',
            'uri' => 'invoices/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoice',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'shipping_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'payment_term_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'due_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'exchange_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'invoice_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'invoiced_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteInvoice' => [
            'httpMethod' => 'DELETE',
            'uri' => 'invoices/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * INVOICE LINE ITEM RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#invoicelineitem
         * --------------------------------------------------------------------------------
         */

        'GetInvoiceLineItems' => [
            'httpMethod' => 'GET',
            'uri' => 'invoice_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoice_line_items',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'invoice_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'order_line_item_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetInvoiceLineItem' => [
            'httpMethod' => 'GET',
            'uri' => 'invoice_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoice_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateInvoiceLineItem' => [
            'httpMethod' => 'POST',
            'uri' => 'invoice_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoice_line_item',
            ],
            'parameters' => [
                'invoice_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'order_line_item_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'base_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'UpdateInvoiceLineItem' => [
            'httpMethod' => 'PUT',
            'uri' => 'invoice_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'invoice_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'invoice_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'order_line_item_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'base_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteInvoiceLineItem' => [
            'httpMethod' => 'DELETE',
            'uri' => 'invoice_line_items/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * LOCATION RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#location
         * --------------------------------------------------------------------------------
         */

        'GetLocations' => [
            'httpMethod' => 'GET',
            'uri' => 'locations',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'locations',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetLocation' => [
            'httpMethod' => 'GET',
            'uri' => 'locations/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'location',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateLocation' => [
            'httpMethod' => 'POST',
            'uri' => 'locations',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'location',
            ],
            'parameters' => [
                'address1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'address2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'city' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'country' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                    'maxLength' => 2
                ],
                'holds_stock' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'state' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'suburb' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'zip_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateLocation' => [
            'httpMethod' => 'PUT',
            'uri' => 'locations/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'location',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'address1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'address2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'city' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'country' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'maxLength' => 2
                ],
                'holds_stock' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'state' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'suburb' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'zip_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteLocation' => [
            'httpMethod' => 'DELETE',
            'uri' => 'locations/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * NOTES RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#note
         * --------------------------------------------------------------------------------
         */

        'GetNotes' => [
            'httpMethod' => 'GET',
            'uri' => 'notes',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'notes',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'user_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetNote' => [
            'httpMethod' => 'GET',
            'uri' => 'notes/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'note',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateNote' => [
            'httpMethod' => 'POST',
            'uri' => 'notes',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'note',
            ],
            'parameters' => [
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'body' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateNote' => [
            'httpMethod' => 'PUT',
            'uri' => 'notes/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'note',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'body' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteNote' => [
            'httpMethod' => 'DELETE',
            'uri' => 'notes/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * ORDER RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#order
         * --------------------------------------------------------------------------------
         */

        'GetOrders' => [
            'httpMethod' => 'GET',
            'uri' => 'orders',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'orders',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['draft', 'active', 'finalized']
                ],
                'billing_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'contact_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'currency_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'shipping_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'user_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'order_number' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'tags' => [
                    'location' => 'query',
                    'type' => 'array',
                    'required' => false,
                ],
                'payment_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['unpaid', 'partial', 'paid']
                ],
                'invoice_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['uninvoiced', 'partial', 'invoiced']
                ],
                'packed_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['unpacked', 'partial', 'packed']
                ],
                'fulfillment_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['unshipped', 'partial', 'shipped']
                ],
                'return_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['unreturned', 'partial', 'returned']
                ],
                'returning_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['unreturning', 'partial', 'returning']
                ],
                'shippability_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['not_shippable', 'partially_shippable', 'shippable']
                ],
                'backordering_status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['not_backordered', 'partially_backordered', 'backordered']
                ],
            ],
        ],

        'GetOrder' => [
            'httpMethod' => 'GET',
            'uri' => 'orders/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'order',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateOrder' => [
            'httpMethod' => 'POST',
            'uri' => 'orders',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'order',
            ],
            'parameters' => [
                'assignee_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'issued_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'ship_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'contact_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'shipping_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'order_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'reference_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'source_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_treatment' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['exclusive', 'inclusive']
                ],
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['draft', 'active', 'finalized']
                ],
                'tags' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
                'order_line_items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ]
            ],
        ],

        'UpdateOrder' => [
            'httpMethod' => 'PUT',
            'uri' => 'orders/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'order',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'assignee_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'issued_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'ship_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'contact_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'shipping_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'order_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'reference_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'source_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_treatment' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['exclusive', 'inclusive']
                ],
                'tags' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['draft', 'active', 'finalized']
                ],
            ],
        ],

        'DeleteOrder' => [
            'httpMethod' => 'DELETE',
            'uri' => 'orders/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * ORDER LINE ITEM RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#orderlineitem
         * --------------------------------------------------------------------------------
         */

        'GetOrderLineItems' => [
            'httpMethod' => 'GET',
            'uri' => 'order_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'order_line_items',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'order_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'variant_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'tax_type_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetOrderLineItem' => [
            'httpMethod' => 'GET',
            'uri' => 'order_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'order_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateOrderLineItem' => [
            'httpMethod' => 'POST',
            'uri' => 'order_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'order_line_item',
            ],
            'parameters' => [
                'order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'discount' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'freeform' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'image_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'line_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_rate_override' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateOrderLineItem' => [
            'httpMethod' => 'PUT',
            'uri' => 'order_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'order_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'discount' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'freeform' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'image_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'line_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_rate_override' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteOrderLineItem' => [
            'httpMethod' => 'DELETE',
            'uri' => 'order_line_items/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * PAYMENT TERM RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#paymentterm
         * --------------------------------------------------------------------------------
         */

        'GetPaymentTerms' => [
            'httpMethod' => 'GET',
            'uri' => 'payment_terms',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'payment_terms',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetPaymentTerm' => [
            'httpMethod' => 'GET',
            'uri' => 'payment_terms/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'payment_term',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreatePaymentTerm' => [
            'httpMethod' => 'POST',
            'uri' => 'payment_terms',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'payment_term',
            ],
            'parameters' => [
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'due_in_days' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'from' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['now', 'eom'],
                ],
            ],
        ],

        'UpdatePaymentTerm' => [
            'httpMethod' => 'PUT',
            'uri' => 'payment_terms/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'payment_term',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'due_in_days' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'from' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['now', 'eom'],
                ],
            ],
        ],

        'DeletePaymentTerm' => [
            'httpMethod' => 'DELETE',
            'uri' => 'payment_terms/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * PRICE LIST RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#pricelist
         * --------------------------------------------------------------------------------
         */

        'GetPriceLists' => [
            'httpMethod' => 'GET',
            'uri' => 'price_lists',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'price_lists',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                    'enum' => ['active', 'disabled']
                ],
                'currency_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetPriceList' => [
            'httpMethod' => 'GET',
            'uri' => 'price_lists/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'price_list',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreatePriceList' => [
            'httpMethod' => 'POST',
            'uri' => 'price_lists',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'price_list',
            ],
            'parameters' => [
                'currency_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'is_cost' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
            ],
        ],

        'UpdatePriceList' => [
            'httpMethod' => 'PUT',
            'uri' => 'price_lists/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'price_list',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'currency_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'is_cost' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
            ],
        ],

        'DeletePriceList' => [
            'httpMethod' => 'DELETE',
            'uri' => 'price_lists/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * PRODUCT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#product
         * --------------------------------------------------------------------------------
         */

        'GetProducts' => [
            'httpMethod' => 'GET',
            'uri' => 'products',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'products',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'brand' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'product_type' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'tags' => [
                    'location' => 'query',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'GetProduct' => [
            'httpMethod' => 'GET',
            'uri' => 'products/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'product',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateProduct' => [
            'httpMethod' => 'POST',
            'uri' => 'products',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'product',
            ],
            'parameters' => [
                'brand' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'description' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'opt1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt3' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'product_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'supplier_ids' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
                'tags' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
                'variants' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false
                ]
            ],
        ],

        'UpdateProduct' => [
            'httpMethod' => 'PUT',
            'uri' => 'products/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'product',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'brand' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'description' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt3' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'product_type' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'supplier_ids' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
                'tags' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'DeleteProduct' => [
            'httpMethod' => 'DELETE',
            'uri' => 'products/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * PROCUREMENT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#procurement
         * --------------------------------------------------------------------------------
         */

        'GetProcurements' => [
            'httpMethod' => 'GET',
            'uri' => 'procurements',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'procurements',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'purchase_order_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ]
            ],
        ],

        'GetProcurement' => [
            'httpMethod' => 'GET',
            'uri' => 'procurements/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'procurement',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateProcurement' => [
            'httpMethod' => 'POST',
            'uri' => 'procurements',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'procurement',
            ],
            'parameters' => [
                'purchase_order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'exchange_rate' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'received_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'purchase_order_line_items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ]
            ],
        ],

        'DeleteProcurement' => [
            'httpMethod' => 'DELETE',
            'uri' => 'procurements/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * PURCHASE ORDER RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#purchaseorder
         * --------------------------------------------------------------------------------
         */

        'GetPurchaseOrders' => [
            'httpMethod' => 'GET',
            'uri' => 'purchase_orders',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_orders',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'enum' => ['draft', 'active', 'disabled'],
                    'required' => false
                ],
                'billing_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'currency_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'supplier_address_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'order_number' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'tags' => [
                    'location' => 'query',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'GetPurchaseOrder' => [
            'httpMethod' => 'GET',
            'uri' => 'purchase_orders/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_order',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreatePurchaseOrder' => [
            'httpMethod' => 'POST',
            'uri' => 'purchase_orders',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_order',
            ],
            'parameters' => [
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'currency_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'supplier_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'due_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'order_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'procurement_status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'reference_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_treatment' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                    'enum' => ['exclusive', 'inclusive']
                ],
                'received_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'total' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'cached_quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tags' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
                'purchase_order_line_items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ]
            ],
        ],

        'UpdatePurchaseOrder' => [
            'httpMethod' => 'PUT',
            'uri' => 'purchase_orders/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_order',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'billing_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'company_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'currency_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'supplier_address_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_price_list_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'due_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'order_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'procurement_status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'reference_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_treatment' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'received_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'total' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'cached_quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tags' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'DeletePurchaseOrders' => [
            'httpMethod' => 'DELETE',
            'uri' => 'purchase_orders/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * PURCHASE ORDER LINE ITEM RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#purchaseorderlineitem
         * --------------------------------------------------------------------------------
         */

        'GetPurchaseOrderLineItems' => [
            'httpMethod' => 'GET',
            'uri' => 'purchase_order_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_order_line_items',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'procurement_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'purchase_order_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'variant_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'tax_type_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetPurchaseOrderLineItem' => [
            'httpMethod' => 'GET',
            'uri' => 'purchase_order_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_order_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreatePurchaseOrderLineItem' => [
            'httpMethod' => 'POST',
            'uri' => 'purchase_order_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_order_line_item',
            ],
            'parameters' => [
                'purchase_order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'procurement_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'base_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'freeform' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'image_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_rate_override' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'extra_cost_value' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdatePurchaseOrderLineItem' => [
            'httpMethod' => 'PUT',
            'uri' => 'purchase_order_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'purchase_order_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'purchase_order_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'procurement_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'base_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'freeform' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'image_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'tax_rate_override' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'extra_cost_value' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeletePurchaseOrderLineItem' => [
            'httpMethod' => 'DELETE',
            'uri' => 'purchase_order_line_items/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * STOCK ADJUSTMENT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#stockadjustment
         * --------------------------------------------------------------------------------
         */

        'GetStockAdjustments' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_adjustments',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustments',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'adjustment_number' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'stock_location_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetStockAdjustment' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_adjustments/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustment',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateStockAdjustment' => [
            'httpMethod' => 'POST',
            'uri' => 'stock_adjustments',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustment',
            ],
            'parameters' => [
                'adjustment_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'reason' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'stock_adjustment_reason_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ],
                'stock_adjustment_line_items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ]
            ],
        ],

        'UpdateStockAdjustment' => [
            'httpMethod' => 'PUT',
            'uri' => 'stock_adjustments/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustment',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'adjustment_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'reason' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteStockAdjustment' => [
            'httpMethod' => 'DELETE',
            'uri' => 'stock_adjustments/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * STOCK ADJUSTMENT LINE ITEM RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#stockadjustmentlineitem
         * --------------------------------------------------------------------------------
         */

        'GetStockAdjustmentLineItems' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_adjustment_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustment_line_items',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'stock_adjustment_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetStockAdjustmentLineItem' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_adjustment_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustment_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateStockAdjustmentLineItem' => [
            'httpMethod' => 'POST',
            'uri' => 'stock_adjustment_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustment_line_item',
            ],
            'parameters' => [
                'stock_adjustment_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'UpdateStockAdjustmentLineItem' => [
            'httpMethod' => 'PUT',
            'uri' => 'stock_adjustment_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_adjustment_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'stock_adjustment_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteStockAdjustmentLineItem' => [
            'httpMethod' => 'DELETE',
            'uri' => 'stock_adjustment_line_items/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * STOCK TRANSFER RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#stocktransfer
         * --------------------------------------------------------------------------------
         */

        'GetStockTransfers' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_transfers',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfers',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'source_location_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'destination_location_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'adjustment_number' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetStockTransfer' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_transfers/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfer',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateStockTransfer' => [
            'httpMethod' => 'POST',
            'uri' => 'stock_transfers',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfer',
            ],
            'parameters' => [
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'adjustment_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'received_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'source_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'destination_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'transacted_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'stock_transfer_line_item_ids' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
                'stock_transfer_line_items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ]
            ],
        ],

        'UpdateStockTransfer' => [
            'httpMethod' => 'PUT',
            'uri' => 'stock_transfers/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfer',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'status' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'adjustment_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'received_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'source_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'destination_location_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'transacted_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'stock_transfer_line_item_ids' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'DeleteStockTransfer' => [
            'httpMethod' => 'DELETE',
            'uri' => 'stock_transfers/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * STOCK TRANSFER LINE ITEM RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#stocktransferlineitem
         * --------------------------------------------------------------------------------
         */

        'GetStockTransferLineItems' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_transfer_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfer_line_items',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'stock_transfer_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetStockTransferLineItem' => [
            'httpMethod' => 'GET',
            'uri' => 'stock_transfer_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfer_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateStockTransferLineItem' => [
            'httpMethod' => 'POST',
            'uri' => 'stock_transfer_line_items',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfer_line_item',
            ],
            'parameters' => [
                'stock_transfer_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'image_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateStockTransferLineItem' => [
            'httpMethod' => 'PUT',
            'uri' => 'stock_transfer_line_items/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'stock_transfer_line_item',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'stock_transfer_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'variant_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'quantity' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'image_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteStockTransferLineItem' => [
            'httpMethod' => 'DELETE',
            'uri' => 'stock_transfer_line_items/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * TAX COMPONENT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#taxcomponent
         * --------------------------------------------------------------------------------
         */

        'GetTaxComponents' => [
            'httpMethod' => 'GET',
            'uri' => 'tax_components',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_components',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'tax_type_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetTaxComponent' => [
            'httpMethod' => 'GET',
            'uri' => 'tax_components/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_component',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateTaxComponent' => [
            'httpMethod' => 'POST',
            'uri' => 'tax_components',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_component',
            ],
            'parameters' => [
                'tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'compound' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'UpdateTaxComponent' => [
            'httpMethod' => 'PUT',
            'uri' => 'tax_components/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_component',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'tax_type_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'label' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'rate' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'compound' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteTaxComponent' => [
            'httpMethod' => 'DELETE',
            'uri' => 'tax_components/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * TAX TYPE RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#taxtype
         * --------------------------------------------------------------------------------
         */

        'GetTaxTypes' => [
            'httpMethod' => 'GET',
            'uri' => 'tax_types',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_types',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetTaxType' => [
            'httpMethod' => 'GET',
            'uri' => 'tax_types/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_type',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateTaxType' => [
            'httpMethod' => 'POST',
            'uri' => 'tax_types',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_type',
            ],
            'parameters' => [
                'code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'UpdateTaxType' => [
            'httpMethod' => 'PUT',
            'uri' => 'tax_types/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'tax_type',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
            ],
        ],

        'DeleteTaxType' => [
            'httpMethod' => 'DELETE',
            'uri' => 'tax_types/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * USER RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#user
         * --------------------------------------------------------------------------------
         */

        'GetUsers' => [
            'httpMethod' => 'GET',
            'uri' => 'users',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'users',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'login_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'account_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetUser' => [
            'httpMethod' => 'GET',
            'uri' => 'users/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'user',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'UpdateUser' => [
            'httpMethod' => 'PUT',
            'uri' => 'users/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'user',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'action_items_email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'avatar_url' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'billing_contact' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'email' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'first_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'last_name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'last_sign_in_at' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'location' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'login_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'mobile' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'notification_email' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'phone_number' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'sales_report_email' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'account_id' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'permissions' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'DeleteUser' => [
            'httpMethod' => 'DELETE',
            'uri' => 'users/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * VARIANT RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#variant
         * --------------------------------------------------------------------------------
         */

        'GetVariants' => [
            'httpMethod' => 'GET',
            'uri' => 'variants',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'variants',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
                'composite' => [
                    'location' => 'query',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'online_ordering' => [
                    'location' => 'query',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'order' => [
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'q' => [
                    'location' => 'query',
                    'type' => 'string',
                    'required' => false,
                ],
                'status' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'product_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'sku' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
                'default_ledger_account_id' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'product_type' => [
                    'location' => 'query',
                    'type' => ['string', 'array'],
                    'required' => false,
                ],
            ],
        ],

        'GetVariant' => [
            'httpMethod' => 'GET',
            'uri' => 'variants/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'variant',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateVariant' => [
            'httpMethod' => 'POST',
            'uri' => 'variants',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'variant',
            ],
            'parameters' => [
                'product_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => true,
                ],
                'default_ledger_account_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'buy_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'composite' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'description' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'keep_selling' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'manage_stock' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'max_online' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'online_ordering' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'opt1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt3' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'retail_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'sellable' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'sku' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'supplier_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'taxable' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'upc' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'weight' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'weight_unit' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['kg', 'gm', 'oz', 'lb']
                ],
                'weight_value' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'wholesale_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'variant_prices' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'UpdateVariant' => [
            'httpMethod' => 'PUT',
            'uri' => 'variants/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'variant',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
                'product_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'default_ledger_account_id' => [
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false,
                ],
                'buy_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'composite' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'description' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'keep_selling' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'manage_stock' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'max_online' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'name' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'online_ordering' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'opt1' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt2' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'opt3' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'position' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'retail_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'sellable' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'sku' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'supplier_code' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'taxable' => [
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false,
                ],
                'upc' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'weight' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'weight_unit' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['kg', 'gm', 'oz', 'lb'],
                ],
                'weight_value' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'wholesale_price' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'variant_prices' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                ],
            ],
        ],

        'DeleteVariant' => [
            'httpMethod' => 'DELETE',
            'uri' => 'variants/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * WEBHOOK RELATED METHODS
         *
         * DOC: http://developer.tradegecko.com/#webhook
         * --------------------------------------------------------------------------------
         */

        'GetWebhooks' => [
            'httpMethod' => 'GET',
            'uri' => 'webhooks',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'webhooks',
            ],
            'parameters' => [
                'ids' => [
                    'location' => 'query',
                    'type' => ['integer', 'array'],
                    'required' => false,
                ],
                'created_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'created_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_min' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'updated_at_max' => [
                    'location' => 'query',
                    'type' => 'string',
                    'format' => 'date-time',
                    'required' => false,
                ],
                'limit' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'max' => 250,
                    'required' => false,
                ],
                'page' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'min' => 1,
                    'required' => false,
                ],
            ],
        ],

        'GetWebhook' => [
            'httpMethod' => 'GET',
            'uri' => 'webhooks/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'webhook',
            ],
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],

        'CreateWebhook' => [
            'httpMethod' => 'POST',
            'uri' => 'webhooks',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'webhook',
            ],
            'parameters' => [
                'address' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'event' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                    'enum' => [
                        'account.update', 'user.create', 'product.create', 'product.update', 'product.destroy', 'variant.create',
                        'variant.update', 'variant.destroy', 'image.create', 'image.update', 'image.destroy', 'company.create', 'company.update',
                        'company.destroy', 'contact.create', 'contact.update', 'contact.destroy', 'address.create', 'address.update',
                        'address.destroy', 'order.create', 'order.update', 'order.destroy', 'invoice.create', 'invoice.update', 'invoice.destroy',
                        'fulfillment.create', 'fulfillment.update', 'fulfillment.destroy', 'purchase_order.create', 'purchase_order.update',
                        'purchase_order.destroy', 'procurement.create', 'procurement.update procurement.destroy', 'stock_adjustment.create',
                        'stock_adjustment.update', 'stock_adjustment.destroy', 'stock_transfer.create', 'stock_transfer.update', 'stock_transfer.destroy'
                    ]
                ],
            ],
        ],

        'UpdateWebhook' => [
            'httpMethod' => 'PUT',
            'uri' => 'webhooks/{id}',
            'responseModel' => 'GenericModel',
            'data' => [
                'root_key' => 'webhook',
            ],
            'parameters' => [
                'address' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                ],
                'event' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false,
                    'enum' => [
                        'account.update', 'user.create', 'product.create', 'product.update', 'product.destroy', 'variant.create',
                        'variant.update', 'variant.destroy', 'image.create', 'image.update', 'image.destroy', 'company.create', 'company.update',
                        'company.destroy', 'contact.create', 'contact.update', 'contact.destroy', 'address.create', 'address.update',
                        'address.destroy', 'order.create', 'order.update', 'order.destroy', 'invoice.create', 'invoice.update', 'invoice.destroy',
                        'fulfillment.create', 'fulfillment.update', 'fulfillment.destroy', 'purchase_order.create', 'purchase_order.update',
                        'purchase_order.destroy', 'procurement.create', 'procurement.update procurement.destroy', 'stock_adjustment.create',
                        'stock_adjustment.update', 'stock_adjustment.destroy', 'stock_transfer.create', 'stock_transfer.update', 'stock_transfer.destroy'
                    ]
                ],
            ],
        ],

        'DeleteWebhook' => [
            'httpMethod' => 'DELETE',
            'uri' => 'webhooks/{id}',
            'responseModel' => 'GenericModel',
            'parameters' => [
                'id' => [
                    'location' => 'uri',
                    'type' => 'integer',
                    'required' => true,
                ],
            ],
        ],
    ],

    'models' => [
        'GenericModel' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
    ],
];
