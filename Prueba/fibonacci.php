<?php
function calcularFibonacci($n) {
    $fibSeries = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fibSeries[$i] = $fibSeries[$i - 1] + $fibSeries[$i - 2];
    }
    $result = implode(', ', array_slice($fibSeries, 0, $n));
    return "<p>Serie Fibonacci ($n términos): $result</p>";
}
