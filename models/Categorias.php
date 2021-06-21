<?php

class Categorias extends Model{
    
    public function getTodos(){
        $this->db->query("SELECT * FROM categorias");
        return $this->db->fetchAll();
    }

    public function getNameCategory($id){

        $sql = "SELECT id, nombre FROM categorias WHERE id=$id";

        $this->db->query($sql);
        return $this->db->fetch();
        
    }

    public function create($nombre){
        $nombre = $this->db->escape($nombre);

        if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) throw new ValidationCategory("Nombre inválido");

        $sql = "INSERT INTO categorias(nombre) VALUES('$nombre')";
        $this->db->query($sql);
    }

}

class ValidationCategory extends Exception{}