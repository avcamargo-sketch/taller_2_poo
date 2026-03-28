<?php
session_start();

class Calculadora {
    private array $historial = [];

    public function __construct() {
        $this->historial = $_SESSION['historial'] ?? [];
    }

    public function operar(float $num1, string $op, float $num2): float {
        switch($op) {
            case '+': $res = $num1 + $num2; break;
            case '-': $res = $num1 - $num2; break;
            case '*': $res = $num1 * $num2; break;
            case '/': $res = $num2 != 0 ? $num1 / $num2 : 0; break;
            case '%': $res = $num1 * $num2 / 100; break;
            default: $res = 0; break;
        }
        $this->historial[] = "$num1 $op $num2 = $res";
        $_SESSION['historial'] = $this->historial;
        return $res;
    }

    public function getHistorial(): array {
        return $this->historial;
    }

    public function borrarHistorial() {
        $this->historial = [];
        $_SESSION['historial'] = [];
    }
}