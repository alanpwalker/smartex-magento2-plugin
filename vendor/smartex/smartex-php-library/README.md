smartexio/smartex-php-library.git

=================

This is a self-contained PHP implementation of Smartex's cryptographically secure API: https://smartex.io/api

# Installation

## Composer

### Install Composer

```bash
curl -sS https://getcomposer.org/installer | php
```

### Install via composer by hand

Add to your composer.json file by hand.

```javascript
{
    ...
    "require": {
        ...
        "smartexio/smartex-php-library": "^1.0"
    }
    ...
}
```

Once you have added this, just run:

```bash
php composer.phar update smartexio/smartex-php-library
```

### Install using composer

```bash
php composer.phar require smartexio/smartex-php-library:^1.0
```

# Usage

## Autoloader

To use the library's autoloader (which doesn't include composer dependencies)
instead of composer's autoloader, use the following code:

```php
<?php
$autoloader = __DIR__ . '/relative/path/to/Smartex/Autoloader.php';
if (true === file_exists($autoloader) &&
    true === is_readable($autoloader))
{
    require_once $autoloader;
    \Smartex\Autoloader::register();
} else {
    throw new Exception('Smartex Library could not be loaded');
}
```

## Documentation

Please see the ``docs`` directory for information on how to use this library.

# Support

* https://github.com/smartexio/smartex-php-library/issues
# License

The MIT License (MIT)

Copyright (c) 2016 Smartex.io, Ltd.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
