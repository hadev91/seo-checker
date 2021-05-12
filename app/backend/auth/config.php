<?php

$GLOBALS['config'] = array(

    'app' => array(
        'name'          => 'SEO Checker',
    ),

    'mysql' => array(
        'host'          => '127.0.0.1',
        'username'      => 'root',
        'password'      => '1G*R7AFZyXf!rdUn9qhxiQRj',
        'db_name'        => 'php_seo_checker'
    ),

    'password' => array(
        'algo_name' => PASSWORD_DEFAULT,
        'cost'      => 10,
        'salt'      => 50,
    ),

    'hash' => array(
        'algo_name' => 'sha512',
        'salt'      => 30,
    ),

    'remember'  => array(
        'cookie_name'   => 'token',
        'cookie_expiry' => 604800
    ),

    'session'   => array(
        'session_name'  => 'user',
        'token_name'    => 'csrf_token'
    ),
);
