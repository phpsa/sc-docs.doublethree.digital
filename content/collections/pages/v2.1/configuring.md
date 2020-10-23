---
title: Configuring
id: 8320cccf-4567-4c28-b604-5da80b8b6d3f
origin: 74427f4f-8485-4ee9-a0ec-a729a78e59a5
---
During addon installation, a `config/simple-commerce.php` is published in your project, this is where your Simple Commerce configuration lives.

Most of the available configuration options are documented alongside the feature documentation. This page documents the rest of the configuration options.

## Site configuration
Statamic has a concept of sites. Each Statamic instance can have one or more sites. For each of those sites you can use a different currency, a different tax configuration and different shipping methods.

```php
/*
|--------------------------------------------------------------------------
| Sites
|--------------------------------------------------------------------------
|
| For each of your Statamic sites, you can setup a new store which allows you
| to use different currencies, tax rates and shipping methods.
|
*/

'sites' => [
    'default' => [
        'currency' => 'GBP',

        'tax' => [
            'rate' => 20,
            'included_in_prices' => false,
        ],

        'shipping' => [
            // Documented alongside shipping
        ],
    ],
],
```

Whenever you want to add another site to Simple Commerce, just change the array key from `default` to your new one. Remember to keep the site key the same between the Simple Commerce config and the Statamic config.

```
'sites' => [
    'default' => [...],
    'french' => [...],
],
```

> **🔥 Hot Tip:** Also remember that if you're wanting to use multiple sites, you'll need to [purchase & enable Statamic Pro](https://statamic.dev/licensing).

With each site you can configure the currency being used and the tax rate applied to products in the customers' cart.


## Collections & Taxonomies
```php
/*
|--------------------------------------------------------------------------
| Collections & Taxonomies
|--------------------------------------------------------------------------
|
| Simple Commerce uses Statamic's native collections and taxonomies functionality.
| It will automatically create collections/taxonomies upon addon installation if
| they don't already exist. However, if you'd like to use a different collection
| or taxonomy, like one you've already setup, here's the place to change that.
|
*/

'collections' => [
    'products' => 'products',
    'orders' => 'orders',
    'coupons' => 'coupons',
],

'taxonomies' => [
    'product_categories' => 'product_categories',
    'order_statuses'     => 'order_statuses',
],
```

If you'd like to change the collections and handles used for certain things in Simple Commerce, we allow you to do that. Just change the appropriate value to the handle of the collection you'd like to use instead.

For example, to use a collection called `Discounts`, with a handle of `discounts` for your coupons, you could configure that like this:

```php
'collections' => [
    ...,
    'coupons' => 'discounts',
],
```

## Various other options
There's a few smaller configuration options too. We've documented them in some bullet points below.

* `cart_key` will determine the session key used for a customers' cart.
* `minimum_order_number` allows you to set the minimum for order numbers to start at. By default it is `2000`, so order title's will be `#2000`, `#2001`, etc
* `low_stock_threshold` allows you to determine the threshold at which you'd like to be notified about stock running low for your products.