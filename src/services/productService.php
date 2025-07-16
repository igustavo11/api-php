<?php


require_once __DIR__ . '/../repositories/productRepository.php';

class ProductService {
    private ProductRepository $repository;

    public function __construct() {
        $this->repository = new ProductRepository();
    }

    public function getAll(): array {
        return $this->repository->findAll();
    }

    public function getReport(array $criteria): array {
        
        return $this->repository->findAll();
    }

    public function create(string $name, int $stock): Product {
        $product = new Product(0, $name, $stock);
        $this->repository->save($product);
        return $product;
    }

    public function update(int $id, string $name, int $stock): ?Product {
        $product = $this->repository->find($id);
        if ($product) {
            $product = new Product($id, $name, $stock);
            $this->repository->update($product);
            return $product;
        }
        return null;
    }

    public function delete(int $id): void {
        $this->repository->delete($id);
    }
}