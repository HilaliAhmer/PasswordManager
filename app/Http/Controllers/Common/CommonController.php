<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\PasswordType;
Use App\Models\Store;
Use App\Http\Requests\CommonPasswordCreateRequest;
Use App\Http\Requests\CommonPasswordUpdateRequest;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $passwordType=PasswordType::get();
        return view('common.store.create',compact('passwordType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommonPasswordCreateRequest $request)
    {
        $post_type=$request->password_type_id;
        $post_title=$request->title;

        $post_pass=$request->password;

        Store::create($request->post());
        switch ($post_type) {
            case '1':
                return redirect()->route('store.index')->withSuccess($post_title.' başarı ile eklendi.');
            case '2':
                return redirect()->route('stores.index')->withSuccess($post_title.' başarı ile eklendi.');
                break;
        }

        $regex_pass='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@!%*+?&])[A-Za-z\d@!%*+?&]{8,}$/';
        $strong_password=preg_match($regex_pass,$post_pass);
        Store::table('stores')->insert([
            'strong_password'=>$strong_password,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passwordType=PasswordType::get();
        $passwordEdit=Store::find($id) ?? abort(404 , 'Şifre Bulunamadı.');
        return view('common.store.edit', compact('passwordEdit','passwordType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommonPasswordUpdateRequest $request, $id)
    {
        $post_type=$request->password_type_id;
        $post_title=$request->title;

        $passwordEdit=Store::find($id) ?? abort(404 , 'Şifre Bulunamadı.');
        Store::where('id',$id)->update($request->except(['_method','_token']));

        switch ($post_type) {
            case '1':
                return redirect()->route('store.index')->withSuccess($post_title.' başarı ile güncelendi.');
            case '2':
                return redirect()->route('stores.index')->withSuccess($post_title.' başarı ile güncelendi.');
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $passworddestroy=Store::find($id) ?? abort(404 , 'Şifre Bulunamadı.');
        $passworddestroy->delete();
        return back()->withSuccess($passworddestroy->title.' silme işlemi başarı ile gerçekleşti.');

    }
}
