<?php

class PedidoDetalle {

    public $table =  'PedidoDetalle';
    public $fields = 'detaId
                    ,detaPediId
                    ,detaProdId
                    ,detaCantidad
                    ,detaPrecio
                    ,CONVERT(VARCHAR, detaFechaAlta, 126) detaFechaAlta
                    ,detaBorrado
                    ,prodDescripcion';
    public $join = "LEFT OUTER JOIN Producto ON detaProdId = prodId";

    public function get($db) {
        $sql = "SELECT $this->fields 
                FROM $this->table
                $this->join
                WHERE detaBorrado = 0";
        
        $params = null;

        if(isset($_GET["detaPediId"])) {
            $params = [$_GET["detaPediId"]];
            $sql = $sql . "AND detaPediId = ?";
        }

        $stmt = SQL::query($db, $sql, $params);

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public function delete($db) {
        $sql = "UPDATE $this->table
                SET detaBorrado = 1
                WHERE detaId = ?";
        
        $stmt = SQL::query($db, $sql, [ID]);

        sqlsrv_fetch($stmt);

        return [];
    }

    public function post($db) {

        $sql = "INSERT INTO $this->table
                    (detaPediId
                    ,detaProdId
                    ,detaCantidad
                    ,detaPrecio
                    ,detaFechaAlta
                    ,detaBorrado)
                VALUES (?,?,?,?,GETDATE(),0);
                SELECT @@IDENTITY detaId,CONVERT(VARCHAR, GETDATE(), 126) detaFechaAlta;";
        
        $stmt = SQL::query($db, $sql, [DATA["detaPediId"],DATA["detaProdId"],DATA["detaCantidad"],DATA["detaPrecio"]]);

        sqlsrv_fetch($stmt);
        sqlsrv_next_result($stmt);
        
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        $result = DATA;
        $result["detaId"] = $row["detaId"];
        $result["detaFechaAlta"] = $row["detaFechaAlta"];
        $result["detaBorrado"] = 0;

        return $result;
    }

    public function put($db) {
        $sql = "UPDATE $this->table
                SET detaProdId = ?,
                    detaCantidad = ?,
                    detaPrecio = ?
                WHERE detaId = ?";
        
        $stmt = SQL::query($db, $sql, [DATA["detaProdId"],DATA["detaCantidad"],DATA["detaPrecio"],DATA["detaId"]]);

        sqlsrv_fetch($stmt);

        return DATA;
    }
}

?>