<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Services\MenuService;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct(protected MenuService $service)
    {
    }

    public function index()
    {
        $menus = Menu::with('children')->whereNull('parent_id')->get();
        $models = $this->service->index();
        return view('admin.menu.index',compact('models','menus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.menu.form',compact('menus'));
    }

    public function store(MenuRequest $menuRequest)
    {
        $this->service->store($menuRequest);
        return redirect()->route('menu.index');
    }

    public function edit(Menu $menu)
    {

        return view('admin.menu.form',['model'=>$menu]);
    }

    public function update(MenuRequest $menuRequest ,Menu $menu)
    {
        $this->service->update($menuRequest,$menu);
        return redirect()->back();
    }

    public function destroy(Menu $menu)
    {
        $this->service->delete($menu);
        return redirect()->back();
    }
}
