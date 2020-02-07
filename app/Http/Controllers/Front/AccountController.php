<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountUpdateRequest;

class AccountController extends Controller
{
    public function show()
    {
        return view('front.account');
    }

    public function update(AccountUpdateRequest $request)
    {
        $user = Auth::user();
        $user->update($request->all());

        return redirect('account');
    }
}
