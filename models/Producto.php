<?

class Producto extends conectar
{
    public function get_producto()
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto Where est=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_producto_x_id($prod_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_producto($prod_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto
            SET
            est = 0
            fech_elim=now()
            WHERE prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_producto($prod_nom)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_producto (prod_id, prod_nom, fecha_crea, fecha_modi, fecha_elim, est) VALUES (NULL, ?, now(), NULL, NULL, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nom);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_producto($prod_id, $prod_nom)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto
        SET
        prod_nom = ?
        fech_modi=now()
        WHERE prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nom);
        $sql->bindValue(2, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}

?>