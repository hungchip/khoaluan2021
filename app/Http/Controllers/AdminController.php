<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Role;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

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

            $admins = $query->orderBy('admin_name')->paginate(8);

            return view('admin.administrator.list-admin', compact('admins'));
        } else {
            $admins = Admin::orderBy('admin_name')->paginate(8);
            return view('admin.administrator.list-admin')->with(['admins' => $admins]);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // return view dashboard
    public function index()
    {
        $bookings = Booking::all();
        $count = 0;
        // $start = strtotime(date("1-m-Y"));
        // $end = strtotime(date("t-m-Y"));
        $thisMoth = date("m"); // get this month
        $thisYear = date("Y"); //get this year
        // dd(date_format($bookings[10]->created_at, "Y"));
        $bookingThisMonths = [];
        foreach ($bookings as $booking) {
            if (date_format($booking->created_at, "Y") == $thisYear) {
                $bookingThisMonths[] = $booking;
                $count++;
            }
        }

        $admins = Admin::all();
        $roomTypes = RoomType::all();
        $pendingRequests = Booking::where('status', 0)->get();
        $monthData = [];

        for ($i = 0; $i < 12; $i++) {
            $monthData[] = $i;
            $monthData[$i] = 0;
            foreach ($bookings as $booking) {
                if (date_format($booking->created_at, "m") == $i + 1 && date_format($booking->created_at, "Y") == $thisYear) {
                    $monthData[$i]++;
                }
            }
        }

        $status = [];
        for ($i = 0; $i < 4; $i++) {
            $status[] = $i;
            $status[$i] = 0;
        }
        // $bookingThisMonths = Booking::where(date_format($booking->created_at,"m"),'=', $thisMoth)->get();
        foreach ($bookingThisMonths as $booking) {
            if ($booking->status == 0) {
                $status[0]++;
            } elseif ($booking->status == 1) {
                $status[1]++;
            } else {
                $status[2]++;
            }
        }
        $contacts = Contact::where('status', 0)->get();
        return view('admin.index', compact('count', 'contacts', 'admins', 'roomTypes', 'pendingRequests', 'monthData', 'status'));
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
            'adminEmail.required' => 'Email kh??ng ???????c b??? tr???ng!',
            'adminEmail.unique' => 'Email n??y ???? c?? ng?????i s??? d???ng!',
            'adminEmail.email' => 'Email kh??ng ????ng ?????nh d???ng!',
            'password.required' => 'M???t kh???u kh??ng ???????c b??? tr???ng!',
            'password.min:8' => 'M???t kh???u t???i thi???u ph???i 8 k?? t???!',
            'adminName.required' => 'T??n kh??ng ???????c b??? tr???ng!',
        ];
        $request->validate($rules, $message);

        // create new admin
        $admin = new Admin();
        $admin->admin_email = $request->adminEmail;
        $admin->password = bcrypt($request->password);
        $admin->admin_name = $request->adminName;
        $admin->save();
        $admin->roles()->attach(Role::where('role_name', 'basic')->first());
        // save and return with message

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Th??m m???i th??nh c??ng!!!']);
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
            'adminName.required' => 'T??n kh??ng ???????c ????? tr???ng !!!',
        ]);

        $admin = Admin::find($id);
        $admin->admin_name = $request->adminName;
        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }
        $admin->save();

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Ch???nh s???a th??nh c??ng !!!']);
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
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Kh??ng ???????c x??a ch??nh m??nh !!!']);
        } else {
            $admin->delete();
            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'X??a th??nh c??ng !!!']);
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
            'oldPassword.required' => 'Nh???p m???t kh???u c??.',
            'newPassword.required' => 'Nh???p m???t kh???u m???i.',
            'newPassword.min' => 'M???t kh???u m???i ph???i ch???a ??t nh???t 8 k?? t???.',
            'newPassword.max' => 'M???t kh???u m???i ph???i ch???a t???i ???? 50 k?? t???.',
            'confirmPassword.same' => 'M???t kh???u x??c minh kh??ng kh???p.',
        ];

        $request->validate($rules, $mes);

        $admin = Auth::guard('admin')->user();
        $check = Hash::check($request->oldPassword, $admin->password);

        if ($check) {
            $admin->password = bcrypt($request->newPassword);
            $admin->save();
            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => '?????i m???t kh???u th??nh c??ng !!!']);
        } else {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'M???t kh???u c?? kh??ng ????ng !!!']);
        }
    }
//g??n Quy???n
    public function assignRole(Request $request)
    {
        $admin = Admin::where('admin_id', $request->admin_id)->first();
        if (Auth::guard('admin')->user()->admin_id == $admin->admin_id) {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Kh??ng th??? c???p quy???n ch??nh m??nh']);
        } else {
            $admin->roles()->detach();
            if ($request->adminRole) {
                $admin->roles()->attach(Role::where('role_name', 'admin')->first());
            }
            if ($request->authorRole) {
                $admin->roles()->attach(Role::where('role_name', 'author')->first());
            }
            if ($request->receptionistRole) {
                $admin->roles()->attach(Role::where('role_name', 'receptionist')->first());
            }
            if ($request->basicRole) {
                $admin->roles()->attach(Role::where('role_name', 'basic')->first());
            }

            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'C???p quy???n th??nh c??ng !!!']);
        }
    }

    public function showChart()
    {
        return view('admin.charts');
    }
    // filter by option
    public function bookingFilter(Request $request)
    {
        $from = date('Y-m-d', strtotime($request->from));
        $to = date('Y-m-d', strtotime($request->to));
        $period = strtotime($request->to) - strtotime($request->from);
        $day = round($period / (60 * 60 * 24)); // ?????m kho???ng c??ch ng??y
        $bookings = Booking::whereBetween('created_at', [$from, $to])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as amount'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        $arrData = [];
        for ($i = 0; $i <= $day; $i++) {
            // echo date('d/m/Y', strtotime($request->from) + (60 * 60 * 24 * $i + 1));
        }
        for ($i = 0; $i <= $day; $i++) {
            if ($this->statisticCheckFilter($request, $bookings, $i)) {
                $booking = $this->statisticCheckFilter($request, $bookings, $i);
                $arrData[$i] = [
                    'day' => date('d/m/Y', strtotime($booking->date)),
                    'value' => $booking->amount,
                ];
            } else {
                $arrData[$i] = [
                    'day' => date('d/m/Y', strtotime($request->from) + (60 * 60 * 24 * $i + 1)),
                    'value' => 0,
                ];
            }

        }

        echo $data = json_encode($arrData);
    }

    public function statisticCheckFilter(Request $request, $bookings, $i)
    {
        foreach ($bookings as $booking) {
            if (date('d/m/Y', strtotime($request->from) + (60 * 60 * 24 * $i + 1)) == date('d/m/Y', strtotime($booking->date))) {
                return $booking;
            }
        }
        return null;
    }

    public function bookingStatistic()
    {
        return view('admin.statistic.booking');
    }

    // get booking for this month

    public function thisMonth()
    {
        $bookings = Booking::whereMonth('created_at', '=', date('m'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as amount'),
            ]);
        $arrData = [];
        for ($i = 0; $i < date('t'); $i++) {
            if ($this->statisticCheckDefault($i + 1 . '/m/Y', $bookings)) {
                $booking = $this->statisticCheckDefault($i + 1 . '/m/Y', $bookings);
                $arrData[$i] = [
                    'day' => date($i + 1 . '/m/Y'),
                    'value' => $booking->amount,
                ];
            } else {
                $arrData[$i] = [
                    'day' => date($i + 1 . '/m/Y'),
                    'value' => 0,
                ];
            }
        }

        echo $hihi = json_encode($arrData);
    }

    public function statisticCheckDefault($date, $bookings)
    {
        foreach ($bookings as $booking) {
            if (strtotime(date('d/m/Y', strtotime($booking->date))) == strtotime(date($date))) {
                return $booking;
            }
        }
        return null;
    }

}
