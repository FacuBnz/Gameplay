<?php

require_once '../models/ValidationCategory.php';

class Categorias extends Model{
    
    public function getTodos(){
        $this->db->query("SELECT * FROM categorias");
        return $this->db->fetchAll();
    }

    public function getNameCategory($id){

        if(empty($id) || !ctype_digit($id)) throw new ValidationCategory("id invalido");
        $id = $this->db->escape($id);

        $sql = "SELECT id FROM categorias WHERE id='$id' LIMIT 1";
        $this->db->query($sql);
        $rs = $this->db->fetch();
        if(!$rs) throw new ValidationCategory("id invalido");

        $sql = "SELECT id, nombre FROM categorias WHERE id=$id";
        $this->db->query($sql);
        return $this->db->fetch();
    }

    public function create($nombre){
        
        if(empty($nombre) || is_numeric($nombre) || !preg_match('/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/', $nombre)) throw new ValidationCategory("Nombre inválido");
        $nombre = $this->db->escape($nombre);
        
        $sql = "INSERT INTO categorias(nombre) VALUES('$nombre')";
        $this->db->query($sql);
    }

}

