<?php

$data = array("no" => "085954534371", "pesan" => "SMS dari PHP");
$data_string = json_encode($data);

$ch = curl_init('http://192.168.43.1:8000');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Length: ' . strlen($data_string)
    )
);
$result = curl_exec($ch);
