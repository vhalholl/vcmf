<?php

/**
 * Classe implémentant singleton pour PDO
 */

class pdosingleton extends PDO
{
  private static $_instance;

  public function __construct( ) { }

  public static function getInstance()
  {
    if (!isset(self::$_instance))
    {
      try
      {
        self::$_instance = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
      }
      catch (PDOException $e)
      {
        #TODO: Error msg
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
      }
    }
    return self::$_instance;
  }
}
