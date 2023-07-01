<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function subscribe(Request $request)
    {
      $email = $request->input('email');
      $subscriber = Subscriber::firstOrNew(['email' =>$email]);
        $subscriber->subscribed = $request->has('subscribe');
        $subscriber->save();
        return redirect()->back()->with('success', 'Your subscription has been successfully updated!');
    }
}
