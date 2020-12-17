<?php
//Romain FLEMAL

$address = '192.168.64.227'; 
$port =  1234; // connexion au port
if (isset($_POST['ButtonOn']))
{
    $buf = 'a;'; // message à envoyer au serveur

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // création du socket
    socket_connect($socket, $address, $port);
    // connexion au socket
    socket_send($socket, $buf, 4, 0);
    //envoie du message
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //lecture du message
    echo $response;

    socket_close($socket);  
}
if (isset($_POST['ButtonOff']))
{
    $buf = 'e;'; // message à envoyer au serveur

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // création du socket
    socket_connect($socket, $address, $port);
    // connexion au socket
    socket_send($socket, $buf, 4, 0);
    //envoie du message
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //lecture du message
    echo $response;

    socket_close($socket);  
}

if (isset($_POST['rougeColor']))
{
    $buf = 'r;'; // message à envoyer au serveur

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // création du socket
    socket_connect($socket, $address, $port);
    // connexion au socket
    socket_send($socket, $buf, 4, 0);
    //envoie du message
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //lecture du message
    echo $response;

    socket_close($socket);  
}

if (isset($_POST['blueColor']))
{
    $buf = 'b;'; // message à envoyer au serveur

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // création du socket
    socket_connect($socket, $address, $port);
    // connexion au socket
    socket_send($socket, $buf, 4, 0);
    //envoie du message
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //lecture du message
    echo $response;

    socket_close($socket);  
}

if (isset($_POST['greenColor']))
{
    $buf = 'v;'; // message à envoyer au serveur

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    // création du socket
    socket_connect($socket, $address, $port);
    // connexion au socket
    socket_send($socket, $buf, 4, 0);
    //envoie du message
    $response = socket_read($socket,4, PHP_BINARY_READ);
    //lecture du message
    echo $response;

    socket_close($socket);  
}
?>