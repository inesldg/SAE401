<?php
require_once "modele/database.class.php";

class connexion extends database {

  public function getMdp($mail)
  {
      $data = array($mail);
      $req = 'SELECT mdp FROM utilisateurs WHERE mail = ?;';
      $mdpUtilisateur = $this->execReqPrep($req, $data);
      return $mdpUtilisateur;
  }
}