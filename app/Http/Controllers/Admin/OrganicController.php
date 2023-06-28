<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganicRequest;
use App\Models\Organic;
use App\Services\OrganicService;

class OrganicController extends Controller
{
    public function __construct(protected OrganicService $service)
    {
    }

    public function index()
    {

        $models = $this->service->index();
        return view('admin.organic.index',compact('models'));
    }

    public function create()
    {

        return view('admin.organic.form');
    }

    public function store(OrganicRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('organic.index');
    }

    public function edit(Organic $organic)
    {

        return view('admin.organic.form',['model'=>$organic]);
    }

    public function update(OrganicRequest $request ,Organic $organic)
    {
        $this->service->update($request,$organic);
        return redirect()->back();
    }

    public function destroy(Organic $organic)
    {
        $this->service->delete($organic);
        return redirect()->back();
    }
}
