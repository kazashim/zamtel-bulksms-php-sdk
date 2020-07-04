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