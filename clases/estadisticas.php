<?php

class Estadisticas
{

    public function promedio($numeros)
    {
        return array_sum($numeros) / count($numeros);
    }

    public function media($numeros)
    {
        sort($numeros);
        $n = count($numeros);

        if ($n % 2 == 0) {
            return ($numeros[$n / 2 - 1] + $numeros[$n / 2]) / 2;
        } else {
            return $numeros[floor($n / 2)];
        }
    }

    public function moda($numeros)
    {
        $valores = array_count_values($numeros);
        $max = max($valores);

        $modas = [];

        foreach ($valores as $num => $frecuencia) {
            if ($frecuencia == $max) {
                $modas[] = $num;
            }
        }

        return implode(", ", $modas);
    }
}
