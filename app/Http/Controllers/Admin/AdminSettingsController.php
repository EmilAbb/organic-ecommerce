<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSettingsRequest;
use App\Models\AdminSetting;
use App\Services\AdminSettingsService;

class AdminSettingsController extends Controller
{
    public function __construct(protected AdminSettingsService $service)
    {
    }

    public function index()
    {

        $models = $this->service->index();
        return view('admin.admin-settings.index',compact('models'));
    }

    public function create()
    {

        return view('admin.admin-settings.form');
    }

    public function store(AdminSettingsRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin-settings.index');
    }

    public function edit(AdminSetting $adminSetting)
    {

        return view('admin.admin-settings.form',['model'=>$adminSetting]);
    }

    public function update(AdminSettingsRequest $request , AdminSetting $adminSetting)
    {
        $this->service->update($request,$adminSetting);
        return redirect()->back();
    }

    public function destroy(AdminSetting $adminSetting)
    {
        $this->service->delete($adminSetting);
        return redirect()->back();
    }
}
