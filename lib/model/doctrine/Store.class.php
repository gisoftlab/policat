<?php

/**
 * Store
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    policat
 * @subpackage model
 * @author     Martin
 */
class Store extends BaseStore {

  public function getField($name, $default = null) {
    return $this->utilGetFieldFromArray('value', $name, $default);
  }

  public function setField($name, $value) {
    $this->utilSetFieldFromArray('value', $name, $value);
  }

}