# The perfect PHP Kiyoh API

## How to install?
Install this project using composer: `composer require jketelaar/php-kiyoh-api`.

Then start using the API using something like:

```php
<?php
require_once('vendor/autoload.php');

$connector = 'YOUR_CONNECTOR_CODE'; // Change with your Connector code
$company = 1234; // Change with your Company number

$kiyoh = new \JKetelaar\Kiyoh\Kiyoh($connector, $company);

/** @var \JKetelaar\Kiyoh\Models\Review[] $reviews */
$reviews = $kiyoh->getReviews();

var_dump($reviews[0]->getId());
// ..

/** @var \JKetelaar\Kiyoh\Models\Company $company */
$company = $kiyoh->getCompany();

var_dump($company->getTotalScore());
var_dump($company->getUrl());
var_dump($company->getCategory());
var_dump($company->getCategory()->getTitle());
var_dump($company->getAverageScores()->getQuestions());
// ..
```

### Example outputs
```php
$kiyoh->getReviews();
```
![alt text](docs/get_reviews_sample.png "getReviews() sample data")

```php
$kiyoh->getCompany();
```
![alt text](docs/get_company_sample.png "getCompany() sample data")
