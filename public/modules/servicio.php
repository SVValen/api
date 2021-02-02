<?php

class Servicio 
{
    public $table = "Servicio";
    public $fields = ' servId
	                ,servNombre
	                ,servDescripcion
	                ,servPeriodo
	                ,servKM
	                ,servFecha
	                ,servFechaAlta
                    ,servBorrado';
    public $join = '';

    //----------------------------------GET

    public function get($db) {
        $sql = "SELECT $this->fields FROM $this->table
                WHERE servBorrado = 0";
        $params = null;
        $stmt = SQL::query($db,$sql,$params);

        $results = [];
        while ($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
            $results[] = $row;
        };
        return $results;
    }
}
?>