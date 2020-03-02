<?php

namespace BLibrary;

class UserService{

    public function getAllUsers() {
        $fs = new FileStore('usuarios.data');
        $usuarios = $fs->read();
        return $usuarios;
      }
      
      public function userExists(string $user) {
        $usuarios = $this->getAllUsers();
        foreach($usuarios as $u) {
          if ($u == $user) {
            return true;
          }
        }
        return false;
      }
      
      public function saveUser(string $user) {
        $usuarios= $this->getAllUsers();
        if (!$this->userExists($user)){
            $fs = new FileStore('usuarios.data');
            $usuarios[]=$user;
            $retorno= $fs->save($usuarios);
            return $retorno;
        }
        return false;
        
        
        
        // completar
        // buscar todos los usuarios
        // agregar este usuario nuevo
        // guardar los usuarios
      }
}

