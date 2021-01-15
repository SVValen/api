<?php
class Producto {

    public $table ='Producto';
    public $fields = 'prodId,
    prodDescripcion,
    prodPrecio,
    prodFechaAlta,
    prodBorrado';

    public $join = '';

    public function get ($db) {
        $sql = "SELECT $this->fields FROM $this->table
                $this->join
                WHERE prodBorrado = 0";

        $params = null;

        if (isset( $_GET["prodDescripcion"])){
            $params = ["%" . $_GET["prodDescripcion"] . "%"];
            $sql = $sql . " AND prodDescripcion LIKE ? ";
        };

        $stmt = SQL::query($db, $sql, $params);

        $results = [];

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $results[] = $row;
        };
        return $results;
    }

    public function getId ($db) {
        $sql = "SELECT $this->fields FROM $this->table
                $this->join
                WHERE prodId = ?";
        
        $stmt =SQL::query($db, $sql, [ID]);

        $results = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        return $results;
    }

    public function delete($db) {
        $sql = "UPDATE $this->table
                SET  prodBorrado = 1
                WHERE prodId = ?";

        $stmt =SQL::query($db, $sql, [ID]);

        sqlsrv_fetch($stmt);

        return [];
    }

    public function post($db) {
        $sql = "INSERT INTO $this->table
                (prodDescripcion,
                prodPrecio,
                prodFechaAlta,
                prodBorrado)
                VALUES(?,?,GETDATE(),0);

                SELECT @@IDENTITY prodId, CONVERT(VARCHAR,GETDATE(),126) prodFechaAlta;";

        $stmt =SQL::query($db, $sql, [DATA["prodDescripcion"],DATA["prodPrecio"]]);

        sqlsrv_fetch($stmt);
        
        sqlsrv_next_result($stmt);

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        $results[] = DATA;
        $results['prodId'] = $row['prodId'];
        $results['prodFechaAlta'] = $row['prodFechaAlta'];
        $results['prodBorrado'] = 0;

        return $results;
    }

    public function put ($db) {
        $stmt = SQL::query($db,
        "UPDATE $this->table
        SET prodDescripcion = ?,
            prodPrecio = ?
        WHERE prodId = ?",
        [DATA["prodDescripcion"], DATA["prodPrecio"], DATA["prodId"]]);

        $results = [];
    }

    
   

}

?>

