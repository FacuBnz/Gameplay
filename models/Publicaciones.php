<?php
class Publicaciones extends Model{
    
    public function getPublicaciones($limit=null){
        $sql = "SELECT p.*, c.nombre 
                FROM publicaciones p
                INNER JOIN categorias c 
                ON p.categoria_id = c.id
                ORDER BY p.id DESC";

        if($limit != null && is_numeric($limit)){
            $sql .= " LIMIT $limit";
        }

        $this->db->query($sql);
        return $this->db->fetchAll();
    }
}