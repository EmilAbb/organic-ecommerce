<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contactMessage = ContactMessage::all();
         return view('admin.contact-message.index',compact('contactMessage'));
    }

    public function destroy($id)
    {
        $contactMessage = ContactMessage::where('id', $id)->firstOrFail();
        $contactMessage->delete();

        return redirect()->route('contact-message.index');
    }
}
