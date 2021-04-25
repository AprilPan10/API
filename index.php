<?php
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;
session_start();
$sid = "";
$token = "";
$link = isset($_SESSION['link']) ? $_SESSION['link'] : '';
if(isset($_POST['submit'])) {
    $fromNumber = '(647) 492-8728';
    $client = new Twilio\Rest\Client($sid,$token);
    $phone = $_POST['phone'];
    $link = $_POST['message'];
    if ($link == "" || $phone == "") {
        $send_error = "Invalid input";
    } else {
        $client->messages->create($phone,[
            'from'=>$fromNumber,
            'body'=>$link
        ]);
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Giphy</title>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <ul class="dynamic-txts">
        <li><span>Text A Gif !</span></li>
    </ul>
</div>
<div class="search">
    <input type="text" id="input">
    <button id="submit" class="button" onclick="sendRequest()">Search</button>
    <button  id="refresh" class="button-ref"  onclick="refreshPage()">Refresh</button>
</div>
<div class="links">
    <p id = "para"></p>
</div>
<button class="button center" id="copyButton1">Copy</button>
<form method="post">
    <div class="widget">
        <div class="inside">
            <label for="phone">Phone Number:</label>
            <div>
                <input name="phone" class="phone color" value="<?= isset($phone) ? $phone : ''; ?>" placeholder="(000) 000-0000">
            </div>
            <span><?= isset($send_error)? $send_error: '' ?></span>
        </div>

        <div class="inside">
            <label for="message">Message:</label>
            <div>
                <input name="message" class="message color">
            </div>
            <span><?= isset($send_error)? $send_error: '' ?></span>
        </div>
        <div>
            <button class="button btn" type="submit" name="submit">Send</button>
        </div>
    </div>
</form>
<div id="image"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/script.js"></script>
<script src="js/function.js"></script>
</body>
</html>
