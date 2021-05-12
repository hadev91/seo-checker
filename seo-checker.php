<?php

    $regex_pattern = [
        'description_tag' => '/(&lt;meta)((\s)((content=&quot;.*&quot;)|(name=&quot;description&quot;))){1,2}(\s?&gt;)/',
        'description' => '/(?<=content=&quot;).*(?=&quot;)/',
        'title_tag' => '/&lt;title&gt;.*&lt;\/title&gt;/',
        'title' => '/(?<=&lt;title&gt;).*(?=&lt;\/title&gt;)/',
    ];

    function super_show($data) {
        echo '<pre>' . print_r($data, true) . '</pre>';
    }

    function get_web_page( $url ) {
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = htmlentities(curl_exec( $ch ));
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }

    function fetch_data($key, $matches) {

        global $regex_pattern, $result;

        if (key_exists('0', $matches)) {
            $result[$key] = [];

            preg_match($regex_pattern[$key], $matches[0], $desc);

            $result[$key]['has'] = true;
            $result[$key]['tag'] = $matches[0];
            $result[$key]['text'] = $desc[0];
            $result[$key]['building'] = explode(' ', $desc[0]);
            $result[$key]['length'] = strlen($desc[0]) ?? 0;
        } else {

            $result[$key]['has'] = false;
            $result[$key]['tag'] = false;
            $result[$key]['text'] = false;
            $result[$key]['building'] = false;
            $result[$key]['length'] = 0;

        }
    }

    $get = $_GET;

    $result = [];
    $result['url'] = $get['url'];
    $result['data'] = get_web_page($result['url']);

    preg_match($regex_pattern['description_tag'], $result['data']['content'], $matches);

    preg_match($regex_pattern['title_tag'], $result['data']['content'], $title_tag);

    fetch_data('description', $matches);
    fetch_data('title', $title_tag);

    unset($result['data']);

    echo json_encode($result);
