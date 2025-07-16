<?php

require_once __DIR__ . '/../services/productService.php';

class ProductController {
    private ProductService $service;

    public function __construct() {
        $this->service = new ProductService();
    }

    public function index() {
        $products = $this->service->getAll();
        require __DIR__ . '/../views/productView.php';
    }

    public function store($name, $stock) {
        $this->service->create($name, $stock);
    }

    public function update($id, $name, $stock) {
        $this->service->update($id, $name, $stock);
    }

    public function delete($id) {
        $this->service->delete($id);
    }
}