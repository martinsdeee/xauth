[![Build Status](https://travis-ci.org/martinsdeee/xauth.svg?branch=master)](https://travis-ci.org/martinsdeee/xauth)
[![Total Downloads](https://poser.pugx.org/martinsdeee/xauth/downloads.svg)](https://packagist.org/packages/martinsdeee/xauth)

# PACKAGE IN DEVELOPMENT STAGE

# Laravel 4 xAuth Package
Package for user authorization managament

### Package contains

* Session module
* Users module
* Profile module
* Groups module
* Roles module

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `martinsdeee/xauth`.

```js
{
    "require": {
        "martinsdeee/xlayout": "dev-master",
        "way/form": "dev-master",
        "martinsdeee/xauth": "dev-master"
    }
}
```

Next, update Composer from the Terminal:

```
composer update
```

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

```php
'Martinsdeee\Xauth\XauthServiceProvider'
```

Migrate database

```
php artisan migrate --package="martinsdeee/xauth"
```

Config User model `app/models/User.php`

```php

use Martinsdeee\Xauth\User as xUser;

class User extends xUser {

}

```


