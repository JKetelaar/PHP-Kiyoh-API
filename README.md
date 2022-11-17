# A PHP Kiyoh API
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-5-orange.svg?style=flat-square)](#contributors-)
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
  <tbody>
    <tr>
      <td align="center"><a href="http://jketelaar.nl/"><img src="https://avatars0.githubusercontent.com/u/3681904?v=4?s=100" width="100px;" alt="Jeroen Ketelaar"/><br /><sub><b>Jeroen Ketelaar</b></sub></a><br /><a href="#maintenance-JKetelaar" title="Maintenance">🚧</a> <a href="https://github.com/JKetelaar/PHP-Kiyoh-API/pulls?q=is%3Apr+reviewed-by%3AJKetelaar" title="Reviewed Pull Requests">👀</a> <a href="https://github.com/JKetelaar/PHP-Kiyoh-API/commits?author=JKetelaar" title="Code">💻</a> <a href="#infra-JKetelaar" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a> <a href="#ideas-JKetelaar" title="Ideas, Planning, & Feedback">🤔</a></td>
      <td align="center"><a href="https://github.com/menno-ll"><img src="https://avatars0.githubusercontent.com/u/50165380?v=4?s=100" width="100px;" alt="Menno van den Ende"/><br /><sub><b>Menno van den Ende</b></sub></a><br /><a href="https://github.com/JKetelaar/PHP-Kiyoh-API/commits?author=menno-ll" title="Code">💻</a> <a href="#ideas-menno-ll" title="Ideas, Planning, & Feedback">🤔</a></td>
      <td align="center"><a href="http://mediadevs.nl"><img src="https://avatars3.githubusercontent.com/u/38211249?v=4?s=100" width="100px;" alt="Mike van Diepen"/><br /><sub><b>Mike van Diepen</b></sub></a><br /><a href="https://github.com/JKetelaar/PHP-Kiyoh-API/commits?author=mikevandiepen" title="Code">💻</a> <a href="https://github.com/JKetelaar/PHP-Kiyoh-API/commits?author=mikevandiepen" title="Tests">⚠️</a></td>
      <td align="center"><a href="https://github.com/joldnl"><img src="https://avatars.githubusercontent.com/u/4668261?v=4?s=100" width="100px;" alt="joldnl"/><br /><sub><b>joldnl</b></sub></a><br /><a href="https://github.com/JKetelaar/PHP-Kiyoh-API/commits?author=joldnl" title="Code">💻</a></td>
      <td align="center"><a href="http://www.kingsquare.nl/"><img src="https://avatars.githubusercontent.com/u/1492861?v=4?s=100" width="100px;" alt="Robin Speekenbrink"/><br /><sub><b>Robin Speekenbrink</b></sub></a><br /><a href="https://github.com/JKetelaar/PHP-Kiyoh-API/commits?author=fruitl00p" title="Code">💻</a></td>
    </tr>
  </tbody>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!