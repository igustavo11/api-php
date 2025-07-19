<?php
//teste


ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);

// cors config (para prod/dev)
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// res/req test
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
// Inclui os arquivos necessários
require_once __DIR__ . '/repositories/productRepository.php';
require_once __DIR__ . '/models/product.php';

// Cria o repositório de produtos
$productRepository = new ProductRepository();

// Pega o caminho e o método da requisição
$path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '';
$method = $_SERVER['REQUEST_METHOD'];
error_log('PATH: ' . $path . ' METHOD: ' . $method);

// Redireciona / para /products
if ($path === '/' && $method === 'GET') {
    header('Location: /products');
    exit();
}

// GET /products - Lista todos os produtos
if (preg_match('#^/products/?$#', $path) && $method === 'GET') {
    $produtos = $productRepository->findAll();
    $resposta = [];
    foreach ($produtos as $produto) {
        $resposta[] = [
            'id' => $produto->getId(),
            'name' => $produto->getName(),
            'stock' => $produto->getStock()
        ];
    }
    echo json_encode($resposta);
    exit();
}
// GET /products/{id} - Busca um produto pelo ID
if (preg_match('/^\/products\/(\d+)$/', $path, $m) && $method === 'GET') {
    $id = (int)$m[1];
    $produto = $productRepository->find($id);
    if ($produto) {
        echo json_encode([
            'id' => $produto->getId(),
            'name' => $produto->getName(),
            'stock' => $produto->getStock()
        ]);
    } else {
        echo json_encode(['erro' => 'Produto não encontrado']);
    }
    exit();
}

// POST /products - Adiciona um produto
if ($path === '/products' && $method === 'POST') {
    $dados = json_decode(file_get_contents('php://input'), true);
    $produto = new Product(0, $dados['name'], $dados['stock']);
    $productRepository->save($produto);
    echo json_encode(['mensagem' => 'Produto criado']);
    exit();
}

// PUT /products/{id} - Atualiza um produto
if (preg_match('/^\/products\/(\d+)$/', $path, $m) && $method === 'PUT') {
    $id = (int)$m[1];
    $dados = json_decode(file_get_contents('php://input'), true);
    $produto = new Product($id, $dados['name'], $dados['stock']);
    $productRepository->update($produto);
    echo json_encode(['mensagem' => 'Produto atualizado']);
    exit();
}

// DELETE /products/{id} - Deleta um produto
if (preg_match('/^\/products\/(\d+)$/', $path, $m) && $method === 'DELETE') {
    $id = (int)$m[1];
    $productRepository->delete($id);
    echo json_encode(['mensagem' => 'Produto deletado']);
    exit();
}

// Se não encontrou nenhuma rota
echo json_encode(['erro' => 'Rota não encontrada']);




