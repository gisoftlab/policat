<?php
/*
 * Copyright (c) 2016, webvariants GmbH <?php Co. KG, http://www.webvariants.de
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

/**
 * Offer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    policat
 * @subpackage model
 * @author     Martin
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Offer extends BaseOffer implements BillInterface {

  public function getCountryName($culture = 'en') {
    try {
      $country = sfCultureInfo::getInstance($culture)->getCountry($this->getCountry());
    } catch (Exception $e) {
      $country = $this->getCountry();
    }
    return $country;
  }

  public function getSubst1() {
    $number = new sfNumberFormat('en');
    $date = new sfDateFormat('en');

    return array(
        '#FIRSTNAME#' => Util::enc($this->getFirstName()),
        '#LASTNAME#' => Util::enc($this->getLastName()),
        '#ORGANISATION#' => Util::enc($this->getOrganisation()),
        '#STREET#' => Util::enc($this->getStreet()),
        '#CITY#' => Util::enc($this->getCity()),
        '#POSTCODE#' => Util::enc($this->getPostCode()),
        '#COUNTRY#' => Util::enc($this->getCountryName()),
        '#VAT#' => Util::enc($this->getVat()),
        '#PRODUCTS#' => '1j34hnfsdfhiurw3lhrwjhbfndskmfsndfk1',
        '#TAX#' => $this->getTax() . '%',
        '#TAX-NOTE#' => $this->getTaxNote(),
        '#PRICE-BRUTTO#' => $number->format($this->getPriceBrutto(), 'c', StoreTable::value(StoreTable::BILLING_CURRENCY)),
        '#PRICE-NETTO#' => $number->format($this->getPrice(), 'c', StoreTable::value(StoreTable::BILLING_CURRENCY)),
        '#PRICE-TAX#' => $number->format($this->getPriceTax(), 'c', StoreTable::value(StoreTable::BILLING_CURRENCY)),
        '#DATE#' => $date->format($this->getCreatedAt(), 'yyyy-MM-dd')
    );
  }

  public function getSubst2() {
    return array(
        '1j34hnfsdfhiurw3lhrwjhbfndskmfsndfk1' => $this->getSubstProducts(),
    );
  }

  private function getSubstProducts() {
    $number = new sfNumberFormat('en');

    $html = '<table><tr><th>Name</th><th>E-mails total</th><th>Days</th><th>Price (net)</th></tr>';

    foreach ($this->getItems() as $item) {
      /* @var $item BillItem */
      $html .= sprintf('<tr><td>%s</td><td style="text-align: right;">%s</td><td style="text-align: right;">%s</td><td style="text-align: right;">%s</td></tr>', Util::enc($item->getName()), $number->format($item->getEmails()), $number->format($item->getDays()), $number->format($item->getPrice(), 'c', StoreTable::value(StoreTable::BILLING_CURRENCY)));
    }

    $html .= '</table>';

    return $html;
  }

  public function getTax() {
    return $this->_get('tax');
  }

  public function getPriceTax() {
    return $this->getPriceBrutto() - $this->getPrice();
  }

  public function setCity($city) {
    $this->_set('city', $city);
  }

  public function setCountry($country) {
    $this->_set('country', $country);
  }

  public function setFirstName($firstname) {
    $this->_set('first_name', $firstname);
  }

  public function setLastName($lastname) {
    $this->_set('last_name', $lastname);
  }

  public function setOrganisation($organisation) {
    $this->_set('organisation', $organisation);
  }

  public function setPostCode($postcode) {
    $this->_set('post_code', $postcode);
  }

  public function setPrice($price) {
    $this->_set('price', $price);
  }

  public function setPriceBrutto($price_brutto) {
    $this->_set('price_brutto', $price_brutto);
  }

  public function setStreet($street) {
    $this->_set('street', $street);
  }

  public function setTax($tax) {
    $this->_set('tax', $tax);
  }

  public function setTaxNote($note) {
    $this->_set('tax_note', $note);
  }

  public function setVat($vat) {
    $this->_set('vat', $vat);
  }

  public function addItemByQuota(Quota $quota) {
    $item = new OfferItem();
    $item->setName($quota->getName());
    $item->setEmails($quota->getEmails());
    $item->setDays($quota->getDays());
    $item->setPrice($quota->getPrice());

    $this->getItems()->add($item);
  }

}