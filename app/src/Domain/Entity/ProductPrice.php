<?php

namespace App\Domain\Entity;


use App\Domain\Repository\ProductPriceRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: ProductPriceRepository::class, table: "productprices")]
class ProductPrice
{
    #[Column(type: "primary")]
    private int $id;

    #[BelongsTo(target: Product::class, nullable: false)]
    private Product $product;

    #[Column(type: "string")]
    private string $options;

    #[Column(type: "string")]
    private string $price;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getOptions(): array
    {
        return json_decode($this->options);
    }

    public function setOptions(array $options): void
    {
        $this->options = json_encode($options);
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

}