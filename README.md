# The perfect PHP Kiyoh API

## How to install?
Install this project using composer: `composer require jketelaar/php-kiyoh-api`.

Then start using the API using something like:

```php
<?php
/**
 * @author JKetelaar
 */
require_once('vendor/autoload.php');

$connector = 'xxxxxxxx'; // Change with your hash
$count = 50; // Amount of reviews you want to get

$kiyoh = new \JKetelaar\Kiyoh\Kiyoh($connector, $count);

$company = $kiyoh->getCompany();

var_dump($company->getReviews()[0]->getId());

var_dump($company->getLocationName());
var_dump($company->getAverageRating());
var_dump($company->getNumberReviews());
```

### Example outputs
> TODO: Add example output
