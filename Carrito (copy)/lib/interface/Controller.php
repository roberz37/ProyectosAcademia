<?php
namespace Interfaces;

interface Controller{
    
    public function get($get, $post, &$session);

    public function post($get, $post, &$session);

}