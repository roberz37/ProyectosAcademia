<?php

namespace BLibrary;

class BlogService {

  private $collection;

  public function __construct()
  {
    $conn = new \MongoDB\Client("mongodb://localhost");
    $this->collection= $conn->rober->posts;
  }

    public function savePost(string $content, string $user) {
      $this->collection->insertOne(['posts' => $content, 'user'=> $user]);
      return true;  
      
      
      // $fs = new FileStore($user.'.posts');        
        //$posts = $fs->read();
      // Agregar $content a $posts
        //$posts[]=$content;
      // Luego volver a guardar el archivo
        //$retorno= $fs->save($posts);
       
    }
    
    public function getAllPosts(string $user) { 
      $cursor = $this->collection->find(['user'=> $user]);
        $auxiliar=array();
        foreach ($cursor as $key => $document) {
          // if ($document['user']==$user){
            $auxiliar[]=$document['posts'];
          }
      
        return $auxiliar;
      }  
      
      
      // $fs = new FileStore($user . '.posts');
        // $posts = $fs->read();
        // return $posts;
}
