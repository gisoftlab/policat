<?php

/**
 * CountryCollection
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    policat
 * @subpackage model
 * @author     Martin
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CountryCollection extends BaseCountryCollection {

  public function getCountriesList() {
    return explode(',', $this->getCountries());
  }

  public function setCountriesList($list) {
    $this->setCountries(implode(',', (array) $list));
  }

}