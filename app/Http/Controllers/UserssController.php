<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\AddsUserRequest;
use App\Http\Requests\EditsUserRequest;

class UserssController extends Controller
{   // user
    public function getUser(Request $r){

        if ($r->search != '') {
            $data['users'] = User::WHERE('email','like','%'.$r->search.'%')->orderBy('id','desc')->paginate(10);
            return view('user',$data);
        }else{
        $data['users'] = User::orderBy('id','desc')->paginate(10);
        return view('user',$data);
        }
    }

    public function delUserss($id){
        Userss::find($id)->delete();
        return redirect('userss');
    }
    //end user

    // eddit
    public function getEdits_User($id){
        $data['users'] = Userss::find($id);
        return view('edit_user',$data);
    }
    public function postEdits_User(EditsUserRequest $r ,$id){
        $user = Userss::find($id);
        $user->full = $r->full;
        $user->phone = $r->phone;
        $user->address = $r->address;
        $user->id_number = $r->id_number;
        $user->save();
        return redirect('userss');
    }
    //end edit



    //phần add
    public function getAdds_User(){
        return view('add_user');
    }
    public function postAdds_User(AddsUserRequest $r){
        // dd($r->all());
        $user = new Userss;
        $user->full = $r->full;
        $user->phone = $r->phone;
        $user->address = $r->address;
        $user->id_number = $r->id_number;
        $user->save();
        return redirect('userss');
    }
}
