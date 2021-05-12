<?php


    class URL {
        public static function home_url(){
            return sprintf(
                "%s://%s:%s/",
                isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                $_SERVER['SERVER_NAME'],
                $_SERVER['SERVER_PORT']
            );
        }
    }