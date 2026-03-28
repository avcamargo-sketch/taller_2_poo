<?php
class Conjunto {
    private array $elementos;

    public function __construct(array $elementos) {
        $this->elementos = array_unique($elementos);
    }

    public function union(Conjunto $otro): array {
        return array_values(array_unique(array_merge($this->elementos, $otro->elementos)));
    }

    public function interseccion(Conjunto $otro): array {
        return array_values(array_intersect($this->elementos, $otro->elementos));
    }

    public function diferencia(Conjunto $otro): array {
        return array_values(array_diff($this->elementos, $otro->elementos));
    }
}