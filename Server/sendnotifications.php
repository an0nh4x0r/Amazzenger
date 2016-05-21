<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $data = $_POST["myHttpData"];
        $contact_number = $_POST["contact_number"];
    }

    if (strlen($contact_number) == 10){
        $contact_number = "+91" . $contact_number;
    }

    require 'twilio-php-master/Services/Twilio.php';

    $AccountSid = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    $AuthToken = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

    $client = new Services_Twilio($AccountSid, $AuthToken);

    $people = array(
        $contact_number => "User"
    );

    foreach ($people as $number => $name){
        $sms = $client->account->messages->sendMessage(
            "+17194284432",
            $number,
            $data
        );
    }