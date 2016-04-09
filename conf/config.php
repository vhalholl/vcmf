<?php

/*
 * Status
 */

define('STATUS', 'dev'); // dev || prod

/*
 * Locales
 */

define('TIMEZONE', 'Europe/Paris'); //Europe/Paris || UTC
define('LOCALE', 'FR_fr');

/*
 * Database
 */

define('SQL_DSN', 'mysql:host=localhost;dbname=webmgmt');
define('SQL_USR', 'webadmin');
define('SQL_PWD', 'MyTest1n9P4ssW0rd!');

/*
 * Behavior
 */

define('FORCE_SSL', TRUE);

define('CAS_AUTH', TRUE);

define('URL_REWRITE', TRUE);

define('COMPRESION_HANDLER', TRUE);

define('CACHE', FALSE);
define('CACHE_TIME', 3600);
