<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\PasswordType;

class DashboardController extends Controller
{
    public function dashboard()
    {

        // TO DO $getpassword objesi kullanarak düzenlenmesi gereken şifrelerin arızalı kısımlarının tespit edilmesi.

        $passwordtype_count=PasswordType::count();
        $passwordtypes=PasswordType::withCount('stores')->get();
        $getpassworddashboard=Store::orderByDesc('created_at')->limit(10)->get();
        $getpassword=Store::select(['id','title','password','strong_password'])->where('strong_password','0')->orderByDesc('created_at')->limit(10)->get();
        return view('dashboard' , compact('getpassworddashboard','passwordtypes','passwordtype_count','getpassword'));

    }
}
