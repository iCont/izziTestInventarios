<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UsersAdminController extends Controller
{
    public function  index(){
        $user_auth = User::where('id', Auth::id())->get();
        // dd($user_auth[0]['profile_id']);
        $users = User::orderBy('id','asc')->get();
        $profiles = Profile::all();
        // $profiles = Profile::find($user->profile_id)->get();
        return view('users.index',compact('users','profiles','user_auth'));
    }

    public function  store(){}

    public function update(Request $request, User $user){
        // dd($request);
        $user->update($request->all());
        DB::table('users')
        ->where('id', $user->id)
        ->update(['name' => $request->name, 'first_surname' => $request->apellido_paterno ,'second_surname' => $request->apellido_materno, 'email' => $request->email,'profile_id' => $request->perfil]);
        return back()->with('updated_status','ok');
    }

    public function estado(Request $request, User $user){
    //  dd($request->access_active);
    if($request->access_active==0)
       $access = 1;
       else
       $access = 0;
     DB::table('users')
     ->where('id', $user->id)
     ->update(['access' => $access ]);
    //  return back()->with('status','El estado de acceso del usuario se modificó con éxito');
    return back()->with('updated_status', 'ok');
    }

    public function  destroy(User $user){
        $user->delete();
        return back()->with('deleted_user', 'ok');
    }
}
