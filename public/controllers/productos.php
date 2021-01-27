<?php
include_once 'modules/productos.php';

//------------------------------------GET/BUSCAR

$app->get('/productos', function($request, $response,$args) {
    $db = SQL::connect();
    $model = new Producto();

    $results = $model->get($db);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);

    return $response
                ->withHeader('Content-type','application/json');
});

//--------------------------------------DELETE


$app->delete('/productos/{id}', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new Producto();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------PUT

$app->put('/productos', function($request,$response,$args) {
  
    $db = SQL::connect();
    $model = new Producto();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------POST

$app->post('/productos', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new Producto();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});

?>