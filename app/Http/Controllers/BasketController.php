<?php

namespace App\Http\Controllers;

use App\Enums\BasketType;
use App\Http\Requests\BasketRequest;
use App\Services\AdminSettingsService;
use App\Services\BasketService;
use App\Services\MenuService;
use App\Services\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{

    public function __construct(protected BasketService $basketService,protected WishlistService $wishlistService,protected AdminSettingsService $adminSettingsService,protected MenuService $menuService)
    {
    }

    public function index()
    {
        $wishlist = $this->wishlistService->getCard(BasketType::WISHLIST);
        $basket = $this->basketService->getCard(BasketType::BASKET);
        $adminSettings = $this->adminSettingsService->cachedAdminSettings();
        $menus = $this->menuService->cachedMenu();
       return view('front.card',compact('basket','wishlist','adminSettings','menus'));
    }

    public function addBasket(BasketRequest $basketRequest)
    {
        $cartCount = session('cartCount', 0);
        $cartCount++;
        session(['cartCount' => $cartCount]);
        $this->basketService->addBasket(BasketType::BASKET,$basketRequest);
    }

    public function updateBasket()
    {
       $this->basketService->updateBasket(BasketType::BASKET,request()->all());
        return redirect()->back()->with('success','Updated Product');
    }

    public function deleteFromBasket($id)
    {
        $cartCount = session('cartCount');
        if ($cartCount > 0) {
            $cartCount--;
        }
        session(['cartCount' => $cartCount]);
        $this->basketService->deleteFromBasket(BasketType::BASKET,$id);
        return redirect()->back()->with('success','Deleted Product');
    }
}
