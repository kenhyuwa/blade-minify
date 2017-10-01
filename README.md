# Laravel Blade Minify

[![Laravel 5.3](https://img.shields.io/badge/Laravel-5.3-brightgreen.svg?style=flat-square)](http://laravel.com)
[![Laravel 5.4](https://img.shields.io/badge/Laravel-5.4-brightgreen.svg?style=flat-square)](http://laravel.com)
[![Laravel 5.5](https://img.shields.io/badge/Laravel-5.5-brightgreen.svg?style=flat-square)](http://laravel.com)
[![Total Downloads](https://poser.pugx.org/renatomarinho/laravel-blade-minify/downloads)](https://packagist.org/packages/renatomarinho/laravel-blade-minify)

### Simple package to minify HTML output on demand which results on a 35%+ optimization.
### Packages backup from RenatoMarinho\laravel-page-speed. Because I Just need this packases simple not complete packages like RenatoMarinho\laravel-page-speed

## Installation is easy

You can install the package via composer:

```bash
$ composer require kenhyuwa/blade-minify
```

Next, the \Ken\BladeMinify\Middleware\Minify::class - middleware must be registered in the kernel:

```php
//app/Http/Kernel.php

protected $middleware = [
    ...
    \Ken\BladeMinify\Middleware\Minify::class
]
```


#### Before

![Before of Laravel Blade Minify](https://i.imgur.com/cN3MWYh.png)

#### After

![After of Laravel Blade Minify](https://i.imgur.com/IKWKLkL.png)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
