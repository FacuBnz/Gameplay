<?php

class Categorias extends Model{
    
    public function getTodos(){
        $this->db->query("SELECT * FROM categorias");
        return $this->db->fetchAll();
    }
}