<?php

/*header("Access-Control-Allow-Origin: *"); 
//  Access-Control-Allow-Origin  : indica si los recursos de la respuesta pueden ser compartidos con el origen dado.
//"Access-Control-Allow-Origin: *" el caracter "* "permite peticiones sin credenciales, permitiendo a cualquier origen acceder al recurso 

include_once "config.php"; //inlcuye las configuraciones
include_once "sql_srv.php"; //incluye la base de datos

$input = file_get_contents("php://input");  
//file_get_contents() es la manera preferida de transmitir el contenido de un fichero a una cadena
// php://input es el mecanismo de solo lectura que nos ayuda a recibir y leer los valores de una fuente en específico,

$data = json_decode($input, true);
//con esto recuperamos datos

$db = SQLSRV::connect();

$stmt = sqlsrv_query($db,
    "UPDATE Heroes SET name = ?
    WHERE id = ?", [$data["name"], $data["id"]] );

//$stmt : query

if($stmt === false) {
    SQLSRV::error(500, 'Error interno del servidor', $db);
}

sqlsrv_fetch($stmt);
// Hace que esté disponible para ser leída la siguiente fila del conjunto de resultado.

sqlsrv_free_stmt($stmt);
// sqlsrv_free_stmt Libera todos los recursos para la declaración especificada. Devuelve TRUE or FALSE
//stmt La declaración para la que se liberan los recursos.

SQLSRV::close($db);
//cierra una conexión abierta y libera los recursos asociados a la conexión.

echo $input;
*/

?>