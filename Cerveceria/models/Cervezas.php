<?php 
namespace Models;

use PDO;
require "core/Model.php";
use Core\Model;

class Cervezas extends Model{

    // Método para obtener todas las cervezas desde la base de datos
    public static function all(){
        $dbh =  Cervezas::db();
        $sql = "SELECT * FROM Cervezas";
        $statement = $dbh->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, Cervezas::class);
        $cervezas = $statement->fetchAll(PDO::FETCH_CLASS);
        return $cervezas;
    }

    // Método para encontrar una cerveza por su ID
    public static function find($id){
        $dbh = self::db();
        $sql = "SELECT * FROM Cervezas WHERE Identificador = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Cervezas::class);
        $cerveza = $statement->fetch(PDO::FETCH_CLASS);
        return $cerveza;
    }

    // Método para insertar una nueva cerveza en la base de datos
    public function insert(){
        $dbh = self::db();
        $sql = "INSERT INTO Cervezas (Nombre, Tipo, Graduacion_alcoholica, Pais, Precio, Ruta_imagen_asociada_a_la_cerveza) 
        VALUES (:nombre, :tipo, :graduacion, :pais, :precio, :ruta)";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":nombre",$this->Nombre);
        $statement->bindValue(":tipo",$this->Tipo);
        $statement->bindValue(":graduacion",$this->Graduacion_alcoholica);
        $statement->bindValue(":pais",$this->Pais);
        $statement->bindValue(":precio",$this->Precio);
        $statement->bindValue(":ruta",$this->Ruta_imagen_asociada_a_la_cerveza);
        return $statement->execute();
    }

    // Método para actualizar la información de una cerveza en la base de datos
    public function save(){
        $dbh = self::db();
        $sql = "UPDATE Cervezas 
                SET Nombre = :nombre, 
                    Tipo = :tipo, 
                    Graduacion_alcoholica = :graduacion,
                    Pais = :pais, 
                    Precio = :precio, 
                    Ruta_imagen_asociada_a_la_cerveza = :ruta
                WHERE Identificador = :id";

    
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":nombre", $this->Nombre);
        $statement->bindValue(":tipo", $this->Tipo);
        $statement->bindValue(":graduacion", $this->Graduacion_alcoholica);
        $statement->bindValue(":pais", $this->Pais);
        $statement->bindValue(":precio", $this->Precio);
        $statement->bindValue(":ruta", $this->Ruta_imagen_asociada_a_la_cerveza);
        $statement->bindValue(":id", $this->Identificador);
       
        
        return $statement->execute(); 
    }
    

    // Método para eliminar una cerveza de la base de datos por su ID
    public static function delete($id){
        $db = Cervezas::db();
        $stmt = $db->prepare('DELETE FROM Cervezas WHERE Identificador = :id');
        $stmt->bindValue(':id',$id);
        return $stmt->execute();
    }
}
?>
