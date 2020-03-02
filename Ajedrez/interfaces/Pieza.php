<?php

namespace Interfaces;

interface Pieza {
    public function mover($x1, $y1, $x2, $y2, \Library\Tablero $tablero);
}