<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    public function listele($id)
    {

        $passwordUserStore=Store::where('password_type_id',$id);
        // Arama kutusu için kod --START--
        if (request()->get('title')) {
            $passwordUserStore=$passwordUserStore->where('title','LIKE',"%".request()->get('title')."%");
        }
        $listname=PasswordType::where('id',$id)->get();
        // Arama kodu tamamlandı --END--
        $passwordUserStore=$passwordUserStore->paginate(10);

        Session::put('tasks_url',request()->fullUrl());
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
