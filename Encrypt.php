<?php
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

include("DataEncrypt.php");

$iat = time();
$exp = $iat + 300;

$token = array(
    "iss" => "example.org",
    "aud" => "http://apigateway/api/oauth/token",
    "exp" => $exp,
    "iat" => $iat
);


$jwt = JWT::encode($token, $privateKey, 'RS256');
echo "Encode:\n" . print_r($jwt, true) . "\n";
?>