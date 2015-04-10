<?php

/**
 * DefaultText
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    policat
 * @subpackage model
 * @author     Martin
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class DefaultText extends BaseDefaultText
{
  const TEXT_VALIDATION        = 'validation';      // petition
  const TEXT_TELLYOURFRIEND    = 'tellyourfriend';  // petition
  const TEXT_PRIVACY_POLICY    = 'privacy_policy';  // petition
  const TEXT_AGREEMENT         = 'agreement';
  const TEXT_AGREEMENT_EMAIL   = 'agreement_email';
  const TEXT_AGREEMENT_REPLY   = 'agreement_reply';

  public static $TEXT = array(
    self::TEXT_VALIDATION      => 'Verification',
    self::TEXT_TELLYOURFRIEND  => 'Tell your friend',
    self::TEXT_PRIVACY_POLICY  => 'Privacy Policy',
    self::TEXT_AGREEMENT       => 'Privacy agreement (default text)',
    self::TEXT_AGREEMENT_EMAIL => 'Privacy agreement email (for all campaigns)',
    self::TEXT_AGREEMENT_REPLY => 'Privacy agreement email reply (for all campaigns)',
  );


  public static function fetchText($text, $language_id = 'en', $fallback_language_id = 'en') {
    $dts = Doctrine_Core::getTable('DefaultText')->createQuery('dt')
      ->where('dt.text = ?', $text)
      ->andWhere('dt.language_id = ? OR dt.language_id = ?', array($language_id, $fallback_language_id))
      ->select('dt.language_id, dt.subject, dt.body')
      ->limit(2)
      ->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

    switch (count($dts)) {
      case 0: return array('', '');
      case 2: if ($dts[1]['language_id'] == $language_id) return array($dts[1]['subject'], $dts[1]['body']);
      case 1: return array($dts[0]['subject'], $dts[0]['body']);
    }
  }
}