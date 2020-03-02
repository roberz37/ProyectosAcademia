<?php

namespace LB\Interfaces;

use LB\Interfaces\Server;

interface LoadBalancer {

    public function addServer(Server $server);
    public function removeServer(string $server);
    public function getList();
}