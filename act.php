<?php
$act = $http->get('act');
echo 'act value = '.$act.'<br />';
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';
//control act file
if(file_exists($fn) and is_file($fn) and is_readable($fn)){
    require_once $fn;
} else {
    // if file is not there
    // define defaut act file path
    $fn = ACTS_DIR.DEFAULT_ACT.'.php';
    //
    $http->set($act, DEFAULT_ACT);
    require_once $fn;
}
?>