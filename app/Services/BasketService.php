<?php

namespace App\Services;

use App\Enums\BasketType;
use App\Http\Requests\BasketRequest;
use Jackiedo\Cart\Facades\Cart;


class BasketService
{

    public function __construct(protected ProductService $productService)
    {
    }

    public function getCard(BasketType $basketType)
    {
        return Cart::name($basketType->value);
    }

    public function addBasket(BasketType $basketType, BasketRequest $basketRequest)
    {
        $basket = $this->getCard($basketType);
        $product = $this->productService->getProductForBasket($basketRequest->product_id);
        $basketItem = $this->getItem($basket, $basketRequest->product_id);
        if ($basketItem) {
            $this->update($basket, $basketItem->getHash(), $product, $basketRequest);
        } else {
            $this->add($basket, $product, $basketRequest);
        }
    }

    private function getItem($basket, $productId)
    {
        return collect($basket->getItems())->where(function ($basketItem) use ($productId) {
            return $basketItem->get('id') == $productId;
        })->first();
    }

    public function update($basket, $itemHash, $product, $basketRequest)
    {
        $basket->updateItem($itemHash, $this->getBasketData($product, $basketRequest));
    }

    private function add($basket, $product, $basketRequest)
    {
        $basket->addItem($this->getBasketData($product, $basketRequest));
    }

    public function updateBasket(BasketType $basketType, $data)
    {
        $basket = $this->getCard($basketType);
        $items = $data['items'] ?? [];
        foreach ($items as $hash => $quantity) {
            $basket->updateItem($hash, [
                'quantity' => $quantity
            ]);
        }
    }

    public function deleteFromBasket($basketType, $id): void
    {
        $cartCount = session('cartCount');
        $basket = $this->getCard($basketType);
        $basketItem = $this->getItem($basket, $id);
        if ($basketItem ) {
            $basket->removeItem($basketItem->getHash());
        }
    }

    private function getBasketData($product, $basketRequest): array
    {
        return [
            'id' => $product->id,
            'title' => $product->title,
            'quantity' => $basketRequest->qty,
            'price' => $product->price,
            'extra_info' => [
                'product' => $product
            ]
        ];
    }
}
