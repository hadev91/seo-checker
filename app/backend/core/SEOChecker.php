<?php

    class SEOChecker {
        protected $url_content;

        public function __construct($url) {
            // todo - get url content
            $this->url_content = file($url);
        }

        public function show_content() {
            echo '<pre>' . print_r($this->url_content, true) . '</pre>';
        }



    }
