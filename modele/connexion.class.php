<?php
/*
 * Modèle connexion
 * Gère les données affichées sur la page connexion
 * Hérite de database pour exécuter les requêtes SQL.
 */
require_once "modele/database.class.php";

class connexion extends database
{

  // Vérifie que le mail et le mdp entrés par l'utilisateur sont présents dans la bdd, permets la connexion
  public function getMdp($mail)
  {
    $data = array($mail);
    $req = 'SELECT mdp FROM utilisateur WHERE mail = ?;';
    $mdpUtilisateur = $this->execReqPrep($req, $data);
    return $mdpUtilisateur;
  }
}
