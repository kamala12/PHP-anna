<?php

// create menu and item objects
$menu = new template('menu.menu');
$item = new template('menu.item');
// main menu content query
$sql = 'SELECT content_id, title FROM content WHERE '.
	'parent_id="0" AND show_in_menu="1"';
$sql = $sql.' ORDER BY sort ASC';
// get menu data from database
$res = $db->getArray($sql);
// create menu items from query result
if($res != false){
	foreach ($res as $page){
		// add content to menu item
		$item->set('name', $page['title']);
		$link = $http->getLink(array('page_id'=>$page['content_id']));
		$item->set('link',$link);
		// add item to menu
		$menu->add('items', $item->parse());
	}
}
$tmpl->set('menu', $menu->parse());
?>