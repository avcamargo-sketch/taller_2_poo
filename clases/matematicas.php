<?php

class Matematicas {

    public function fibonacci($n) {
        $serie = [];

        if ($n >= 1) $serie[] = 0;
        if ($n >= 2) $serie[] = 1;

        for ($i = 2; $i < $n; $i++) {
            $serie[] = $serie[$i - 1] + $serie[$i - 2];
        }

        return $serie;
    }

    public function factorial($n) {
        $resultado = 1;

        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }

        return $resultado;
    }
}