<?php
class Nodo
{
    public string $valor;
    public ?Nodo $izquierda = null;
    public ?Nodo $derecha = null;

    public function __construct(string $valor)
    {
        $this->valor = $valor;
    }
}

class Arbol
{
    public ?Nodo $raiz = null;


    public function construirDesdePreIn(array $preorden, array $inorden): ?Nodo
    {
        if (empty($preorden) || empty($inorden)) {
            return null;
        }


        $raizValor = array_shift($preorden);
        $raiz = new Nodo($raizValor);


        $indice = array_search($raizValor, $inorden, true);
        if ($indice === false) {
            throw new InvalidArgumentException("Valor {$raizValor} no encontrado en inorden.");
        }

        $inIzq = array_slice($inorden, 0, $indice);
        $inDer = array_slice($inorden, $indice + 1);


        $preIzq = array_filter($preorden, fn($v) => in_array($v, $inIzq, true));
        $preDer = array_filter($preorden, fn($v) => in_array($v, $inDer, true));


        $raiz->izquierda = $this->construirDesdePreIn($preIzq, $inIzq);
        $raiz->derecha   = $this->construirDesdePreIn($preDer, $inDer);

        return $raiz;
    }


    public function imprimirInOrden(?Nodo $nodo): array
    {
        if (!$nodo) return [];
        return array_merge(
            $this->imprimirInOrden($nodo->izquierda),
            [$nodo->valor],
            $this->imprimirInOrden($nodo->derecha)
        );
    }


    public function imprimirPreOrden(?Nodo $nodo): array
    {
        if (!$nodo) return [];
        return array_merge(
            [$nodo->valor],
            $this->imprimirPreOrden($nodo->izquierda),
            $this->imprimirPreOrden($nodo->derecha)
        );
    }


    public function imprimirPostOrden(?Nodo $nodo): array
    {
        if (!$nodo) return [];
        return array_merge(
            $this->imprimirPostOrden($nodo->izquierda),
            $this->imprimirPostOrden($nodo->derecha),
            [$nodo->valor]
        );
    }
}
