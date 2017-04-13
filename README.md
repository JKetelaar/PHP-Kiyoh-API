# The perfect PHP Kiyoh API

## How to install?
Install this project using Composer; `composer require jketelaar/php-kiyoh-api`.

Then start using the API using something like:
```
<?php
require_once('vendor/autoload.php');

$connector = 'YOUR_CONNECTOR_CODE'; // Change with your Connector code
$company = 1234; // Change with your Company number

$kiyoh = new \JKetelaar\Kiyoh\Kiyoh($connector, $company);
$reviews = $kiyoh->getReviews();
echo($reviews[0]->getId());
```