<?php


require_once __DIR__ . '/../models/product.php';

class ProductRepository {
    private \PDO $pdo;

    public function __construct() {
        $host = getenv('PGHOST');
        $port = getenv('PGPORT');
        $dbname = getenv('PGDATABASE');
        $user = getenv('PGUSER');
        $password = getenv('PGPASSWORD');
        
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function findAll(): array {
        $query = $this->pdo->query('SELECT * FROM products ORDER BY id DESC');
        $products = [];
        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
            $products[] = new Product($row['id'], $row['name'], $row['stock']);
        }
        return $products;
    }

    //get
    public function find(int $id): ?Product {
        $query = $this->pdo->prepare('SELECT * FROM products WHERE id = ?');
        $query->execute([$id]);
        $row = $query->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Product($row['id'], $row['name'], $row['stock']);
        }
        return null;
    }
    //post
    public function save(Product $product): void {
        $query = $this->pdo->prepare('INSERT INTO products (name, stock) VALUES (?, ?)');
        $query->execute([$product->getName(), $product->getStock()]);
    }
    //put
    public function update(Product $product): void {
        $query = $this->pdo->prepare('UPDATE products SET name = ?, stock = ? WHERE id = ?');
        $query->execute([$product->getName(), $product->getStock(), $product->getId()]);
    }
    //dete
    public function delete(int $id): void {
        $query = $this->pdo->prepare('DELETE FROM products WHERE id = ?');
        $query->execute([$id]);
    }
}