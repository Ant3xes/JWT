<?php
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

$privateKey = <<<EOD
-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCzjMZTUQPhG/zc
fmSY2ovUq4gKq2t9NwCyREATCwHnIyhgEFmu61DKrSYNwEdz/nWFuQlDwhDbUBxu
n7oFlDo+8ye717lwe0oEXHCDCzsr3sfqEtB7qCiYfXDdzYiOW44dYs+36WdozR2+
JqkDmbRuEsS7EnkQQ/Kr8AOjvg9YtqW4mNWfNsz7AGBcPcS5lRi3Qt6guhQdpiYN
DR9pN0T47EQJqvRxGuessrm1wqmK/x3MbnZx4BZUPV7UW5rguUM73HJyPymJf0B0
IZMKs4GgEBidG6Lk+HZZGsnr3NfZQfYcX770rqFQ+yisYz9RWxUStA9zFsR/wUKw
k78d13MLAgMBAAECggEBAKVVcBqwc14Ko6F2UbPfKvu+qBsLFoPK7j05U7c1X58z
ZK5w3+SOk2rOXkgzUpihLB7i8IEQZu1Mq6HCO01/3NKynVf/oabOIK47YO+KnAYd
swD8KjZz9k3U1OWpqaFM9WRh5Nx5dNuwZT7/4oqKMvdZGQcaT5iGuSNSdEeHcCJD
Ixyem5V1kJI7dT/S5y3+rCVHlXdg0WIlyklD7ieob09dBjFlQUj0DHeXnU6bNrH4
Fj5BPh+xgh7FUjITytFENVj5KDqSp7khDuGsEcgU1TOLvyKrXsTXHgag75ppRtVK
Qei+Yu5/J5M8MM/6dgSXnkQm4pD2EQKQXKl6d99ca+ECgYEA2XuY/rIXWyPB1XHC
6diyH9Sg2zH1LqLnQKixBMTZFV9OJJXBU1Q0ZM01cVI7vpELgMUSlg+YkaW9Jv3U
zbZhdzXttmj5B95TJ9wMmNXP3vq+Jy8opHAK9qdWRV69K7qVaS1mh1lUKmmxWqPV
rN8DHuALYW4388wFYBFvk96J5Y0CgYEA01lYlSgzj3fdmu/gCnh5HXxq0i2iol/a
wY8gmU/SM8Zt7SpkOwXEXXWkHokgX4sRuyvgcqVw9sq9Bzn8a+p2LQ9BJOsKkC8L
0omcyycq8owz+5VODnT4e2k3P2Q1pBU8LFZkzBv2wA94WTknNgqkyCWjrfgBeRej
HWio8JSM2PcCgYAHnNHwKF+06v1/8Sl3cgRaJOE0iv0gEsexdbYsio9mth1QHoXT
2uCynpQ+UTiSJRWX/k32PrmCb6C9Wqk2QioLODIH7oi5A8k5XfR67REHpxM83+O2
Tc20cIsOhpBslW1hbxtlpXTSvzxcBdwW3v+G9ySu1mLS/9M4V6PmMyX0iQKBgQCz
ki88lCqy1FJaaUM/QjsNvX95UsLjGXRhjv1Qpcxgp1EQ+DqvF2hPTDwEodf6tct7
73zFjCHd3kYblL4O5ug/wr1D49xWw1JVMQ0iYwYPjOZB9QqcJ/BT0wLY/ojBADXf
Kgx8i6nsZ3iGvpO9S+/UCn72ukhuHZI+04Tu3BiL4wKBgHikLqnYm01DFcSx2e8p
+y9T2c1RaOzKmyxgrJqaoR+PP0/OBir8BW3HyDrDInM+wfmfUu4yRkxz1CUplznK
ma8GlwafRHvRRU6BpI/wEF/eMOAHv+XEng4ZxH9jmdNNIXq/KyjTeQ2FSn8uPe0x
tiIIqp5TfmWX9bRmmQZ/uI87
-----END PRIVATE KEY-----

EOD;

$publicKey = <<<EOD
-----BEGIN CERTIFICATE-----
MIIDAzCCAeugAwIBAgIUWKdMeJMPc/70HbfE8g0oh6Mk53swDQYJKoZIhvcNAQEL
BQAwETEPMA0GA1UEAwwGQVBQX0hTMB4XDTE5MTEyNzE0MDYxMVoXDTIwMTEyNjE0
MDYxMVowETEPMA0GA1UEAwwGQVBQX0hTMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8A
MIIBCgKCAQEAs4zGU1ED4Rv83H5kmNqL1KuICqtrfTcAskRAEwsB5yMoYBBZrutQ
yq0mDcBHc/51hbkJQ8IQ21Acbp+6BZQ6PvMnu9e5cHtKBFxwgws7K97H6hLQe6go
mH1w3c2IjluOHWLPt+lnaM0dviapA5m0bhLEuxJ5EEPyq/ADo74PWLaluJjVnzbM
+wBgXD3EuZUYt0LeoLoUHaYmDQ0faTdE+OxECar0cRrnrLK5tcKpiv8dzG52ceAW
VD1e1Fua4LlDO9xycj8piX9AdCGTCrOBoBAYnRui5Ph2WRrJ69zX2UH2HF++9K6h
UPsorGM/UVsVErQPcxbEf8FCsJO/HddzCwIDAQABo1MwUTAdBgNVHQ4EFgQUrAm6
J0DpNVunhhHMzEzDrV/tpIkwHwYDVR0jBBgwFoAUrAm6J0DpNVunhhHMzEzDrV/t
pIkwDwYDVR0TAQH/BAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAHSem6moRm1uN
AhmCP+R/Bmo9os14BwFV81ZJYofXcBJ/XKtrj9cDQEg3fP4d2rl24qFT5RcX+2/2
8Kwq1NMG77pD1ZtDoJ3Ano3emGRGAaGsOuC57FwxYDiXgvCejLSb2S6DDpmZV7Lk
nKx7FbC8qrKLl5JvqCAFGuSmByQa/3BkV9qD3MI8Z8KBlemfijd0h4W1apcz6L+m
YsiguoKM2uzl3yFkS/1cG0QWjKiqYRFHHRMgwk8y8p6IlUODpkLM8PTXju4JvBTT
ueYg+szojcBAAi2NpbN23rUtQ2Bs4nXc968aQjmImdlgoJAaOAyiJknCbl5LsHTe
D0AlbgozVA==
-----END CERTIFICATE-----
EOD;

$token = array(
    "iss" => "example.org",
    "aud" => "example.com",
    "iat" => 1340452126,
    "nbf" => 1340451826
);

$jwt = JWT::encode($token, $privateKey, 'RS256');
echo "Encode:\n" . print_r($jwt, true) . "\n";

$decoded = JWT::decode($jwt, $publicKey, array('RS256'));

/*
 NOTE: This will now be an object instead of an associative array. To get
 an associative array, you will need to cast it as such:
*/

$decoded_array = (array) $decoded;
echo "Decode:\n" . print_r($decoded_array, true) . "\n";
?>