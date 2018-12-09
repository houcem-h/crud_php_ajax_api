<?php
require_once '../classes/dbconnect.class.php';
require_once '../classes/client.class.php';

$client = new Client();
// $_REQUEST['mode'] = 'loadOne';
// $_REQUEST['id'] = 1;

if ($_REQUEST['mode'] == 'load') {
    $ListClt = $client->readAllClients();
    $row = $ListClt->fetchAll();
    echo json_encode($row);
} else if ($_REQUEST['mode'] == 'loadOne') {
    $client = $client->readSpecificClient($_REQUEST['id']);
    $row = $client->fetch();
    echo json_encode($row);
} else if ($_REQUEST['mode'] == 'insert') {
    $client->createClient($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['dataN'], $_REQUEST['adresse'], $_REQUEST['tel']);
} else if ($_REQUEST['mode'] == 'update') {
    $client->updateClient($_REQUEST['id'], $_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['dataN'], $_REQUEST['adresse'], $_REQUEST['tel']);
} else if ($_REQUEST['mode'] == 'delete') {
    $client->deleteClient($_REQUEST['id']);
}