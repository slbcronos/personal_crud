<?php

class conectar
{
    protected $dbh;
    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO('a2nlmysql55plsk.secureserver.net:3306;dbname=crud2', 'AdminCrud2', 'Lomogel1511$');
            return $conectar;

        } catch (Exception $e) {
            print ("¡Error de Conexion!" . $e->getMessage() . '<br/>');
            die();
        }

    }
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}

?>