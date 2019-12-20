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

  public static function destroy()
  {
    session_destroy();
  }
  public static function checkAdmin()
  {
    self::init();
    if (self::get("adminlogin") === false) {
      self::destroy();
      header("location:login.php");
    }
  }
  public static function checkUser(){
    self::init();
    if (self::get("userLogin") === false) {
      self::destroy();
      header("location:index.php");
    }
  }

  public static function checkLogin()
  {
    self::init();
    if (self::get("login") == true) {
      header("Location:index.php");
    }
  }
}
