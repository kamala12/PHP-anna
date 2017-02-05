<?php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 26.01.2017
 * Time: 12:45
 */
class session
{// class begin
	// class variables
	// session description
	var $sid = false; // session id number
	var $vars = array(); // session variables and data
	var $http = false; // http data
	var $db = false; // database - session data store to database
	var $anonymous = true; // is possible to use anonymous user?
	var $timeout = 1800; // session timeout in sec
	// class methods
	// construct
	function __construct(&$http, &$db){
		$this->http = &$http;
		$this->db = &$db;
		$this->sid = $http->get('sid');
		$this->createSession();
	}// construct
	function setAnonymous($bool){
		$this->anonymous = $bool;
	}// setAnonymous
	function setTimeout($t){
		$this->timeout = $t;
	}// setTimeout
	
	// delete sessions from database
	function clearSession(){
		$sql = 'DELETE FROM session '.'WHERE '.
			time().' - UNIX_TIMESTAMP(changed) > '.
			$this->timeout;
		$this->db->query($sql);
	}// clearSession
	// create session
	function createSession($user = false){
		// anonymous user session
		if($user == false) {
			$user = array(
				'user_id' => 0,
				'role_id' => 0,
				'username' => 'Anonymous'
			);
		}
		// create session id number
		$sid = md5(uniqid(time().mt_rand(1,1000),true));
		// add session data to database
		$sql = 'INSERT INTO session SET '.
				'sid='.fixDb($sid).', '.
				'user_id='.fixDb($user['user_id']).', '.
				'user_data='.fixDb(serialize($user)).', '.
				'login_ip='.fixDb(REMOTE_ADDR).', '.
				'created=NOW()';
		$this->db->query($sql);
		// set up session id number
		$this->sid = $sid;
		// set up sid http value
		$this->http->set('sid', $sid);
	}// createSession
}// class end
?>