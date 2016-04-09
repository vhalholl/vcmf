<?php

/**
 * Classe implémentant la gestion des sessions utilisateur
 */

class session
{

  private static $_session_name;
  private static $_issecure;
  private static $_httponly;
  private static $_cookieParams; 

  public function __construct()
  {
    ini_set('session.use_cookies', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.auto_start', 0);
    ini_set('session.hash_function', 1);
    ini_set('session.bits_per_character', 6);
    /*
     * TODO: memcached sqlite
     *
     * if(defined(SESSION_HANDLER))
     * {
     *  ini_set('session.save_handler', SESSION_HANDLER);
     *  ini_set('session.save_path', SESSION_HANDLER_PATH);
     * }
     */
  }

  public static function start()
  {
    self::$_session_name = uniqid('sn_');                // Set a uniq session name
    self::$_issecure = false;                            // TODO: Set to true when using https.
    self::$_httponly = true;                             // This stops javascript being able to access the session id.
    self::$_cookieParams = session_get_cookie_params();

    session_set_cookie_params( 
      self::$_cookieParams["lifetime"],
      self::$_cookieParams["path"],
      self::$_cookieParams["domain"],
      self::$_issecure,
      self::$_httponly
    );
    session_name(self::$_session_name);
    session_start();
    session_regenerate_id(true);                          // regenerated the session, delete the old one.
  }

  public static function stop()
  {
    self::$_cookieParams = session_get_cookie_params();

    setcookie(
      session_name(),
      '',
      time() - 42000,
      self::$_cookieParams["path"],
      self::$_cookieParams["domain"],
      self::$_cookieParams["secure"],
      self::$_cookieParams["httponly"]
    );
    session_unset();
    session_destroy();
  }
}
