<?php

namespace ZamtelBulk;

class ZamtelBulkAPI
{
    private function make_sms_body($sms_body){

        $post_fields = '';

        foreach ($sms_body as $key => $value) {
            $post_fields .= urlencode($key) . '=' . $value . '&';
        }

        $post_fields=rtrim($post_fields,'&');

        return $post_fields;
    }
}


private function send_server_response($url,$post_body){

    /**
     * Do not supply $post_fields directly as an argument to CURLOPT_POSTFIELDS,
     * despite what the PHP documentation suggests: cUrl will turn it into in a
     * multipart formpost, which is not supported:
     */

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    // Allowing cUrl functions 20 second to execute
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    // Waiting 20 seconds while trying to connect
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    $response_string = curl_exec($ch);
    curl_close($ch);

    return $response_string;
}

/**
     * @param $api_key
     * @param $url
     * @return mixed
     *
     * Get All message for specific API Access
     *
     */

    public function get_inbox($key,$url){
        $post_body='action=get-inbox&api_key='.$key;

        $response=$this->send_server_response($url,$post_body);

        return $response;


    }

    /**
     * @param $api_key
     * @param $url
     * @return mixed
     *
     * Get Balance for specific user
     *
     */

    public function check_balance($key,$url){
        $post_body='action=check-balance&key='.$key;

        $response=$this->send_server_response($url,$post_body);

        return $response;


    }


}