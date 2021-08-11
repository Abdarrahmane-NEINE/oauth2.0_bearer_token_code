<?php
// include our OAuth2 Server object
require_once __DIR__.'/server.php';

// Bearer token Authorization

// your public key strings can be passed in however you like
// (there is a public/private key pair for testing already in the oauth library)
$publicKey  = file_get_contents('oauth2-server-php/test/config/keys/id_rsa.pub');
$privateKey = file_get_contents('oauth2-server-php/test/config/keys/id_rsa');

// create storage
$storage = new OAuth2\Storage\Memory(array(
    'keys' => array(
        'public_key'  => $publicKey,
        'private_key' => $privateKey,
    ),
    // add a Client ID for testing
    'client_credentials' => array(
        'id' => array('client_secret' => 'secret')
    ),
));

$server = new OAuth2\Server($storage, array(
    'use_jwt_access_tokens' => true,
));
// Handle a request for an OAuth2.0 Access Token and send the response to the client


$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();

// var_dump($server);

 ?>
