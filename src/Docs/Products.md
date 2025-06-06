# Product Operations

This documentation covers operations related to WhatsApp Business products and catalogs.

## Product Listings

### Get All Products

Retrieve all products for a business:

```php
// Method 1: Array parameter
LetsBot::products()->send(['phone' => $phone]);

// Method 2: Fluent interface
LetsBot::products()
    ->phone($phone)
    ->send();
```

### Get Product by ID

Retrieve a specific product using its ID:

```php
// Method 1: Array parameter
LetsBot::getProduct()->send([
    'phone' => $phone,
    'productId' => '6198355910228429'
]);

// Method 2: Fluent interface
LetsBot::getProduct()
    ->phone($phone)
    ->productId('6198355910228429')
    ->send();
```

## Product Management

### Create Product

Add a new product to your catalog:

```php
// Method 1: Array parameter
LetsBot::createProduct()->send([
    'phone' => $phone,
    'name' => 'Product name',
    'description' => 'Product description',
    'price' => 1000,
    'currency' => 'SAR',   // ISO currency code
    'isHidden' => 0,       // 0 = visible, 1 = hidden
    'images' => $images    // Array of image URLs
]);

// Method 2: Fluent interface
LetsBot::createProduct()
    ->phone($phone)
    ->name('Product name')
    ->description('Product description')
    ->price(1000)
    ->currency('SAR')      // ISO currency code
    ->isHidden(0)          // 0 = visible, 1 = hidden
    ->images($images)      // Array of image URLs
    ->send();
```

## Order Management

### Get Order Information

Retrieve information about a specific order:

```php
// Method 1: Array parameter
LetsBot::getOrder()->send([
    'orderId' => '456',
    'orderToken' => 'aaa',
]);

// Method 2: Fluent interface
LetsBot::getOrder()
    ->orderId('456')
    ->orderToken('aaa')
    ->send();
```
