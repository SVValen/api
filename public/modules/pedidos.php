<?php

class Pedido {

    public $table = 'Pedido';
    public $fields = 'pediId,
                CONVERT(VARCHAR, pediFecha, 126) pediFecha,
                pediClienId,
                CONVERT(VARCHAR, pediFechaAlta, 126) pediFechaAlta,
                pediBorrado,
                clienNombre';
    public $join = "LEFT OUTER JOIN Cliente on pediClienId = clienId";

    public function get($db) {
        $sql = "SELECT $this->fields FROM $this->table
        $this->join
        WHERE pediBorrado = 0";

        $stmt = SQL::query($db, $sql, null);
        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public function delete($db) {
        $sql = "UPDATE $this->table SET pediBorrado = 1
                WHERE pediId = ?";

        $stmt = SQL::query($db, $sql, [ID]);

        sqlsrv_fetch($stmt);

        return [];
    }

    public function post($db) {
        $sql = "INSERT INTO $this->table
                (pediFecha
                ,pediClienId
                ,pediFechaAlta
                ,pediBorrado)
                VALUES (?,?, GETDATE(),0);
                
                SELECT @@IDENTITY pediId, CONVERT(VARCHAR, GETDATE(), 126) pediFechaAlta";

        $stmt = SQL::query($db, $sql, [DATA["pediFecha"],DATA["pediClienId"]]);

        sqlsrv_fetch($stmt);
        sqlsrv_next_result($stmt);

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        $result = DATA;
        $result["pediId"] = $row["pediId"];
        $result["pediFechaAlta"] = $row["pediFechaAlta"];
        $result["pediBorrado"] = 0;

        return $result;
    }

    public function put($db) {
        $sql = "UPDATE $this->table
                SET pediFecha = ?,
                    pediClienId = ?
                WHERE pediId = ?";

        $stmt = SQL::query($db, $sql, [DATA["pediFecha"],DATA["pediClienId"],DATA["pediId"]]);

        sqlsrv_fetch($stmt);

        return DATA;
    }

}

?>