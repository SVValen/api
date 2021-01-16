<?php
include_once 'init.php';
include_once './modules/clientes.php';

$db = SQL::connect();
$response = [];

$model = new Clientes();

//------------------------------------GET/BUSCAR

if(METHOD == 'GET' && !defined('ID')){
    $response = $model->get($db);
}

//-------------------------------------GET/ID

if(METHOD == 'GET' && defined('ID')){
    $response = $model->getId($db);
}

//--------------------------------------DELETE

if(METHOD == 'DELETE'){
    $response = $model->delete($db);
}

//---------------------------------------PUT

if(METHOD == 'PUT'){
    $response = $model->put($db);
}

//---------------------------------------POST

if(METHOD == 'POST'){
    $response = $model->post($db);
}

if (isset($stmt)) {
    sqlsrv_free_stmt($stmt);
    SQL::close($db);
}

echo json_encode($response)
?>