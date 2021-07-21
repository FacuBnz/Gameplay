<?php
require_once '../models/ValidationPost.php';
class Publicaciones extends Model{
    
    public function getPublicaciones($limit=null){
        $sql = "SELECT p.*, c.nombre 
                FROM publicaciones p
                INNER JOIN categorias c 
                ON p.categoria_id = c.id
                ORDER BY p.id DESC";

        if($limit != null && ctype_digit($limit)){
            $sql .= " LIMIT $limit";
        }

        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    public function getPublicacion($tittle){
        
        if(empty($tittle)) throw new ValidationPost("Titulo invalido");

        $tittle = $this->db->escape($tittle);

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
        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($desc)) throw new ValidationPost("Descripcion inválida");
        if(empty($categoria) || !ctype_digit($categoria)) throw new ValidationPost("Categoria inválida");
        if(empty($user) || !is_array($user) || !ctype_digit($user['id'])) throw new ValidationPost("Usuario invalido");

        $user_id = $this->db->escape($user['id']);

        $sql = "SELECT id FROM usuarios WHERE id='$user_id' LIMIT 1";
        $this->db->query($sql);
        $rs = $this->db->fetch();

        if(!$rs) throw new ValidationPost("Usuario invalido");
        
        $fecha = date('Y-m-d');
        $titulo = $this->db->escape($titulo);
        $categoria = $this->db->escape($categoria);
        $desc = $this->db->escape($desc);

        $sql = "INSERT INTO publicaciones(usuario_id, categoria_id, titulo, descripcion,fecha) VALUES('$user_id', '$categoria', '$titulo', '$desc', '$fecha')";

        $this->db->query($sql);
    }

    public function getPublicacionesForUser($user){

        if(empty($user) || !is_array($user) || !ctype_digit($user['id'])) throw new ValidationPost("Usuario invalido");
        $user_id = $this->db->escape($user['id']);
        
        $sql = "SELECT id FROM usuarios WHERE id='$user_id' LIMIT 1";
        $this->db->query($sql);
        $rs = $this->db->fetch();

        if(!$rs) throw new ValidationPost("Usuario invalido");


        $sql = "SELECT p.*, c.nombre, u.id FROM publicaciones p 
            INNER JOIN categorias c 
            ON p.categoria_id = c.id 
            INNER JOIN usuarios u 
            ON p.usuario_id = u.id
            WHERE usuario_id=\"$user_id\"
            ORDER BY p.id DESC";

        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    public function getPublicacionForUser($user, $titulo){
        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($user) || !is_array($user) || !ctype_digit($user['id'])) throw new ValidationPost("Usuario invalido");
        $user_id = $this->db->escape($user['id']);

        $sql = "SELECT id FROM usuarios WHERE id='$user_id' LIMIT 1";
        $this->db->query($sql);
        $rs = $this->db->fetch();
        if(!$rs) throw new ValidationPost("Usuario invalido");

        $titulo = $this->db->escape($titulo);

        $sql = "SELECT p.*, c.nombre, u.id FROM publicaciones p 
            INNER JOIN categorias c 
            ON p.categoria_id = c.id 
            INNER JOIN usuarios u 
            ON p.usuario_id = u.id
            WHERE usuario_id=\"$user_id\" 
            AND p.titulo = \"$titulo\"";

        $this->db->query($sql);
        return $this->db->fetch();
    }

    public function update($titulo, $titulo_anti, $categoria, $descripcion, $user){
        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($titulo_anti)) throw new ValidationPost("Titulo Antiguo inválido");
        if(empty($descripcion)) throw new ValidationPost("Descripcion inválida");
        if(empty($categoria) || !ctype_digit($categoria)) throw new ValidationPost("Categoria inválida");
        if(empty($user) || !is_array($user) || !ctype_digit($user['id'])) throw new ValidationPost("Usuario invalido");
        $user_id = $this->db->escape($user['id']);
        
        $sql = "SELECT id FROM usuarios WHERE id='$user_id' LIMIT 1";
        $this->db->query($sql);
        $rs = $this->db->fetch();
        if(!$rs) throw new ValidationPost("Usuario invalido");

        $titulo = $this->db->escape($titulo);
        $titulo_anti = $this->db->escape($titulo_anti);
        $categoria = $this->db->escape($categoria);
        $descripcion = $this->db->escape($descripcion);

        $sql = "UPDATE publicaciones 
        SET titulo='$titulo', descripcion='$descripcion', categoria_id='$categoria'
        WHERE titulo='$titulo_anti' 
        AND usuario_id='$user_id'";

        $this->db->query($sql);
    }

    public function delete($titulo, $user){
        if(empty($titulo)) throw new ValidationPost("Titulo inválido");
        if(empty($user) || !is_array($user) || !ctype_digit($user['id'])) throw new ValidationPost("Usuario invalido");
        $user_id = $this->db->escape($user['id']);

        $sql = "SELECT id FROM usuarios WHERE id='$user_id' LIMIT 1";
        $this->db->query($sql);
        $rs = $this->db->fetch();
        if(!$rs) throw new ValidationPost("Usuario invalido");

        $titulo = $this->db->escape($titulo);

        $sql = "DELETE 
        FROM publicaciones 
        WHERE titulo='$titulo' 
        AND usuario_id='$user_id'";

        $this->db->query($sql);
    }
}

