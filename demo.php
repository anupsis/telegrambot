<?php
require __DIR__ . '/vendor/autoload.php';

include "account.php";

// Load composer
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = $API_KEY;
$bot_username = $BOT_NAME;

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}

// $mysql_credentials = [
   // 'host'     => 'localhost',
   // 'user'     => 'root',
   // 'password' => '',
   // 'database' => 'bot_telegram',
// ];

// try {
    // // Create Telegram API object
    // $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);
	

    // // Enable MySQL
    // $telegram->enableMySQL($mysql_credentials);

    // // Handle telegram getUpdate request
	// var_dump($telegram->handleGetUpdates(100,100));
    // $telegram->handleGetUpdates();
// } catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // // log telegram errors
    // echo $e;
// }
?>