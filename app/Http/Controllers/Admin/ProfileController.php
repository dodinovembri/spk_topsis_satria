<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $data['profile'] = UserModel::find($user_id);

        return view('admin.profile.index', $data);
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
        //
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
        $update = UserModel::find($id);
        if (!empty($request->file('file'))) {
            $file                       = $request->file('file');
            $fileName3                  = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('file')->move("users/", $fileName3);
            $update->image = $fileName3;
        }


        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->updated_at = date("Y-m-d H:i:s");
        $update->update();

        return redirect(url('/'))->with('message', 'Success update profile!');
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

    public function change_password()
    {
        return view('admin.profile.change_password');
    }

    public function update_password(Request $request, $id)
    {
        if ($request->input('password') != $request->input('password_confirm')) {
            return redirect(url('admin/profile/change_password'))->with('error', 'Your password doesnt match!');
        } else {
            $update = UserModel::find($id);
            $update->password = Hash::make($request->password);
            $update->updated_at = date("Y-m-d H:i:s");
            $update->update();

            return redirect(url('admin/profile/change_password'))->with('message', 'Success update password!');
        }
    }
}
