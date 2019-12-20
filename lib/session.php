<?php
class Session
{
  public static function init()
  {
    if (version_compare(phpversion(), '5.5.0', '<')) {
      if (session_id() == '') {
        session_start();
        }
      }else{
        if(session_status()==PHP_SESSION_NONE){
          session_start();
        }
      }
  }

  public static function set($key, $val)
  {
    $_SESSION[$key] = $val;
  }

  public static function get($key)
  {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return false;
    }
  }

  public static function destroyAdmin()
  {
    session_destroy();
    header('location:login.php');
  }
   public static function destroy()
  {
    var_dump('destroy');
    session_destroy();
  }
  public static function checkAdmin()
  {
    self::init();
    if (self::get("adminlogin") == false) {
      self::destroy();
      header("location:login.php");
    }
  }
  public static function checkUser(){
    self::init();
    if (self::get("userLogin") != 'true') {
      // self::destroy();
      return false;
    }else{
      return true;
    }
  }
    public static function checkUserLogin(){
    self::init();
    if (self::get('userLogin') == 'true') {
      return true;
    }else{
      return false;
    }
  }
        public static function checkLogin(){
    self::init();
    if (self::get('Login') == true) {
      header("location:index.php");
    }
  }
}
