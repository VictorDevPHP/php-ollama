<?php

require 'src/API/ChatApiClient.php';

use api\ChatApiClient;

$baseUrl = 'http://localhost:11434';
$chatApiClient = new ChatApiClient($baseUrl);
$messageContent = $chatApiClient->sendMessage('llama3:8b', 'Voce conhece o fabio?');
echo $messageContent;
