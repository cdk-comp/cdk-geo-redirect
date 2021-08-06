<?php

/**
 * Plugin Name: CDK GEO Redirect
 * Description: Detect country via CloudFlare and redirect to same lang website version 
 * Plugin URI: https://cdk.co.il
 * Author: cdk.co.il
 * Version: 0.0.1
 * Author URI: https://dimaminka.com
 *
 * Text Domain: cdk
 *
 *
 * CDK GEO Redirect is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * CDK GEO Redirect is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */
 
$cf      = $_SERVER['HTTP_CF_IPCOUNTRY'];
$url     = $_SERVER['REQUEST_URI'];
$uri_arr = explode( '/', $url );
if ( ! isset( $_COOKIE['cf_ipc'] ) && $uri_arr[1] !== 'wp-admin' && $uri_arr[1] !== 'wp-login.php' && $uri_arr[1] !== 'israel' && $cf == 'IL' ) {
  setcookie( 'cf_ipc', $cf );
  header( 'Location: https://' . $_SERVER['HTTP_HOST'] . '/israel' . $_SERVER['REQUEST_URI'], true, 302 );
  exit;
}
