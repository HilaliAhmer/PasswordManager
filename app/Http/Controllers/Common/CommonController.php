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
        $passwordUserStore=Store::where('password_type_id',$post_type)->paginate(10);
        $listname=PasswordType::whereId($post_type)->get();
        $returnSlug = $listname->first()->slug;
        return redirect()->route('store.listele',$returnSlug)->withCompact('passwordUserStore','listname')->withSuccess($post_title.' başarı ile eklendi.');

        $regex_pass='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[=@!%*\-+?&.\/_])[A-Za-z\d=@!%*\-+?&.\/_]{8,}$/';
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
        $passwordEdit->slug=null;
        $passwordEdit->title=$request->title;
        $passwordEdit->username=$request->username;
        $passwordEdit->password=$request->password;
        $passwordEdit->password_type_id=$request->password_type_id;
        $passwordEdit->url=$request->url;
        $passwordEdit->description=$request->description;
        $passwordEdit->save();

        $listname=PasswordType::whereId($post_type)->get();
        $returnSlug = $listname->first()->slug;
        if (session('tasks_url')) {
            return redirect(session('tasks_url'))->withSuccess($post_title.' başarı ile kaydedildi.');
        }
        // return redirect()->route('store.listele' , $returnSlug)->withSuccess($post_title.' başarı ile kaydedildi.');
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
    public function clone($id)
    {
        $clone=Store::find($id) ?? abort(404 , 'Şifre Bulunamadı.');
        $new_clone=$clone->replicate();
        $new_clone->save();

        return redirect()->route('password.edit',$new_clone);
    }
}
