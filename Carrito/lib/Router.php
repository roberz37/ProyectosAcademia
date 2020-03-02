<?php

namespace Library;

class Router{
    private $lista=array();

    public function addRoute(string $path, $target){
        if (is_string($path) && empty($this->lista[$path])){
            $this->lista[$path]=$target;
            return true;
        }
        return false;
    }
    
    public function match(string $path){
        foreach ($this->lista as $regex => $target) {
            $r = preg_match_all("#".$regex."#", $path);
            if ($r>0){
                return $target;
            }
        }
        return null;
    }

}