---
title: 'Cart Tags'
parent: e98d4e7b-3e63-4328-bacc-83ace3e2af42
id: 5fa3f4ee-5077-418f-9d07-95414d2544b4
---
### The whole cart
Gets the customer's cart so you can get details from it. Say you wanted the id of the cart for some reason, here's how that would work.

```
{{ sc:cart }}
 <p>The ID of your cart is {{ id }}</p>
{{ /sc:cart }}
```

### Cart Check
This tag allows you to check whether or not the customer currently has a cart attached to their session, it returns a boolean.

```
{{ if {sc:cart:has} === true }}
  ...
{{ /if }}
```

### Cart Items
Returns a loop of all the items in the customer's cart.

```
{{ sc:cart:items }}
  {{ quantity }}x {{ product:title }}
{{ /sc:cart:items }}
```

### Items Count
Gives you a count of how many items are in the customer's cart.

```
{{ sc:cart:count }}
```

### Totals
**Grand Total**
Returns the total of all the other totals. In fact, there's two ways of doing it.

```
This... {{ sc:cart:total }}

Does exactly the same thing as this... {{ sc:cart:grand_total }}
```

**Items Total**
Returns the total of every item in the cart.

```
{{ sc:cart:items_total }}
```

**Shipping Total**
Returns the shipping total of the cart.

```
{{ sc:cart:shipping_total }}
```

**Tax Total**
Returns the tax total of the cart.

```
{{ sc:cart:tax_total }}
```

**Coupon Total**
Returns the total of the coupons in the cart.

```
{{ sc:cart:coupon_total }}
```

### Add Cart Item
This tag allows you to add an item to your cart.

```
{{ sc:cart:addItem }}
  <input type="hidden" name="product" value="{{ id }}">
  <input type="number" name="quantity" value="2">
{{ /sc:cart:addItem }}
```

### Update Cart Item
This tag allows you to update the items in the cart.

```
{{ sc:cart:updateItem :item="id" }}
  <input type="number" name="quantity" value="2">
{{ /sc:cart:updateItem }}
```

### Remove Cart Item
This tag allows you to remove an existing item from the cart.

```
{{ sc:cart:removeItem :item="id" }}
  <button type="submit">Remove item from cart</button>
{{ /sc:cart:removeItem }}
```

### Update cart
This tag allows you to update data in the cart. Any form inputs will automatically be saved to the order entry.

```
{{ sc:cart:update }}
  <input type="text" name="delivery_note">
{{ /sc:cart:update }}
```

> **Hot Tip:** If you want to also update the customer at the same time, something like the below should work. Remember the `email`, it's required.

```
<input type="text" name="customer[name]">
<input type="email" name="customer[email]">
```

### Empty cart
This tag removes all the items in the cart.

```
{{ sc:cart:empty }}
  ...
{{ /sc:cart:empty }}
```