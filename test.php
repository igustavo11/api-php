<?php


require_once __DIR__ . '/src/models/product.php';
require_once __DIR__ . '/src/repositories/productRepository.php';
require_once __DIR__ . '/src/services/productService.php';
require_once __DIR__ . '/src/controllers/productController.php';

$controller = new ProductController();

echo "Criando produto...\n";
$controller->store('Produto Teste', 10);

echo "Listando produtos...\n";
$controller->index();

echo "Atualizando produto id 1...\n";
$controller->update(1, 'Produto Atualizado', 20);

echo "Listando produtos após atualização...\n";
$controller->index();

echo "Excluindo produto id 1...\n";
$controller->delete(1);

echo "Listando produtos após exclusão...\n";
$controller->index();