<?php
include_once 'init.php';
include_once './modules/pedidos.php';

$response = [];
$db = SQL::connect();

$model = new Pedido();

//-------------------------------------GET
//-------------------------------------lista pedidos

if (METHOD == 'GET') {
    $response  = $model->get($db);
}

//------------------------------------DELETE
//------------------------------------borrar pedido

if (METHOD == 'DELETE' && defined("ID")) {
    $response = $model->delete($db);
}

//-------------------------------------POST
//-------------------------------------agregar pedido

if (METHOD == 'POST') {
    $response = $model->post($db);
}

//----------------------------------PUT
//----------------------------------actualizar pedido

if (METHOD == 'PUT') {
    $response = $model->put($db);
}

if (isset($stmt)) {
    sqlsrv_free_stmt($stmt);
    SQL::close($db);
}


echo json_encode($response)


?>