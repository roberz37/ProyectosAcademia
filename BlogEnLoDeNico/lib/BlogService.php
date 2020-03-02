<?php

namespace BLibrary;

class BlogService {
  
    public function savePost(string $content, string $user) {
        $fs = new FileStore($user.'.posts');
        $posts = $fs->read();
      // Agregar $content a $posts
        $posts[]=$content;
      // Luego volver a guardar el archivo
        $retorno= $fs->save($posts);
        return $retorno;
    }
    
    public function getAllPosts(string $user) { 
        $fs = new FileStore($user . '.posts');
        $posts = $fs->read();
        return $posts;
    }
  }