<?php
function calcularFactorial($num) {
    $respuesta = 1;
    for ($i = 1; $i <= $num; $i++) {
        $respuesta *= $i;
    }
    return "<p>El factorial de $num es: $respuesta</p>";
}
