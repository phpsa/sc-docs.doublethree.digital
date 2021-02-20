---
title: Events
id: 5ca7272b-da30-4033-a2f9-d1864ca5311e
---
Events can be useful if you need to listen out for when certain things in your application happen.

Simple Commerce provides a couple of events to help make your life easier.

## Listening for events

First, you'll need a Listener class. You can generate one by running `php artisan make:listener NameOfListener`. It'll generate a file in `App\Listeners`.

In the `handle` function of your event listener, that's where you write your logic that you need to happen when a certain event is triggered.

```php
class NameOfListener
{
    public function handle(NameOfEvent $event)
    {
        //
    }
}
```

Before your listener will actually listen to an event, you need to hook it up. You can do this in your `EventServiceProvider`, located in `App\Providers`.

```php
protected $listen = [
	NameOfEvent::class => [
    	NameOfListener::class,
    ],
];
```

And there you go, you have a listener listening to an event!

For more documentation around events and event listeners, consider reading [the Laravel documentation](https://laravel.com/docs/events).

## Available events

### CartCompleted (`DoubleThreeDigital\SimpleCommerce\Events\CartCompleted`)

This event is fired when an order/cart is complete and has been paid, usually after checking out.

```php
public function handle(CartCompleted $event)
{
	$event->cart;
  	$event->order;
}
```

### CartSaved (`DoubleThreeDigital\SimpleCommerce\Events\CartSaved`)

This event is fired when an order/cart has been saved. 

```php
public function handle(CartSaved $event)
{
	$event->cart;
}
```

### CartUpdated (`DoubleThreeDigital\SimpleCommerce\Events\CartUpdated`)

**I'd recommend you use the `CartSaved` event instead. The `CartUpdated` will be deprecated in future versions.**

This event is fired when an order/cart has been saved. 

```php
public function handle(CartUpdated $event)
{
	$event->cart;
}
```

### CouponRedeemed (`DoubleThreeDigital\SimpleCommerce\Events\CouponRedeemed`)

This event is fired when a customer adds a coupon to their cart/order.

```php
public function handle(CouponRedeemed $event)
{
	$event->coupon;
}
```

### CustomerAddedToCart (`DoubleThreeDigital\SimpleCommerce\Events\CustomerAddedToCart`)

This event is fired when a customer is attached to a cart/order.

```php
public function handle(CustomerAddedToCart $event)
{
	$event->cart;
}
```

### PostCheckout (`DoubleThreeDigital\SimpleCommerce\Events\PostCheckout`)

This event is fired after the checkout process has been completed.

```php
public function handle(PostCheckout $event)
{
	$event->data;
}
```

### PreCheckout (`DoubleThreeDigital\SimpleCommerce\Events\PreCheckout`)

This event is fired before the checkout process begins.

```php
public function handle(PreCheckout $event)
{
	$event->data;
}
```

### StockRunOut (`DoubleThreeDigital\SimpleCommerce\Events\StockRunOut`)

This event is fired when the [stock](https://sc-docs.doublethree.digital/v2.2/stock) for a product has ran out. 

```php
public function handle(StockRunOut $event)
{
	$event->product;
    $event->stock;
}
```

### StockRunningOut (`DoubleThreeDigital\SimpleCommerce\Events\StockRunningOut`)

This event is fired when the [stock](https://sc-docs.doublethree.digital/v2.2/stock) for a product is running low.

```php
public function handle(StockRunningOut $event)
{
	$event->product;
    $event->stock;
}
```