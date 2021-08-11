<?php
// include our OAuth2 Server object
require_once __DIR__.'./server.php';

// avec bearer token grant type
// Bearer token oauth2.0
$publicKey = file_get_contents('oauth2-server-php/test/config/keys/id_rsa.pub');

// no private key necessary
$keyStorage = new OAuth2\Storage\Memory(array('keys' => array(
    'public_key'  => $publicKey,
)));

$server = new OAuth2\Server($keyStorage, array(
    'use_jwt_access_tokens' => true,
));

// verify the JWT Access Token in the request
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
echo json_encode('Token introuvable ou invalide');
http_response_code(501);
    exit();
}

// echo "Success!";
echo json_encode('Token valide');
http_response_code(200);
 ?>
