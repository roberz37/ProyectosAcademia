<?php

namespace BLibrary;


class UserService{

    private $collection;

    public function __construct()
    {
      $conn = new \MongoDB\Client("mongodb://localhost");
      $this->collection= $conn->rober->users;
    }

    public function getAllUsers() {
        // $fs = new FileStore('usuarios.data');
        $cursor = $this->collection->find(array());
        $auxiliar=array();
        foreach ($cursor as $document) {
          $auxiliar[]=$document['users'];
      }
        return $auxiliar;
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
          $this->collection->insertOne(['users' => $user]);
          return true;
      }
        
        
        // $usuarios= $this->getAllUsers();
        // if (!$this->userExists($user)){
        //     $fs = new FileStore('usuarios.data');
        //     $usuarios[]=$user;
        //     $retorno= $fs->save($usuarios);
        //     return $retorno;
        //}
        
        
        
        
        // completar
        // buscar todos los usuarios
        // agregar este usuario nuevo
        // guardar los usuarios
}


