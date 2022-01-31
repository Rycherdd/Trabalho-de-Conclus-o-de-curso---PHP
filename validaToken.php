<?php
session_start();
require_once("vendor/autoload.php");

use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
$token = $_SESSION['id_token'];
$code = $_SESSION['code'];
echo "$token<br>";
echo "<br>CODE - $code";
$part = explode(".", $token);
@$header = $part[0];
@$payload = $part[1];
@$signature = $part[2];

$decod = base64_decode($payload);
if($header == ''){
    echo "<br>header invalido";
}if($payload == ''){
    echo "<br>payload invalido";
}if($signature == ''){
    echo "<br>signature invalida";
}

echo "<br>$decod<br>";


$exp = substr($decod, 100, -67);

$data = time();
echo "<br>EXP: $exp<br>";
echo "<br>DATA ATUAL: $data<br>";
if($exp < $data){
    echo "valido";
}else{
    echo "invalido";
}



// Endereço do servidor contendo as keys (chaves publicas que assinaram o jwt)
$url = "https://demo-openidc.canoas.ifrs.edu.br/jwks";


// Requisição GET para baixar as keys. Pode ser via rede ou em arquivo local, neste exemplo utilizei via rede
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);

$jwks_jsond = json_decode($result, true);

try {    
    $r = JWT::decode($token, JWK::parseKeySet($jwks_jsond), array('RS256'));
    echo "<br>VALIDACAO<br>";
    echo "ok";
    print_r($r);
    echo "<br>VALIDACAO<br>";
} catch (\Throwable $th) {
    var_dump($th);
}


$access_token = $result['access_token'];
echo "<br> ACCES TOKEN <br>";
print_r($access_token);
echo "<br> ACCES TOKEN <br>";
?>
