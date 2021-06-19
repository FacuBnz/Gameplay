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

}