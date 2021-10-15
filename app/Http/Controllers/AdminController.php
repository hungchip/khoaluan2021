<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function showListAdmin(Request $request)
    {
        if ($request) {
            $conditions = [];
            $adminName = $request->adminName;
            $adminID = $request->admin_id;
            $adminEmail = $request->adminEmail;

            $query = Admin::query();

            if ($request->adminID) {
                $query->where('admin_id', 'LIKE', '%' . $request->adminID . '%');
            }

            if ($request->adminName) {
                $query->where('admin_name', 'LIKE', '%' . $request->adminName . '%');
            }

            if ($request->adminEmail) {
                $query->where('admin_email', 'LIKE', '%' . $request->adminEmail . '%');
            }

            $admins = $query->paginate(8);

            return view('admin.administrator.list-admin', compact('admins'));
        } else {
            $admins = Admin::paginate(8);
            return view('admin.administrator.list-admin')->with(['admins' => $admins]);
        }
        
    }

    public function findAdmin1(Request $request)
    {
        $conditions = [];
        $adminName = $request->adminName;
        $adminID = $request->admin_id;
        $adminEmail = $request->adminEmail;

        $query = Admin::query();

        if ($request->adminID) {
            $query->where('admin_id', 'LIKE', '%' . $request->adminID . '%');
        }

        if ($request->adminName) {
            $query->where('admin_name', 'LIKE', '%' . $request->adminName . '%');
        }

        if ($request->adminEmail) {
            $query->where('admin_email', 'LIKE', '%' . $request->adminEmail . '%');
        }

        $admins = $query->get();

        return view('admin.administrator.list-admin', compact('admins'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // return view dashboard
    public function index()
    {
        // $adminName = Auth::guard('admin')->user()->admin_name;
        // dd($adminName);
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $rules = [
            'adminEmail' => 'bail|required|email|unique:hc_admins,admin_email',
            'password' => 'bail|required|min:8|',
            'adminName' => 'bail|required',
        ];
        $message = [
            'adminEmail.required' => 'Email không được bỏ trống!',
            'adminEmail.unique' => 'Email này đã có người sử dụng!',
            'adminEmail.email' => 'Email không đúng định dạng!',
            'password.required' => 'Mật khẩu không được bỏ trống!',
            'password.min:8' => 'Mật khẩu tối thiểu phải 8 kí tự!',
            'adminName.required' => 'Tên không được bỏ trống!',
        ];
        $request->validate($rules, $message);

        // create new admin
        $admin = new Admin();
        $admin->admin_email = $request->adminEmail;
        $admin->password = bcrypt($request->password);
        $admin->admin_name = $request->adminName;

        // save and return with message
        $admin->save();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm mới thành công!!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);

        return view('admin.administrator.profile')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admin.administrator.edit')->with('admin', $admin);
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
        $request->validate([
            'adminName' => 'required',
        ], [
            'adminName.required' => 'Tên không được để trống !!!',
        ]);

        $admin = Admin::find($id);
        $admin->admin_name = $request->adminName;
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Chỉnh sửa thành công !!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);

        if (Auth::guard('admin')->user()->admin_id == $id) {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Không được xóa chính mình !!!']);
        } else {
            $admin->delete();
            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Xóa thành công !!!']);
        }

    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $arr = $request->only('admin_email', 'password');

        if (Auth::guard('admin')->attempt($arr, $request->has('remember'))) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('getLogin');
        }
    }

    public function postLogout()
    {
        Auth::guard('admin')->logout();
        return view('auth.login');
    }

    public function getChangePassword()
    {
        // $admin = Admin::find($id);

        return view('admin.administrator.change-password');
    }

    public function postChangePassword(Request $request)
    {
        $rules = [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8|max:50',
            'confirmPassword' => 'same:newPassword',
        ];
        $mes = [
            'oldPassword.required' => 'Nhập mật khẩu cũ.',
            'newPassword.required' => 'Nhập mật khẩu mới.',
            'newPassword.min' => 'Mật khẩu mới phải chứa ít nhất 8 kí tự.',
            'newPassword.max' => 'Mật khẩu mới phải chứa tối đâ 50 kí tự.',
            'confirmPassword.same' => 'Mật khẩu xác minh không khớp.',
        ];

        $request->validate($rules, $mes);

        $admin = Auth::guard('admin')->user();
        $check = Hash::check($request->oldPassword, $admin->password);

        if ($check) {
            $admin->password = bcrypt($request->newPassword);
            $admin->save();
            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Đổi mật khẩu thành công !!!']);
        } else {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Mật khẩu cũ không đúng !!!']);
        }
    }
}
