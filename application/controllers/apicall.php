<?php

class apicall extends CI_Controller{

public function index(){
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = 'https://ussouthcentral.services.azureml.net/workspaces/3e1515433b9d477f8bd02b659428cddc/services/cb1b14b17422435984943d41a5957ec7/execute?api-version=2.0&details=true';
$api_key = '5ve72/xxLuzaexQu7LyRBl1iRdGqAQiQ1ValodnS7DG+F0NzgHkaLyk1J30MXrlWFovzPzlurui/o5jeH7RMiA==';


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


$curl=curl_init();
$options=array(
	CURLOPT_URL            => $url,
	CURLOPT_HTTPHEADER => $headers,
	CURLOPT_POST           => 1, 
	CURLOPT_POSTFIELDS     => $body,
	CURLOPT_SSL_VERIFYPEER => false, 
	CURLOPT_RETURNTRANSFER => true
);
curl_setopt_array($curl,$options);
$response = curl_exec($curl);
if(!$response){$response=curl_error($curl);}
$response  = json_decode(json_encode($response), true);

curl_close($curl);

var_dump ($response);
}}
?>