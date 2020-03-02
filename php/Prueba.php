<?php



function f1($var1) {
    if ($var1 > 1){
         return $var1 * f2($var1 - 1);
    }
    return $var1;
    }
function f2($var2) {
    if ($var2 > 1){
        return $var2 * f1($var2 - 1);
    }
    return $var2;
}
print(f1(5));
