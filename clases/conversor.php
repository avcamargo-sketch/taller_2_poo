<?php
class Convertidor {
    public function aBinario(int $numero): string {
        return decbin($numero);
    }
}