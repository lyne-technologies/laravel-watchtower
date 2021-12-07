# Laravel Watchtower | Laravel Error Notification

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lynetechnologies/laravel-watchtower.svg?style=flat-square)](https://packagist.org/packages/lynetechnologies/laravel-watchtower)
[![Total Downloads](https://img.shields.io/packagist/dt/lynetechnologies/laravel-watchtower.svg?style=flat-square)](https://packagist.org/packages/lynetechnologies/laravel-watchtower)

Looking for a free laravel error reporting package? Well you've arrived at the right place! Laravel Watchtower is simple yet affective package that notifies you when an error is hit on your site.

## Installation

You can install the package via composer:

```bash
composer require lynetechnologies/laravel-watchtower
```

Next, in your ``app/Exceptions/Handle.php`` add the below in the register method.
```php
public function register()
{
    //...
    $this->reportable(function (Throwable $e) {
        (new LaravelWatchtower())->capture($e);
    });
    //...
}
```

## Usage

#### Email
To enable email notifications add the below to your .env file.
```dotenv
WATCHTOWER_EMAIL_ACTIVE=true
WATCHTOWER_EMAIL_RECIPIENTS='name@example.com,name2@example.com'
```

#### Slack
To enable Slack notifications follow the below.

In your Slack App you see the + symbol next to "Apps", click on the icon, and search "Incoming Webhook" in the search bar.

Then install the Incoming Webhook application. Now go to the setting tab inside the Incoming Webhook app which you just install. You'll be asked to provide the channel name, then you’ll get a Webhook URL. **Use that in your env file**.

```dotenv
WATCHTOWER_SLACK_ACTIVE=true
WATCHTOWER_SLACK_HOOK='XXXXXXXX/WEBHOOK/URL_GOES_HERE_XXXXXX'
```

To change which channel the errors go to, you can either use the below or update the webhook settings.

```dotenv
WATCHTOWER_SLACK_CHANNEL='#error'
```


#### Local

You can store the error notifications locally for you to properly review at a later date.

```dotenv
WATCHTOWER_LOCAL_ACTIVE=true
```

Route names, endpoints and most importantly middleware can all be managed within the config file.

**Prune the table**

Use the below variable to define the age in days to prune. Defaults to 0, which will stop any pruning. 
```dotenv
WATCHTOWER_LOCAL_PRUNE=14
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please report security vulnerabilities to hello@lynetechnologies.com.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
