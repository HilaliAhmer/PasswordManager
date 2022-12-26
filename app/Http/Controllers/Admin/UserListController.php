<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordType;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRole=Role::get();
        $users=User::with('roles')->paginate(5);
        return view('admin.store.userList',compact('users','userRole'));
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
        $userRole=Role::get();
        $userEdit=User::find($id) ?? abort(404 , 'Kullanıcı bulunamadı.');
        return view('admin.store.userEdit', compact('userEdit','userRole'));
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
        $userEdit=User::find($id) ?? abort(404 , 'Kullanıcı bulunamadı.');
        $userEdit->name=$request->name;
        $userEdit->email=$request->email;
        $userEdit->type=$request->type;
        $userEdit->save();
        $userEdit->syncRoles($request->role);
        return redirect()->route('userlist.index')->withSuccess(' Kullanıcı rolü başarı ile güncelendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $passworddestroy=Store::find($id) ?? abort(404 , 'Şifre Bulunamadı.');
        // $passworddestroy->delete();
        // return back()->withSuccess($passworddestroy->title.' silme işlemi başarı ile gerçekleşti.');

        $userDelete=User::find($id) ?? abort(404 , 'Kullanıcı Bulunamadı.');
        $userDelete->delete();
        return back()->withSuccess($userDelete->name.' kullanıcısı başarı ile silindi.');
    }
}
