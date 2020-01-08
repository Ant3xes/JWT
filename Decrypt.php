<?php
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

include('Data.php');

$decoded = JWT::decode($jwt, $certificate, array('RS256'));

$decoded_array = (array) $decoded;
echo "Decode:\n" . print_r($decoded_array, true) . "\n";
echo "Decode:\n" . print_r($decoded, true) . "\n";
?>