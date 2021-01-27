<?php
include_once 'modules/pedido-detalle.php';

//------------------------------------GET/BUSCAR

$app->get('/pedido-detalle', function($request, $response,$args) {
    $db = SQL::connect();
    $model = new PedidoDetalle();

    $results = $model->get($db);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);

    return $response
                ->withHeader('Content-type','application/json');
});

//--------------------------------------DELETE


$app->delete('/pedido-detalle/{id}', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new PedidoDetalle();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------PUT

$app->put('/pedido-detalle', function($request,$response,$args) {
  
    $db = SQL::connect();
    $model = new PedidoDetalle();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------POST

$app->post('/pedido-detalle', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new PedidoDetalle();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});

?>