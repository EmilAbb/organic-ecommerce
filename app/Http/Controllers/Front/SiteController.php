<?php

namespace App\Http\Controllers\Front;

use App\Enums\BasketType;
use App\Enums\Guards;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\BasketService;
use App\Services\CategoryService;
use App\Services\ContactMapService;
use App\Services\ContactService;
use App\Services\OrganicService;
use App\Services\ProductService;
use App\Services\WishlistService;
use Illuminate\Support\Facades\Auth;


class SiteController extends Controller
{

    public function __construct(protected BasketService $basketService, protected WishlistService $wishlistService,protected OrganicService $organicService)
    {
    }

    public function home(Product $product)
    {
        $wishlist = $this->wishlistService->getCard(BasketType::WISHLIST);
        $basket = $this->basketService->getCard(BasketType::BASKET);
        $organics = $this->organicService->cachedOrganic();
        $products = Product::paginate(10);
        $menus = Menu::all();
        return view('front.home', compact('basket', 'wishlist','organics','products','menus'));
    }

    public function getCategoryBySlug($slug)
    {
        if ($slug != 'all') {
            $categoryId = Category::whereTranslation('slug', $slug, app()->getLocale())->first()->id;
            $products = Product::where('category_id', $categoryId)->get();
        } else {
            $products = Product::limit(8)->get();
        }


        return view('front.product-slug', compact('products'))->render();

    }

    public function shop(CategoryService $categoryService, Product $product)
    {
        $basket = $this->basketService->getCard(BasketType::BASKET);
        $products = Product::paginate(9);
        $categories = $categoryService->cachedCategories();
        return view('front.shop', compact('categories', 'products', 'basket'));
    }

    public function productDetail($slug)
    {
        $basket = $this->basketService->getCard(BasketType::BASKET);
        $product = Product::with(['reviews', 'images', 'category.translations', 'translations'])
            ->whereTranslation('slug', $slug, app()
                ->getLocale())->first();
        $products = Product::where('category_id', $product->category->id)->get();
        $avg_rating = round($product->reviews->pluck('rating')->avg(), 2);
        return view('front.product', compact('product', 'products', 'avg_rating', 'basket'));
    }

    public function profile(User $user)
    {

        if (!Auth::check()) {
            return redirect()->route('basket');
        }
        $user = Auth::user();
        $orders = Order::where('user_id', auth()->guard(Guards::USER->value)->user()->id)->get();

        return view('front.profile', compact('user', 'orders'));
    }

    public function contact(ContactService $contactService, ContactMapService $contactMapService)
    {
        $contacts = $contactService->cachedContacts();
        $contactMaps = $contactMapService->cachedContactMap();
        return view('front.contact', compact('contacts', 'contactMaps'));
    }


    public function create(ContactMessageRequest $contactMessageRequest)
    {
        $contactMessage = $contactMessageRequest->validated();
        ContactMessage::create($contactMessage);
        return redirect()->back()->with('success','Your message has been sent successfully');
    }


}
