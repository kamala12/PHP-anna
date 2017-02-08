<?php

// define constants
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
define('ACTS_DIR', 'acts/');
define('LIB_DIR', 'lib/');
define('LANG_DIR','lang/');
define('DEFAULT_ACT','default');

// user roles
define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);
// import classes
require_once LIB_DIR.'utils.php';
require_once CLASSES_DIR.'template.php'; // import template class file
require_once CLASSES_DIR.'http.php'; // import http class file
require_once CLASSES_DIR.'linkobject.php'; // import linkobject file
require_once CLASSES_DIR.'mysql.php'; // import database class file
require_once CLASSES_DIR . 'session.php'; // import session class
require_once LIB_DIR.'utils.php';
// import database configuration
require_once 'db_conf.php';
// create linkobject object, because it extends http object
$http = new linkobject();
// create database class object
$db = new mysql(DBHOST, DBUSER, DBPASS, DBNAME);
// create session object
$sess = new sessioon($http, $db);
// Lang support
$siteLangs = array(
'et' => 'Estonian',
'en' => 'English',
'ru' => 'Russian'
) ;
//Get lang id from url
$lang_id = $http->get('lang_id');
if(!isset($siteLangs[$lang_id])){
	//if not supported
	$land_id = DEAFAULT_LANG;
	$http->set('lang_id',$lang_id);
}
define('LANG_ID', $lang_id);

require_once LIB_DIR.'trans.php';
?>