<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMapRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ContactMap;
use App\Services\ContactMapService;
use App\Services\ContactService;

class ContactMapController extends Controller
{
    public function __construct(protected ContactMapService $service)
    {
    }

    public function index()
    {

        $models = $this->service->index();
        return view('admin.contact-map.index',compact('models'));
    }

    public function create()
    {

        return view('admin.contact-map.form');
    }

    public function store(ContactMapRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('contact-map.index');
    }

    public function edit(ContactMap $contactMap)
    {

        return view('admin.contact-map.form',['model'=>$contactMap]);
    }

    public function update(ContactMapRequest $request , ContactMap $contactMap)
    {
        $this->service->update($request,$contactMap);
        return redirect()->back();
    }

    public function destroy(ContactMap $contactMap)
    {
        $this->service->delete($contactMap);
        return redirect()->back();
    }

}
