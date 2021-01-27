<?php
include_once 'modules/pedidos.php';

//------------------------------------GET/BUSCAR

$app->get('/pedidos', function($request, $response,$args) {
    $db = SQL::connect();
    $model = new Pedido();

    $results = $model->get($db);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);

    return $response
                ->withHeader('Content-type','application/json');
});

//--------------------------------------DELETE


$app->delete('/pedidos/{id}', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new Pedido();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------PUT

$app->put('/pedidos', function($request,$response,$args) {
  
    $db = SQL::connect();
    $model = new Pedido();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------POST

$app->post('/pedidos', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new Pedido();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});

?>