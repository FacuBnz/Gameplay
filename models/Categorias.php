<?php

class Categorias extends Model{
    
    public function getTodos(){
        $this->db->query("SELECT * FROM categorias");
        return $this->db->fetchAll();
    }

    public function getNameCategory($id){

        if(ctype_digit($id)){
            $sql = "SELECT id, nombre FROM categorias WHERE id=$id";

            $this->db->query($sql);
            $rs = $this->db->fetch();
            if($rs) return $rs;
            header('Location: index.php');
            
        }
        header('Location: index.php');
    }

    
}