<?php
require_once '../models/ValidationPost.php';
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

    public function getPublicacion($tittle){ 

        $tittle = $this->db->escape($tittle);
        $tittle = $this->db->escapeWildcards($tittle);

        $sql = "SELECT p.*, c.nombre 
                FROM publicaciones p 
                INNER JOIN categorias c 
                ON p.categoria_id = c.id
                WHERE p.titulo = \"$tittle\" 
                ORDER BY p.id DESC";

        $this->db->query($sql);
        return $this->db->fetch();
    }

    public function create($titulo, $categoria, $desc, $user){
        $titulo = $this->db->escape($titulo);
        $categoria = $this->db->escape($categoria);
        $desc = $this->db->escape($desc);

        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($desc)) throw new ValidationPost("Descripcion inválida");
        if(empty($categoria) || !ctype_digit($categoria)) throw new ValidationPost("Categoria inválida");
        if(empty($user) || !is_array($user)) throw new ValidationPost("Usuario invalido");
        $fecha = date('Y-m-d');

        $sql = "INSERT INTO publicaciones(usuario_id, categoria_id, titulo, descripcion,fecha) VALUES('{$user['id']}', '$categoria', '$titulo', '$desc', '$fecha')";

        $this->db->query($sql);
    }

    public function getPublicacionesForUser($user){

        if(empty($user) || !is_array($user)) throw new ValidationPost("Usuario invalido");

        $sql = "SELECT p.*, c.nombre, u.id FROM publicaciones p 
            INNER JOIN categorias c 
            ON p.categoria_id = c.id 
            INNER JOIN usuarios u 
            ON p.usuario_id = u.id
            WHERE usuario_id=\"{$user["id"]}\"";

        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    public function getPublicacionForUser($user, $titulo){
        $titulo = $this->db->escapeWildcards($titulo);
        $titulo = $this->db->escape($titulo);

        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($user) || !is_array($user)) throw new ValidationPost("Usuario invalido");

        $sql = "SELECT p.*, c.nombre, u.id FROM publicaciones p 
            INNER JOIN categorias c 
            ON p.categoria_id = c.id 
            INNER JOIN usuarios u 
            ON p.usuario_id = u.id
            WHERE usuario_id=\"{$user["id"]}\" 
            AND p.titulo = \"$titulo\"";

        $this->db->query($sql);
        return $this->db->fetch();
            
    }

    public function update($titulo, $titulo_anti, $categoria, $descripcion, $user){
        $titulo = $this->db->escape($titulo);
        $titulo_anti = $this->db->escape($titulo_anti);
        $categoria = $this->db->escape($categoria);
        $descripcion = $this->db->escape($descripcion);

        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($titulo_anti)) throw new ValidationPost("Titulo Antiguo inválido");
        if(empty($descripcion)) throw new ValidationPost("Descripcion inválida");
        if(empty($categoria) || !ctype_digit($categoria)) throw new ValidationPost("Categoria inválida");
        if(empty($user) || !is_array($user)) throw new ValidationPost("Usuario invalido");

        $sql = "UPDATE publicaciones 
        SET titulo='$titulo', descripcion='$descripcion', categoria_id='$categoria'
        WHERE titulo='$titulo_anti' 
        AND usuario_id={$user['id']}";

        $this->db->query($sql);
    }

    public function delete($titulo, $user){
        $titulo = $this->db->escapeWildcards($titulo);
        $titulo = $this->db->escape($titulo);

        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($user) || !is_array($user)) throw new ValidationPost("Usuario invalido");

        $sql = "DELETE 
        FROM publicaciones 
        WHERE titulo='$titulo' 
        AND usuario_id={$user['id']}";

        $this->db->query($sql);
    }
}

