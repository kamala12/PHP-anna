<?php
function fixHtml($val){
    return htmlentities($val);
}
class http
{// http class begin
    // class variables
    var $server = array(); // server data
    var $vars = array(); // http data
    var $cookie = array(); // cookie data
    // class methods
    // class construct for object initializing
    function __construct()
    {
        $this->init(); // initialize variables with real data
        $this->initConst(); // initialize constants by real data values
    }
    // initialize class variables and set up real data
    function init(){
        $this->server = $_SERVER; // server real data
        $this->cookie = $_COOKIE; // cookie real data
        $this->vars = array_merge($_GET, $_POST, $_FILES); // http real data
    }// init
    // initialize some server constants
    function initConst(){
        // define array with some server element names
        $vars = array('REMOTE_ADDR', 'PHP_SELF', 'SCRIPT_NAME', 'HTTP_HOST');
        // control is constant defined for each constand name
        foreach ($vars as $var){
            if(!defined($var) and isset($this->server[$var])){
                define($var, $this->server[$var]);
            }
        }
    }// initConst
    // set up $this->vars array elements: $element_name => element_value
    // $ name - element name, for example user
    // $ val - element value, for example test
    // $this->vars['user'] = 'test'
    function set($name, $val){
        $this->vars[$name] = $val;
    }// set
    function get($name, $fix= false){
        if(isset($this->vars[$name])){
            if($fix){
                return fixHtml($this->vars[$name]);
            }
            return $this->vars[$name];
        }
        return false;
    } // get
    // delete http data element
    function del($name){
        if(isset($this->vars[$name])){
            unset($this->vars[$name]);
        }
    }
    function redirect($url = false){
        global $sess;
        $sess->flush();
        if($url == false){
            $url = $this->getLink();
        }
        $url = str_replace('&amp;', '&', $url);
        header('Location: '.$url);
        exit;
    }
}// http class end
?>