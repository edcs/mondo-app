# Mondo Web App

This is an example PHP and Laravel application used to demonstrate interactions with the Mondo API. It was built for the 
March 2016 [POD Point](https://pod-point.com) Academy on the subject of 'Where Are All The Servers?' which was a
discussion session about the cloud, APIs and DevOps.

## Installation

You can either download the zip or clone the repository using the git command line application, like so:

```bash
$ git clone https://github.com/edcs/mondo-app
```

You then need to install the composer dependancies, like so:

```bash
$ composer install
```

It's recommended that you use something like Vagrant to run this application locally, however you can get away with
using PHPs own built in web server, like so:

```bash
$ php artisan serve
```

Homestead is ideal for running Laravel applications locally. If you've not installed it, check out the documentation on
the Laravel website and give it a go.

## Testing

The test suite is built using PHPUnit, the following command will run them:

```bash
$ vendor/bin/phpunit
```
