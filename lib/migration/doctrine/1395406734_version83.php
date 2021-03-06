<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version83 extends Doctrine_Migration_Base {

  public function up() {
    $this->dropForeignKey('pledge', 'plegde_pledge_item_id_pledge_item_id');
    $this->dropForeignKey('pledge', 'plegde_contact_id_contact_id');
    $this->removeIndex('pledge', 'plegde_pledge_item_id', array(
        'fields' =>
        array(
            0 => 'pledge_item_id',
        ),
    ));
    $this->removeIndex('pledge', 'plegde_contact_id', array(
        'fields' =>
        array(
            0 => 'contact_id',
        ),
    ));

    $this->createForeignKey('pledge', 'pledge_pledge_item_id_pledge_item_id', array(
        'name' => 'pledge_pledge_item_id_pledge_item_id',
        'local' => 'pledge_item_id',
        'foreign' => 'id',
        'foreignTable' => 'pledge_item',
        'onUpdate' => '',
        'onDelete' => 'CASCADE',
    ));
    $this->createForeignKey('pledge', 'pledge_contact_id_contact_id', array(
        'name' => 'pledge_contact_id_contact_id',
        'local' => 'contact_id',
        'foreign' => 'id',
        'foreignTable' => 'contact',
        'onUpdate' => '',
        'onDelete' => 'CASCADE',
    ));
    $this->addIndex('pledge', 'pledge_pledge_item_id', array(
        'fields' =>
        array(
            0 => 'pledge_item_id',
        ),
    ));
    $this->addIndex('pledge', 'pledge_contact_id', array(
        'fields' =>
        array(
            0 => 'contact_id',
        ),
    ));
  }

  public function down() {
    $this->dropForeignKey('pledge', 'pledge_pledge_item_id_pledge_item_id');
    $this->dropForeignKey('pledge', 'pledge_contact_id_contact_id');
    $this->removeIndex('pledge', 'pledge_pledge_item_id', array(
        'fields' =>
        array(
            0 => 'pledge_item_id',
        ),
    ));
    $this->removeIndex('pledge', 'pledge_contact_id', array(
        'fields' =>
        array(
            0 => 'contact_id',
        ),
    ));

    $this->createForeignKey('pledge', 'plegde_pledge_item_id_pledge_item_id', array(
        'name' => 'plegde_pledge_item_id_pledge_item_id',
        'local' => 'pledge_item_id',
        'foreign' => 'id',
        'foreignTable' => 'pledge_item',
        'onUpdate' => '',
        'onDelete' => 'CASCADE',
    ));
    $this->createForeignKey('pledge', 'plegde_contact_id_contact_id', array(
        'name' => 'plegde_contact_id_contact_id',
        'local' => 'contact_id',
        'foreign' => 'id',
        'foreignTable' => 'contact',
        'onUpdate' => '',
        'onDelete' => 'CASCADE',
    ));
    $this->addIndex('pledge', 'plegde_pledge_item_id', array(
        'fields' =>
        array(
            0 => 'pledge_item_id',
        ),
    ));
    $this->addIndex('pledge', 'plegde_contact_id', array(
        'fields' =>
        array(
            0 => 'contact_id',
        ),
    ));
  }

}
