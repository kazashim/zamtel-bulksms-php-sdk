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

    $ch = curl_init( );
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
    // Allowing cUrl functions 20 second to execute
    curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
    // Waiting 20 seconds while trying to connect
    curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 20 );
    $response_string = curl_exec( $ch );
    curl_close( $ch );

    return $response_string;
