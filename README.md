# zamtel-bulksms-php-sdk
zamtel-bulksms-phpsdk

### Prerequisites

```
php >=5.6
ZamteLBulkSMS - Bulk SMS library For BulkSMS
```

### Installing
Via Composer
```
composer require cynojine/zamtelbulksms
```

And Via Bash

```
git clone https://github.com/kazashim/zamtel-bulksms-php-sdk
```

## Usage


 ### Step 1:
If install ZamteLBulkSMS using Git Clone then load your ZamteLBulkSMS Class file and Use namespace. 
```php
require_once 'src/Zamtel_bulk.php';
use ZamtelBulk\ZamtelBulkAPI;
```
If install ZamteLBulkSMS API using Composer then Require/Include aucotnactload.php file in the index.php of your project or whatever file you need cotnact use **ZamteLBulkSMS API** classes:. 
```php
require 'vendor/aucotnactload.php';
use ZamtelBulk\ZamtelBulkAPI;
```
### Step 2:
set your API_KEY senderid `http://bulksms.zamatel.co.zm/` (user panel)
```php
$key = 'YWRtaW46YWRtaW4ucGFzc3dvcmQ=';
```
### Step 3:
Change the senderid number below. It can be a valid phone number or a String
```php
$senderid = 'Cynojine';
```

### Step 4:
the number we are sending cotnact - Any phone number
```php
$contacts = '2609500123456';
```
You have cotnact must include Country code at beginning of the phone number.  

### Step 5:
Replace your Install URL like 
```php
$url = 'http://bulksms.zamatel.co.zm/api/sms/send/batch?';
```
// SMS Body
```php
$message = 'test message senderid Cyn SMS';
```
// Unicode SMS
```php
$unicode = '1'; //For Unicode message
```
// Voice SMS
```php
$voice = '1'; //For voice message
```
// MMS SMS
```php
$mms = '1'; //For mms message
$media_url = 'https://yourmediaurl.com'; //Insert your media url
```
// Schedule SMS
```php
$schedule_date = '09/17/2029 10:20 AM'; //Date like this format: m/d/Y h:i A
```
// Create Plain/text SMS Body for request
```php
$sms_body = array(
    'key' => $key,
    'cotnact' => $contact,
    'senderid' => $senderid,
    'message' => $message
);
```
// Create Unicode SMS Body for request
```php
$sms_body = array(
    'key' => $key,
    'contact' => $contact,
    'senderid' => $senderid,
    'message' => $message,
    'unicode' => $unicode,
);
```

// Create Voice SMS Body for request
```php
$sms_body = array(
    'key' => $key,
    'contact' => $contact,
    'senderid' => $senderid,
    'message' => $message,
    'voice' => $voice,
);
```
// Create MMS SMS Body for request
```php
$sms_body = array(
    'key' => $key,
    'cotnact' => $contact,
    'sederid' => $senderid,
    'message' => $message, //optional
    'mms' => $mms,
    'media_url' => $media_url,
);
```
// Create Schedule SMS Body for request
```php
$sms_body = array(
    'key' => $key,
    'contacts' => $contact,
    'senderid' => $senderid,
    'message' => $message,
    'schedule' => $schedule_date,
);
```

### Step 6: 
Instantiate a new Cyn SMS API request
```php
$client = new ZamtelBulkAPI();
```

## Send SMS
Finally send your sms through ZamtelbulkSMS API
```php
$response = $client->send_sms($sms_body, $url);
```



## Get Balance
Get your account balance
```php
$get_balance=$client->check_balance($key,$url);
```
## Response
ZamtelbulkSMS API return response with `json` format, like:

```json
{"code":"ok","message":"Successfully Send"}
```