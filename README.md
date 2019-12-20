# A PHP Kiyoh API
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-1-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->
[![Build Status](https://travis-ci.com/JKetelaar/PHP-Kiyoh-API.svg?branch=master)](https://travis-ci.com/JKetelaar/PHP-Kiyoh-API)

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

#### Company output
```php
var_dump($kiyoh->getCompany());
```
![KiyOh Company PHP Dump](docs/company_dump.png)


#### Review output
```php
var_dump($kiyoh->getCompany()->getReviews()[0]);
```
![KiyOh Company PHP Dump](docs/review_dump.png)

## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://github.com/menno-ll"><img src="https://avatars0.githubusercontent.com/u/50165380?v=4" width="100px;" alt=""/><br /><sub><b>Menno van den Ende</b></sub></a><br /><a href="https://github.com/JKetelaar/PHP-Kiyoh-API/commits?author=menno-ll" title="Code">💻</a> <a href="#ideas-menno-ll" title="Ideas, Planning, & Feedback">🤔</a></td>
  </tr>
</table>

<!-- markdownlint-enable -->
<!-- prettier-ignore-end -->
<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!