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

$token = array(
    "iss" => "example.org",
    "aud" => "http://apigateway/api/oauth/token",
    "exp" => 1340452126,
    "iat" => 1340451826
);


$jwt = JWT::encode($token2, $privateKey, 'RS256');
echo "Encode:\n" . print_r($jwt, true) . "\n";
?>