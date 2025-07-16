<?php


class Product {
    private int $id;
    private string $name;
    private int $stock;

    public function __construct(int $id, string $name, int $stock) {
        $this->id = $id;
        $this->name = $name;
        $this->stock = $stock;
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getStock(): int { return $this->stock; }
}