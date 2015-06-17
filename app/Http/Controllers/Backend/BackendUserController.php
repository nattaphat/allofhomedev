<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;

class BackendUserController extends Controller {

    public function index()
    {
        $users = User::orderBy('firstname')->orderBy('lastname')->get();
        return view('web.backend.user')->with('users', $users);
    }

    public function getDataTable()
    {
//        $users = User::select('*');
//
//        return Datatables::of($users)
//            ->add_column('operation',
//                '<center><a href="{{ URL::to(\'backend/user_editUser\') }}/{{ $id }}">edit</a></center>')
//            ->edit_column('status','@if($status)
//                                <span class="label label-success">ใช้งาน</span>
//                            @else
//                                <span class="label label-danger">ไม่ใช้งาน</span>
//                            @endif')
//            ->edit_column('role','@if($role == 1)
//                                ผู้ดูแลระบบสูงสุด (superadmin)
//                            @elseif($role == 2)
//                                ผู้ดูแลระบบ (admin)
//                            @elseif($role == 3)
//                                สมาชิกทั่วไป (member)
//                            @elseif($role == 4)
//                                สมาชิก VIP (VIP member)
//                            @endif')
//            ->make(true);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('web.backend.user_edit')->with('user', $user);
    }

    public function editSave()
    {
        $input = Input::all();

        $user = User::find($input['id']);

        if($user->username == "superadmin")
        {
            $user->role = "1";
            $user->status = true;
        }
        else
        {
            $user->role = $input['role'];
            $user->status = $input['status'];
        }

        if($user->save())
        {
            return Redirect::route('backend_user')
                ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
                ->with('flash_type', 'alert-success');
        }
        else{
            return Redirect::route('backend_user')
                ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
                ->with('flash_type', 'alert-danger');
        }
    }

}