<?php
include_once 'modules/clientes.php';

//------------------------------------GET/BUSCAR

$app->get('/cliente', function($request, $response,$args) {
    $db = SQL::connect();
    $model = new Clientes();

    $results = $model->get($db);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);

    return $response
                ->withHeader('Content-type','application/json');
});

//--------------------------------------DELETE


$app->delete('/cliente/{id}', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new Clientes();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------PUT

$app->put('/cliente', function($request,$response,$args) {
  
    $db = SQL::connect();
    $model = new Clientes();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});


//---------------------------------------POST

$app->post('/cliente', function($request,$response,$args) {
    $id = $args['id'];

    $db = SQL::connect();
    $model = new Clientes();

    $results= $model->delete($db, $id);
    SQL::close($db);

    $payload = json_encode($results);

    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json');
});

?>