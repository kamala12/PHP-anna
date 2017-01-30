<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 19-Jan-17
 * Time: 10:45
 */

//Create menu and item menu


$menu = new template('main.menu');
$item = new template('menu.item');

$item -> set('name', 'esimene leht');
$link = $http->getLink(array('act'=>'first'));
$item -> set('link',$link);


$menu -> set('items', $item->prase());



echo '<pre>';
print_r($menu);
echo '<&pre>';

echo '<pre>';
print_r($item);
echo '<&pre>';


?>

