<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = '';
$api_key = '';


$data = array(
    'Inputs'=> array(
        '*** NAME OF WEB SERVICE INPUT ***'=> array(
            'ColumnNames' => ['Client_ID'],
            'Values' => [ [ '1097' ],  ]
        ),
    ),
        'GlobalParameters' => new StdClass(),
);

$headers=array('Content-Type: application/json', 'Authorization: Bearer '.$api_key, 'Accept: application/json');
$body = json_encode($data);

$curl = curl_init($url);
$options=array(
			CURLOPT_URL            => $url,
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_POST           => 1, 
			CURLOPT_POSTFIELDS     => $data,
			CURLOPT_SSL_VERIFYPEER => false, 
			CURLOPT_RETURNTRANSFER => true
		);
curl_setopt_array($options);
$response  = json_decode(curl_exec($curl), true);

curl_close($ch);

var_dump ($response):

?>