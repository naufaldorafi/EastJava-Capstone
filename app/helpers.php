<?php

if (!function_exists('str_slug')) {
  function str_slug($title, $separator = '-')
  {
    $title = preg_replace('~[^\pL\d]+~u', $separator, $title);
    $title = iconv('utf-8', 'us-ascii//TRANSLIT', $title);
    $title = preg_replace('~[^-\w]+~', '', $title);
    $title = trim($title, $separator);
    $title = preg_replace('~-+~', $separator, $title);
    $title = strtolower($title);
    return $title;
  }
}
