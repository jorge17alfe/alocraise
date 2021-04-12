<?php
class Cookies
{
  public function __construct()
  {
    // self::create_cookies();
  }
  static public function create_cookie($name = null, $value = null,  $expires = null)
  {
    if (!isset($_COOKIE[$name])) {
      setcookie($name, $value, time() + $expires, '/');
    } else{
      setcookie($name, $value, time() + $expires, '/');
    }
    return;
  }
  static public function create_cookie1($name = null, $value = null,  $expires = null)
  {
    if (!isset($_COOKIE[$name])) {
      setcookie($name, $value, time() + $expires, '/');
    } else{
      setcookie($name, $value, time() + $expires, '/');
    }
    return;
  }
}
