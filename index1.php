<?php
// index.php

// create and template object
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
require_once CLASSES_DIR.'template.php';
// and use it
// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');
// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');
$tmpl->set('menu', 'minu menüü');
$tmpl->set('nav_bar', 'minu navigatsioon');
$tmpl->set('lang_bar', 'minu keeleriba');
$tmpl->set('content', 'minu sisu');
/*
// control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
*/
// output template content set up with real values
echo $tmpl->parse();
//
// http object testing
echo '<hr />';
// import http class file
require_once CLASSES_DIR.'http.php';
// create http object
$http = new http();
// output http object
echo '<pre>';
print_r($http);
echo '</pre>';
// output http constants
echo HTTP_HOST.'<br />';
echo SCRIPT_NAME.'<br />';
echo PHP_SELF.'<br />';
echo REMOTE_ADDR.'<br />';

$http->set ('kasutaja', 'oliver');

echo '<pre>';
print_r($http->vars);
echo '</pre>';

?>