
<?php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 26.01.2017
 * Time: 13:44
 */
function fixDb($val){
	return '"'.addslashes($val).'"';
}
?>