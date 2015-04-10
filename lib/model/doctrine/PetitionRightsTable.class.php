<?php

/**
 * PetitionRightsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PetitionRightsTable extends Doctrine_Table {

  /**
   * Returns an instance of this class.
   *
   * @return PetitionRightsTable
   */
  public static function getInstance() {
    return Doctrine_Core::getTable('PetitionRights');
  }

  public function adminIds(sfGuardUser $user) {
    $ids = $this->createQuery('pr')
      ->where('pr.user_id = ? AND pr.admin = 1 AND pr.active = 1', $user->getId())->select('pr.petition_id')
      ->execute(array(), Doctrine_Core::HYDRATE_SCALAR);
    return array_map('reset', $ids);
  }

  public function queryByPetitionAndUser(Petition $petition, sfGuardUser $user) {
    return $this->createQuery('pr')
        ->where('pr.petition_id = ? AND pr.user_id = ?', array($petition->getId(), $user->getId()));
  }

  public function queryByPetition(Petition $petition, $fetch_users = true) {
    $query = $this->createQuery('pr')
      ->where('pr.petition_id = ?', $petition->getId());

    if ($fetch_users)
      $query->addFrom('pr.User u');

    return $query;
  }

  /**
   *
   * @param int $petition_id
   * @param int $user_ids
   * @return Doctrine_Query
   */
  public function queryByPetitionAndUsers($petition_id, $user_ids) {
    return $this->createQuery('pr')
        ->where('pr.petition_id = ?', $petition_id)
        ->andWhereIn('pr.user_id', $user_ids);
  }

  /**
   *
   * @param sfGuardUser $user
   * @return Doctrine_Query
   */
  public function queryByUser(sfGuardUser $user) {
    return $this->createQuery('pr')
        ->where('pr.user_id = ?', $user->getId())
        ->leftJoin('pr.Petition p')
        ->select('pr.*, p.*');
  }
  
  /**
   *
   * @param Petition $petition
   * @param type $fetch_users
   * @return Doctrine_Query
   */
  public function queryByPetitionAndAdmin(Petition $petition, $fetch_users = true) {
    return $this->queryByPetition($petition, $fetch_users)->andWhere('pr.active = 1 AND pr.admin = 1');
  }
  
}