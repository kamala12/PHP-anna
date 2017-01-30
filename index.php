<?php

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
// import linkobject file
require_once CLASSES_DIR.'linkobject.php';
// create linkobject object, because it extends http object
$http = new linkobject();
// output http object
echo '<pre>';
print_r($http);
echo '</pre>';
// output http constants
echo HTTP_HOST.'<br />';
echo SCRIPT_NAME.'<br />';
echo PHP_SELF.'<br />';
echo REMOTE_ADDR.'<br />';
// set up vars array pair element_name => element_value
$http->set('kasutaja', 'anna');
// output http object vars element
echo '<pre>';
print_r($http->vars);
echo '</pre>';
echo '<hr />';
// create data elements for url testing
// name=value
//$link = '';
//$http->addToLink($link, 'user', 'test');
//$http->addToLink($link, 'parool', 'qwerty');
//name1=value1&name2=value2
$link = $http->getLink(array('user'=>'test', 'parool'=>'qwerty'));
// output link
echo $link;
require_once 'menu.php';



?>