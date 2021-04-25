<?php
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;
session_start();
$sid = "AC6011f611fb72af58a9b2b69d27f0559c";
$token = "f7260e483b5f2e6997a9eb53ccaab0ac";

//$toNumber = '(647) 836-9410';
if(isset($_POST['submit'])) {
    $fromNumber = '(647) 492-8728';
    $client = new Twilio\Rest\Client($sid,$token);
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $client->messages->create($phone,[
        'from'=>$fromNumber,
        'body'=>$message
    ]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Send messages</h1>
<div>
    <form action="" method="post">
        <div>
            <label for="phone">Phone Number:</label>
            <div>
                <input name="phone" class="phone" value="<?= isset($phone) ? $phone : ''; ?>">
            </div>
        </div>
        <div>
            <label for="message">Message:</label>
            <div>
                <textarea name="message" class="message"><?= isset($message) ? $message : ''; ?></textarea>
            </div>
        </div>
        <div>
            <button class="btn" type="submit" name="submit">Send</button>
        </div>
    </form>
</div>

</body>
</html>
