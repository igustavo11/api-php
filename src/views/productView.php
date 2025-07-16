<?php

if (!isset($products)) {
    echo "Nenhum produto encontrado.";
    return;
}
foreach ($products as $product) {
    echo "ID: " . $product->getId() . " | Nome: " . $product->getName() . " | Estoque: " . $product->getStock() . "\n";
}