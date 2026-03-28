<?php

class acronimo
{
    public function generar($frase)
    {

        $frase = preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s-]/u", "", $frase);
        $palabras = preg_split("/[\s-]+/", $frase);
        $resultado = implode("", array_map(function ($p) {
            return mb_strtoupper($p[0]);
        }, array_filter($palabras)));

        return $resultado ?: "N/A";
    }
}
