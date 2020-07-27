<?php

/* Send an SMS using Zamtel bulkSMS. You can run this file 3 different ways:
 *
 * 1. Save it as example.php and at the command line, run
 *         php example.php
 *
 * 2. Upload it to a web host and load mywebhost.com/example.php
 *    in a web browser.
 *
 * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root
 *    directory to the folder containing this file, and load
 *    localhost:8888/example.php in a web browser.
 */


// Step 1: Get the Cyn SMS API library from https://github.com/kazashim/zamtel-bulksms-php-sdk,
// following the instructions to install it with Composer.

require_once 'src/Zamtel_bulk.php';
use ZamtelBulk\ZamtelBulkAPI;


// Step 2: set your API_KEY from https://mywebhost.com/sms-api/info

$key = 'xxxxxxxxxxxxxxxxxxx';


// Step 3: Change the from number below. It can be a valid phone number or a String
$senderid = 'Cynojine';

// Step 4: the number we are sending to - Any phone number
$contacts = '260965058568';

// Step 5: Replace your Install URL like https://mywebhost.com/sms/api with https://http://bulksms.zamatel.co.zm/api/sms/send/batch?
// <sms/api> is mandatory.

$url = 'https://bulksms.zamtel.co.zm/api/sms/send/batch';

// the sms body
$message = 'test message from cynojine SMS';

// unicode sms
$unicode = 0; //For Plain Message
$unicode = 1; //For Unicode Message


// Create SMS Body for request
$sms_body = array(
    'key' => $key,
    'contacts' => $contacts,
    'senderid' => $senderid,
    'message' => $message,
    
);

// Step 6: instantiate a new Ultimate SMS API request
$client = new ZamtelBulkAPI();

// Step 7: Send SMS
$response = $client->send_sms($sms_body, $url);

print_r($response);


// Step 8: Get Response
$response=json_decode($response);

// Display a confirmation message on the screen
//echo 'Message: '.$response->message;

