<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Address;

class CheckoutController extends Controller
{
    public function index ()
    {
        if (Auth::check())
        {
          return view('front.checkout');
        }
        return rediect('home');
    }

    else {
      return redirect('login');
    }

    public function formValidate(Request $request)
    {
        // $this->validate($request, ['fullname' => 'required|min:5|max:35,'],
        //['fullname.required' => 'Enter Full Name']);

        $this->validate($request, [
          'fullname' => 'required|min:5|max:35',
          'pincode' => 'required|numeric',
          'city' => 'required|min:5|max:25',
          'state' => 'required|min:5|max:35',
          'country' => 'required'
        ]);

        $userid = Auth::user()->id;
        $address = new Address;
        $address->fullname = $request->fullname;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->pincode = $request->pincode;
        $address->country = $request->country;
        $address->user_id = $userid;

        $address->save();

    }
}
