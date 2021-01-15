<?php
include_once 'init.php';
include_once './modules/productos.php';

$response = [];
$db = SQL::connect();

$model = new Producto();

//-------------------------------------GET
//-------------------------------------buscar / lista productos

if (METHOD == 'GET' && !defined("ID")) {
    $response  = $model->get($db);
}

//------------------------------------GET/ID
//------------------------------------un solo producto

if (METHOD == 'GET' && defined("ID")) {
    $response = $model->getId ($db);
    }

//------------------------------------DELETE
//------------------------------------borrar producto

if (METHOD == 'DELETE' && defined("ID")) {
    $response = $model->delete($db);
}

//-------------------------------------POST
//-------------------------------------agregar producto

if (METHOD == 'POST') {
    $response = $model->post($db);
}

//----------------------------------PUT
//----------------------------------actualizar producto

if (METHOD == 'PUT') {
    $response = $model->put($db);
}

if (isset($stmt)) {
    sqlsrv_free_stmt($stmt);
    SQL::close($db);
}


echo json_encode($response)


?>