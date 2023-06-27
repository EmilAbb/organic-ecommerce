<?php

namespace App\Services;

use App\Enums\BasketType;
use App\Http\Requests\BasketRequest;
use App\Http\Requests\WishlistRequest;
use Jackiedo\Cart\Facades\Cart;


class WishlistService
{

    public function __construct(protected ProductService $productService)
    {
    }

    public function getCard(BasketType $basketType)
    {
        return Cart::name($basketType->value);
    }

    public function addWishlist(BasketType $basketType, WishlistRequest $wishlistRequest)
    {
        $wishlist = $this->getCard($basketType);
        $product = $this->productService->getProductForWishlist($wishlistRequest->product_id);
        $wishlistItem = $this->getItem($wishlist, $wishlistRequest->product_id);
        if ($wishlistItem) {
            $this->update($wishlist, $wishlistItem->getHash(), $product, $wishlistRequest);
        } else {
            $this->add($wishlist, $product, $wishlistRequest);
        }
    }

    private function getItem($wishlist, $productId)
    {
        return collect($wishlist->getItems())->where(function ($wishlistItem) use ($productId) {
            return $wishlistItem->get('id') == $productId;
        })->first();
    }

    public function update($wishlist, $itemHash, $product, $wishlistRequest)
    {
        $wishlist->updateItem($itemHash, $this->getWishlistData($product, $wishlistRequest));
    }

    private function add($wishlist, $product, $wishlistRequest)
    {
        $wishlist->addItem($this->getWishlistData($product,$wishlistRequest));
        if ($wishlist){
            toastr()->success('Added Wishlist');
        }
    }

    public function updateWishlist(BasketType $basketType, $data)
    {
        $wishlist = $this->getCard($basketType);
        $items = $data['items'] ?? [];
        foreach ($items as $hash => $quantity) {
            $wishlist->updateItem($hash, [
                'quantity' => $quantity
            ]);
        }
    }

    public function deleteFromWishlist($basketType, $id): void
    {
        $wishlistCount = session('wishlistCount');
        $wishlist = $this->getCard($basketType);
        $wishlistItem = $this->getItem($wishlist, $id);

        if ($wishlistItem ) {
            $wishlist->removeItem($wishlistItem->getHash());
        }
    }

    private function getWishlistData($product, $wishlistRequest): array
    {
        return [
            'id' => $product->id,
            'title' => $product->title,
            'quantity' => $wishlistRequest->qty,
            'price' => $product->price,
            'extra_info' => [
                'product' => $product
            ]
        ];
    }
}
