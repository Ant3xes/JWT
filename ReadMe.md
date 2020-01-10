JWT Tutorial

Install jwt libraries. ->  "$ composer require firebase/php-jwt"

If you want to Encrypt a token :

    1 - In DataEncrypt.php file -> Paste the Private Key in $privateKey.
                                -> Paste The token in $token
                                
    2 - Execute Encrypt.php -> "php Encrypt.php"

If you want to Decrypt a token :

    1 - In DataDecrypt.php file -> Paste the JWT Key in $jwt.
                                -> Paste the Certificate in $certificate.

    2 - Execute Decrypt.php -> "php Decrypt.php"

You have the method of Encryption in the Encrypt.php file.