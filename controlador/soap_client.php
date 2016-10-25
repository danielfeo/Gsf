<?php

require_once('lib/nusoap.php');
header('Content-type: text/html');

$client = new nusoap_client('http://localhost:8081/gsf/controlador/soap_server.php');

$err = $client->getError();

if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}

$param = array( 'cedula' => $_REQUEST['id']);

$response = $client->call('getInfo',$param);
//echo "<pre>";
//print_R($response);

if($client->fault)
{
	echo "FAULT: <p>Code: (".$client->faultcode.")</p>";
	echo "String: ".$client->faultstring;
}
else
{

}

//echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
//echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
//echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';


header("Content-type: text/xml");
$xml = '';
$xml .= '<?xml version="1.0" encoding="ISO-8859-1"?><SOAP-ENV:Envelope SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:getInfoResponse xmlns:ns1="http://tempuri.org"><return xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="unnamed_struct_use_soapval[1]">';
foreach ($response as $key ) {
 $xml .='<item>';
	
foreach ($key as $key => $value) {
	$xml .='<'.$key.' xsi:type="xsd:string">'.$value.'</'.$key.'>';
}
 $xml .='</item>';
}

$xml .='</return></ns1:getInfoResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>';
echo $xml;
?>

