<?php
include "account.php";

// Load composer
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = $API_KEY;
$bot_username = $BOT_NAME;

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Handle telegram webhook request
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    // log telegram errors
	echo "<pre>";
	print_r($e);
	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	$txt = "John Doe\n";
	fwrite($myfile, $e);
	// $txt = "Jane Doe\n";
	// fwrite($myfile, $txt);
	fclose($myfile);
    echo $e->getMessage();
}
?>