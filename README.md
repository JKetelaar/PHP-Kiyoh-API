# A PHP KiyOh API
[![Build Status](https://travis-ci.com/JKetelaar/PHP-KiyOh-API.svg?branch=master)](https://travis-ci.com/JKetelaar/PHP-KiyOh-API)

## How to install?
Install this project using composer: `composer require jketelaar/php-KiyOh-api`.

Then start using the API using something like:

```php
<?php
/**
 * @author JKetelaar
 */
require_once('vendor/autoload.php');

$connector = 'xxxxxxxx'; // Change with your hash
$count = 50; // Amount of reviews you want to get

$KiyOh = new \JKetelaar\KiyOh\KiyOh($connector, $count);

$company = $KiyOh->getCompany();

var_dump($company->getReviews()[0]->getId());

var_dump($company->getLocationName());
var_dump($company->getAverageRating());
var_dump($company->getNumberReviews());
```

### Example outputs

#### Company output
```php
var_dump($KiyOh->getCompany());
```
![KiyOh Company PHP Dump](docs/company_dump.png)


#### Review output
```php
var_dump($KiyOh->getCompany()->getReviews()[0]);
```
![KiyOh Company PHP Dump](docs/review_dump.png)
