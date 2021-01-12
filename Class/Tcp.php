<?php
//Romain FLEMAL

$address = '192.168.64.227'; 
// connexion au port
$port =  1234; 
if (isset($_POST['ButtonOn']))
{
    // message à envoyer au serveur
    $buf = 'a;'; 
    // création du socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // connexion au socket
    socket_connect($socket, $address, $port);
    //envoie du message
    socket_send($socket, $buf, 4, 0);
    
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //fermeture du socket
    socket_close($socket);  
}
if (isset($_POST['ButtonOff']))
{
    // message à envoyer au serveur
    $buf = 'e;'; 
    // création du socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // connexion au socket
    socket_connect($socket, $address, $port);
    //envoie du message
    socket_send($socket, $buf, 4, 0);
    
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //fermeture du socket
    socket_close($socket);  
}

if (isset($_POST['rougeColor']))
{
    // message à envoyer au serveur
    $buf = 'r;'; 
    // création du socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // connexion au socket
    socket_connect($socket, $address, $port);
    //envoie du message
    socket_send($socket, $buf, 4, 0);
    
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //fermeture du socket
    socket_close($socket);  
}

if (isset($_POST['blueColor']))
{
    // message à envoyer au serveur
    $buf = 'b;'; 
    // création du socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // connexion au socket
    socket_connect($socket, $address, $port);
    //envoie du message
    socket_send($socket, $buf, 4, 0);
    
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //fermeture du socket
    socket_close($socket);  
}

if (isset($_POST['greenColor']))
{
    // message à envoyer au serveur
    $buf = 'v;'; 
    // création du socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // connexion au socket
    socket_connect($socket, $address, $port);
    //envoie du message
    socket_send($socket, $buf, 4, 0);
    
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //fermeture du socket
    socket_close($socket);  
}
if (isset($_POST['whiteColor']))
{
    // message à envoyer au serveur
    $buf = 'w;'; 
    // création du socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // connexion au socket
    socket_connect($socket, $address, $port);
    //envoie du message
    socket_send($socket, $buf, 4, 0);
    
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //fermeture du socket
    socket_close($socket);  
}
?>
