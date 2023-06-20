<?php

namespace App\Http\Controllers;

use App\Enums\BasketType;
use App\Http\Requests\WishlistRequest;
use App\Services\BasketService;
use App\Services\WishlistService;
use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;

class WishlistController extends Controller
{

    public function __construct(protected WishlistService $wishlistService,protected BasketService $basketService)
    {
    }

    public function index()
    {
        $basket = $this->basketService->getCard(BasketType::BASKET);
       $wishlist = $this->wishlistService->getCard(BasketType::WISHLIST);
       return view('front.wishlist',compact('wishlist','basket'));
    }

    public function addWishlist(WishlistRequest $wishlistRequest)
    {
      $wishlistCount = session('wishlistCount',0);
      $wishlistCount++;
      session(['wishlistCount'=>$wishlistCount]);
      $this->wishlistService->addWishlist(BasketType::WISHLIST,$wishlistRequest);
    }

    public function deleteFromWishlist($id)
    {
        $wishlistCount = session('wishlistCount');
        if ($wishlistCount > 0){
            $wishlistCount--;
        }
        session(['wishlistCount' => $wishlistCount]);
        $this->wishlistService->deleteFromWishlist(BasketType::WISHLIST,$id);
        return redirect()->back();
    }

    public function updateWishlist()
    {
        $this->wishlistService->updateWishlist(BasketType::WISHLIST,request()->all());
    }
}
