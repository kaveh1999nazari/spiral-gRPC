<?php

namespace App\Domain\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(role: 'productOption', table: 'productoptions')]
class ProductOption
{
    #[Column(type: "primary")]
    private int $id;

    #[BelongsTo(target: Product::class, nullable: false)]
    private Product $product;

    #[BelongsTo(target: Option::class, nullable: false)]
    private Option $option;

    #[BelongsTo(target: OptionValue::class, nullable: false)]
    private OptionValue $optionValue;

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

    public function getOption(): Option
    {
        return $this->option;
    }

    public function setOption(Option $option): void
    {
        $this->option = $option;
    }

    public function getOptionValue(): OptionValue
    {
        return $this->optionValue;
    }

    public function setOptionValue(OptionValue $optionValue): void
    {
        $this->optionValue = $optionValue;
    }

}
