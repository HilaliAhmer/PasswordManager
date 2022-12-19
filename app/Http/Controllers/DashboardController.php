<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\PasswordType;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // To Do
        // $getpasswordtype=PasswordType::get();

        $getpassworddashboard=Store::orderByDesc('created_at')->limit(5)->get();
        $getitcountdashboard=Store::where('type_id','1')->count();
        $getsystemcountdashboard=Store::where('type_id','2')->count();
        return view('dashboard' , compact('getpassworddashboard','getitcountdashboard','getsystemcountdashboard',));
    }
}
