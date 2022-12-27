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
        // dd($getpassword);
        return view('dashboard' , compact('getpassworddashboard','passwordtypes','passwordtype_count','getpassword'));

    }
    public function passwordCheck()
    {
        $getpassword=Store::select('id','password','strong_password')->where('strong_password','0')->get();
        $getpasswordpositiveBefore=Store::select('id','password','strong_password')->where('strong_password','1')->count();
        foreach ($getpassword as $pass) {
            $regex_pass='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[=@!%*\-+?&.\/_])[A-Za-z\d=@!%*\-+?&.\/_]{8,}$/';
            $strong_password=preg_match($regex_pass,$pass->password);
            $gel=Store::where('id',$pass->id)->update(['strong_password' => $strong_password]);
        };
        $getpasswordpositiveAfter=Store::select('id','password','strong_password')->where('strong_password','1')->count();
        $currentCount=$getpasswordpositiveAfter-$getpasswordpositiveBefore;
        return back()->withSuccess('Şifreler tarandı ve '.$currentCount.' adet güncelleme gerçekleştirildi. Toplam uygun şifre '.$getpasswordpositiveAfter.'.');
    }
}
