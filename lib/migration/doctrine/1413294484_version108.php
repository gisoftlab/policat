<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version108 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('api_token_offset', 'api_token_offset_petition_api_token_id_petition_api_token_id', array(
             'name' => 'api_token_offset_petition_api_token_id_petition_api_token_id',
             'local' => 'petition_api_token_id',
             'foreign' => 'id',
             'foreignTable' => 'petition_api_token',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('petition_api_token', 'petition_api_token_petition_id_petition_id', array(
             'name' => 'petition_api_token_petition_id_petition_id',
             'local' => 'petition_id',
             'foreign' => 'id',
             'foreignTable' => 'petition',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('api_token_offset', 'api_token_offset_petition_api_token_id', array(
             'fields' => 
             array(
              0 => 'petition_api_token_id',
             ),
             ));
        $this->addIndex('petition_api_token', 'petition_api_token_petition_id', array(
             'fields' => 
             array(
              0 => 'petition_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('api_token_offset', 'api_token_offset_petition_api_token_id_petition_api_token_id');
        $this->dropForeignKey('petition_api_token', 'petition_api_token_petition_id_petition_id');
        $this->removeIndex('api_token_offset', 'api_token_offset_petition_api_token_id', array(
             'fields' => 
             array(
              0 => 'petition_api_token_id',
             ),
             ));
        $this->removeIndex('petition_api_token', 'petition_api_token_petition_id', array(
             'fields' => 
             array(
              0 => 'petition_id',
             ),
             ));
    }
}