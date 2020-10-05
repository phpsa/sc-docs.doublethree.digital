---
title: 'Update Guide'
id: 1322d92b-74f9-485b-977e-ce981ec83ddb
published: false
---
Every so often, there's a few breaking changes between updates of Simple Commerce. We aim to document those breaking changes here.

## Updating from v2.0 to v2.1

```
composer update doublethreedigital/simple-commerce:^2.1
```

### New Configuration Values
v2.1 added two new configuration values, `minimum_order_number` and `low_stock_threshold`. It's recommended to add these to your `config/simple-commerce.php` file...

```php
/*
    |--------------------------------------------------------------------------
    | Order Number
    |--------------------------------------------------------------------------
    |
    | If you want to, you can change the minimum order number for your store. This won't
    | affect past orders, just ones in the future.
    |
    */

    'minimum_order_number' => 2000,

    /*
    |--------------------------------------------------------------------------
    | Stock Running Low
    |--------------------------------------------------------------------------
    |
    | Simple Commerce can be configured to emit events when stock is running low for
    | products. Here is where you can configure the threshold when we start sending
    | those notifications.
    |
    */

    'low_stock_threshold' => 25,
```

### Gateway Changes
Instead of passing in arrays and request objects to various methods, Simple Commerce now has data transfer objects which will be passed into gateway methods. It's also expected that gateway methods will also return them.

Below is the updated gateway interface. Review your gateway for any changes:

```php
<?php

namespace DoubleThreeDigital\SimpleCommerce\Contracts;

use DoubleThreeDigital\SimpleCommerce\Data\Gateways\GatewayPrep;
use DoubleThreeDigital\SimpleCommerce\Data\Gateways\GatewayPurchase;
use DoubleThreeDigital\SimpleCommerce\Data\Gateways\GatewayResponse;
use Illuminate\Http\Request;
use Statamic\Entries\Entry;

interface Gateway
{
    public function name(): string;

    public function prepare(GatewayPrep $data): GatewayResponse;

    public function purchase(GatewayPurchase $data): GatewayResponse;

    public function purchaseRules(): array;

    public function getCharge(Entry $order): GatewayResponse;

    public function refundCharge(Entry $order): GatewayResponse;

    public function webhook(Request $request);
}
```

As well as changes to the methods, remember to add in the new `webhook` method and extend your gateway class from the `BaseGateway` for access to helper methods.

### Shipping Method Updates
Shipping Method's haven't been updated hugely, it's just a small change to some of the method signatures. Review your shipping method against the Shipping Method interface:

```
<?php

namespace DoubleThreeDigital\SimpleCommerce\Contracts;

use DoubleThreeDigital\SimpleCommerce\Data\Address;
use Statamic\Entries\Entry;

interface ShippingMethod
{
    public function name(): string;

    public function description(): string;

    public function calculateCost(Entry $order): int;

    public function checkAvailability(Address $address): bool;
}
```

### Translations and Views
If you published the Simple Commerce translations and views in v2.0, we recommend re-publishing them after updating to v2.1.

```
php artisan vendor:publish --provider="DoubleThreeDigital\SimpleCommerce\ServiceProvider"
```