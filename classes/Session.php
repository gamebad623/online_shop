<?php

class Session{
    public function __construct(){
        session_start();
    }

    public function set($key , $value){
        $_SESSION[$key][] = $value;
    }

    public function get($key){
        return (isset(($_SESSION[$key]))) ? $_SESSION[$key] : false ;
    }

    public function hasSession($session){
        return (isset($session)) ? true : false;
    }

    public function unset($session){
        unset($session);
    }

    public function destroy(){
        session_destroy();
    }
}


?>