<?php

require_once '../models/ValidationUser.php';

class Usuarios extends Model{

    public function create($nombre, $apellido, $email, $pass){

        //nombre
        if(empty($nombre) || is_numeric($nombre) || !preg_match('/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/', $nombre)) throw new ValidationUser("El nombre no es válido"); 
        
        //apellido
        if(empty($apellido) || is_numeric($apellido) || !preg_match('/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/', $apellido)) throw new ValidationUser("El apellido no es válido");
        
        //email
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) throw new ValidationUser("El email no es válido");
        
        //pass
        if(empty($pass)) throw new ValidationUser("La contraseña no es válida");
        
        $nombre = $this->db->escape($nombre);
        $apellido = $this->db->escape($apellido);
        $email = $this->db->escape($email);
        $pass = $this->db->escape($pass);
        $fecha = date('Y-m-d');

        $password_segura = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
        $sql = "INSERT INTO usuarios(nombre,apellido,email,password,fecha) VALUES('$nombre', '$apellido', '$email', '$password_segura', '$fecha')";

        $this->db->query($sql);
    }

    public function getUser($email, $pass){

        //email
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) throw new ValidationUser("El email no es válido");
        
        //password
        if(empty($pass)) throw new ValidationUser("La contraseña no es válida");
        

        $email = $this->db->escape($email);
        $pass = $this->db->escape($pass);

        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $this->db->query($sql);
        $user = $this->db->fetch();
        if(!$user) throw new ValidationUser("Email y/o contraseña no son válidos");
        $ingreso = password_verify($pass, $user['password']);

        if(!$ingreso) throw new ValidationUser("Email y/o contraseña no son válidos");
        
        return $user;
    }

    public function update($nombre, $apellido, $email, $user){

        if(empty($nombre) || is_numeric($nombre) || !preg_match('/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/', $nombre)) throw new ValidationUser("El nombre no es válido");
        if(empty($apellido) || is_numeric($apellido) || !preg_match('/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/', $apellido)) throw new ValidationUser("El apellido no es válido");
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) throw new ValidationUser("El email no es válido");
        if(empty($user) || !is_array($user) || !ctype_digit($user['id'])) throw new ValidationUser("Usuario invalido");
        $user_id = $this->db->escape($user['id']);

        $sql = "SELECT id FROM usuarios WHERE id='$user_id' LIMIT 1";
        $this->db->query($sql);
        $rs = $this->db->fetch();
        if(!$rs) throw new ValidationPost("Usuario invalido");

        $nombre = $this->db->escape($nombre);
        $apellido = $this->db->escape($apellido);
        $email = $this->db->escape($email);

        $sql = "UPDATE usuarios 
        SET nombre='$nombre', apellido='$apellido', email='$email' 
        WHERE id='$user_id'";

        $this->db->query($sql);
    }

}

