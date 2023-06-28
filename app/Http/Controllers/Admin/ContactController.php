<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(protected ContactService $service)
    {
    }

    public function index()
    {

        $models = $this->service->index();
        return view('admin.contact-spad.index',compact('models'));
    }

    public function create()
    {

        return view('admin.contact-spad.form');
    }

    public function store(ContactRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('contact.index');
    }

    public function edit(Contact $contact)
    {

        return view('admin.contact-spad.form',['model'=>$contact]);
    }

    public function update(ContactRequest $request , Contact $contact)
    {
        $this->service->update($request,$contact);
        return redirect()->back();
    }

    public function destroy(Contact $contact)
    {
        $this->service->delete($contact);
        return redirect()->back();
    }

}
