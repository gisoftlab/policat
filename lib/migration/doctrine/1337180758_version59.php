<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version59 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('store', 'language_id', 'string', '5', array(
             'notnull' => '',
             ));
    }

    public function down()
    {
        $this->removeColumn('store', 'language_id');
    }
}