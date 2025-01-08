# About RoleLadder

A Laravel package to manage roles with a hierarchical structure, represented as a clear and intuitive ladder.

> ⚠️ This code was used for educational purposes [...]

### Installation

You can install the package via composer. Run the following command:

```
composer require italofantone/role-ladder
```

### Usage

```
<?php

use Illuminate\Support\Facades\Route;
use Italofantone\RoleLadder\Http\Middleware\RoleLadderMiddleware;

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware(RoleLadderMiddleware::class.':admin')->group(function () {
        Route::get('/test-role-admin', function () {
            return 'This route is only for admins!';
        });
    });
});
```

To publish the configuration files for **Role Ladder**, run the following artisan command:

```
php artisan vendor:publish --tag=role-ladder-config
```

## Contact

- **Email**: [i@rimorsoft.com](mailto:i@rimorsoft.com)
- **Twitter**: [@italofantone](https://twitter.com/italofantone)
- **LinkedIn**: [italofantone](https://linkedin.com/in/italofantone)

## Donations

If you find this project useful and would like to support its development, you can make a donation via PayPal:

- **PayPal:** [Donate via PayPal](https://paypal.me/italofantone)

Thank you for your support!