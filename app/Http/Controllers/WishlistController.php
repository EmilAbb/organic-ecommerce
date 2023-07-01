<?php

namespace App\Http\Controllers;

use App\Enums\BasketType;
use App\Http\Requests\WishlistRequest;
use App\Services\AdminSettingsService;
use App\Services\BasketService;
use App\Services\MenuService;
use App\Services\WishlistService;
use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;

class WishlistController extends Controller
{

    public function __construct(protected WishlistService $wishlistService,protected BasketService $basketService,protected AdminSettingsService $adminSettingsService,protected MenuService $menuService)
    {
    }

    public function index()
    {
        $basket = $this->basketService->getCard(BasketType::BASKET);
       $wishlist = $this->wishlistService->getCard(BasketType::WISHLIST);
        $menus = $this->menuService->cachedMenu();
        $adminSettings = $this->adminSettingsService->cachedAdminSettings();
       return view('front.wishlist',compact('wishlist','basket','menus','adminSettings'));
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
        return redirect()->back()->with('success','Deleted Product');
    }

    public function updateWishlist()
    {
        $this->wishlistService->updateWishlist(BasketType::WISHLIST,request()->all());
    }
}
