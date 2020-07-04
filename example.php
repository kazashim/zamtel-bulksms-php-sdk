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