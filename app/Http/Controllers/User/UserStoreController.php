<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\PasswordType;

class UserStoreController extends Controller
{
    protected $paginationTheme='bootstrap';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function listele(Request $request ,$slug)
    {
        // $passwordUserStore=DB::table('password_types')
        // ->rightjoin('stores','password_types.id',"=",'stores.password_type_id')
        // ->where('password_types.slug',$slug)
        // ->get();

        $listname=PasswordType::whereSlug($slug)->get();

        Session::put('tasks_url',request()->fullUrl());

        // Arama kodu tamamlandı -- START --
        $search_text=$request->title ?? "";
        if ($search_text!="") {
            $passwordUserStore=DB::table('password_types')
            ->join('stores','password_types.id',"=",'stores.password_type_id')
            ->where([
                ['password_types.slug',$slug],
                ['title','LIKE','%'.$search_text.'%'],
            ])->paginate(10);
        }else {
            $passwordUserStore=DB::table('password_types')
            ->join('stores','password_types.id',"=",'stores.password_type_id')
            ->where('password_types.slug',$slug)
            ->paginate(10);
        }
         // Arama kodu tamamlandı -- END --

        return view('user.store.list',compact('passwordUserStore','listname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
