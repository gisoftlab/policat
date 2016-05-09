<?php

/**
 * BaseOffer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property integer $campaign_id
 * @property string $first_name
 * @property string $last_name
 * @property string $organisation
 * @property string $street
 * @property string $city
 * @property string $post_code
 * @property string $country
 * @property string $vat
 * @property decimal $price
 * @property decimal $tax
 * @property clob $tax_note
 * @property decimal $price_brutto
 * @property clob $markup
 * @property sfGuardUser $User
 * @property Campaign $Campaign
 * @property Doctrine_Collection $Items
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getUserId()       Returns the current record's "user_id" value
 * @method integer             getCampaignId()   Returns the current record's "campaign_id" value
 * @method string              getFirstName()    Returns the current record's "first_name" value
 * @method string              getLastName()     Returns the current record's "last_name" value
 * @method string              getOrganisation() Returns the current record's "organisation" value
 * @method string              getStreet()       Returns the current record's "street" value
 * @method string              getCity()         Returns the current record's "city" value
 * @method string              getPostCode()     Returns the current record's "post_code" value
 * @method string              getCountry()      Returns the current record's "country" value
 * @method string              getVat()          Returns the current record's "vat" value
 * @method decimal             getPrice()        Returns the current record's "price" value
 * @method decimal             getTax()          Returns the current record's "tax" value
 * @method clob                getTaxNote()      Returns the current record's "tax_note" value
 * @method decimal             getPriceBrutto()  Returns the current record's "price_brutto" value
 * @method clob                getMarkup()       Returns the current record's "markup" value
 * @method sfGuardUser         getUser()         Returns the current record's "User" value
 * @method Campaign            getCampaign()     Returns the current record's "Campaign" value
 * @method Doctrine_Collection getItems()        Returns the current record's "Items" collection
 * @method Offer               setId()           Sets the current record's "id" value
 * @method Offer               setUserId()       Sets the current record's "user_id" value
 * @method Offer               setCampaignId()   Sets the current record's "campaign_id" value
 * @method Offer               setFirstName()    Sets the current record's "first_name" value
 * @method Offer               setLastName()     Sets the current record's "last_name" value
 * @method Offer               setOrganisation() Sets the current record's "organisation" value
 * @method Offer               setStreet()       Sets the current record's "street" value
 * @method Offer               setCity()         Sets the current record's "city" value
 * @method Offer               setPostCode()     Sets the current record's "post_code" value
 * @method Offer               setCountry()      Sets the current record's "country" value
 * @method Offer               setVat()          Sets the current record's "vat" value
 * @method Offer               setPrice()        Sets the current record's "price" value
 * @method Offer               setTax()          Sets the current record's "tax" value
 * @method Offer               setTaxNote()      Sets the current record's "tax_note" value
 * @method Offer               setPriceBrutto()  Sets the current record's "price_brutto" value
 * @method Offer               setMarkup()       Sets the current record's "markup" value
 * @method Offer               setUser()         Sets the current record's "User" value
 * @method Offer               setCampaign()     Sets the current record's "Campaign" value
 * @method Offer               setItems()        Sets the current record's "Items" collection
 * 
 * @package    policat
 * @subpackage model
 * @author     Martin
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOffer extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('offer');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('campaign_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('first_name', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
        $this->hasColumn('last_name', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
        $this->hasColumn('organisation', 'string', 120, array(
             'type' => 'string',
             'length' => 120,
             ));
        $this->hasColumn('street', 'string', 120, array(
             'type' => 'string',
             'length' => 120,
             ));
        $this->hasColumn('city', 'string', 120, array(
             'type' => 'string',
             'length' => 120,
             ));
        $this->hasColumn('post_code', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('country', 'string', 2, array(
             'type' => 'string',
             'length' => 2,
             ));
        $this->hasColumn('vat', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
        $this->hasColumn('price', 'decimal', 10, array(
             'type' => 'decimal',
             'notnull' => true,
             'scale' => 2,
             'length' => 10,
             ));
        $this->hasColumn('tax', 'decimal', 5, array(
             'type' => 'decimal',
             'notnull' => true,
             'scale' => 2,
             'length' => 5,
             ));
        $this->hasColumn('tax_note', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('price_brutto', 'decimal', 10, array(
             'type' => 'decimal',
             'notnull' => true,
             'scale' => 2,
             'length' => 10,
             ));
        $this->hasColumn('markup', 'clob', null, array(
             'type' => 'clob',
             ));

        $this->option('symfony', array(
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Campaign', array(
             'local' => 'campaign_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('OfferItem as Items', array(
             'local' => 'id',
             'foreign' => 'offer_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}