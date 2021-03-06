<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ForgotPass;
use App\Models\Keyword;
use App\Models\Review;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\UserCandidate;
use App\Models\UserRecruitment;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $date = new DateTime();
        // $week = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        // $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        // $month = Carbon::now()->addMonth()->toDayDateTimeString();
        // dd($banner);

        $startMonth = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $endMonth = Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString();
        $stratWeek = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek()->toDateString();
        $endWeek = Carbon::now('Asia/Ho_Chi_Minh')->endOfWeek()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $ngay = \Carbon\Carbon::today()->subDays(1);

        $useradmin = UserAdmin::whereDate('created_at', Carbon::today())->count();
        $useradmintuan = UserAdmin::whereBetween('created_at', [$stratWeek, $endWeek])->count();
        $useradminthang = UserAdmin::whereBetween('created_at', [$startMonth, $endMonth])->count();

        $usercan = UserCandidate::whereDate('created_at', Carbon::today())->count();
        $usercantuan = UserCandidate::whereBetween('created_at', [$stratWeek, $endWeek])->count();
        $usercanthang = UserCandidate::whereBetween('created_at', [$startMonth, $endMonth])->count();

        $userre = UserRecruitment::whereDate('created_at', Carbon::today())->count();
        $userretuan = UserRecruitment::whereBetween('created_at', [$stratWeek, $endWeek])->count();
        $userrethang = UserRecruitment::whereBetween('created_at', [$startMonth, $endMonth])->count();

        //tin tuy???n d???ng
        $blog = Blog::whereDate('created_at', Carbon::today())->count();
        $blogtuan = Blog::whereBetween('created_at', [$stratWeek, $endWeek])->count();
        $blogthang = Blog::whereBetween('created_at', [$startMonth, $endMonth])->count();

        $blog_active = Blog::orWhere('enable', '1')->whereDate('created_at', Carbon::today())->count();
        $blog_active_tuan = Blog::orWhere('enable', '1')->whereBetween('created_at', [$stratWeek, $endWeek])->count();
        $blog_active_thang = Blog::orWhere('enable', '1')->whereBetween('created_at', [$startMonth, $endMonth])->count();

        $blog_unactive = Blog::orWhere('enable', '0')->whereDate('created_at', Carbon::today())->count();
        $blog_unactive_tuan = Blog::orWhere('enable', '0')->whereBetween('created_at', [$stratWeek, $endWeek])->count();
        $blog_unactive_thang = Blog::orWhere('enable', '0')->whereBetween('created_at', [$startMonth, $endMonth])->count();

        // $blog_active = Blog::where('enable', '1')->orderBy('id', 'DESC')->count();
        // $blog_unactive = Blog::where('enable', '0')->orderBy('id', 'DESC')->count();

        $search = $request['keyword'] ?? "";
        if ($search != "") {
        } else {
            return view('admin.dashboard.index', compact('search', 'blog_active', 'blog_unactive', 'now', 'useradmin', 'useradmintuan', 'useradminthang', 'usercan', 'usercantuan', 'usercanthang', 'userre', 'userretuan', 'userrethang', 'blog', 'blogtuan', 'blogthang', 'blog_active', 'blog_active_tuan', 'blog_active_thang', 'blog_unactive', 'blog_unactive_tuan', 'blog_unactive_thang'));
        }
        return view('admin.dashboard.index', compact('search', 'blog_active', 'blog_unactive', 'now', 'useradmin', 'useradmintuan', 'useradminthang', 'usercan', 'usercantuan', 'usercanthang', 'userre', 'userretuan', 'userrethang', 'blog', 'blogtuan', 'blogthang', 'blog_active', 'blog_active_tuan', 'blog_active_thang', 'blog_unactive', 'blog_unactive_tuan', 'blog_unactive_thang'));
    }
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Vui l??ng ????? tr???ng email',
                'password.required' => 'Vui l??ng ????? tr???ng password'
            ]
        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            User::where('email', $request->email)->update(['active' => 1]);
            return redirect(route('dashboard'));
        } else {
            return redirect()->back()->with('msg_loginAdmin', 'T??i kho???n m???t kh???u kh??ng ch??nh x??c');
        }
    }
    public function logout()
    {
        $email = Auth::user()->email;
        User::where('email', $email)->update(['active' => 0]);
        Auth::logout();
        return redirect(route('admin_login'));
    }
    public function forgotPassword()
    {
        return view('admin.forgot-password');
    }
    public function PostForgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('msg_err', '?????i ch??? email kh??ng t???n t???i tr??n h??? th???ng!');
        }

        $user_forgot = ForgotPass::find($user->id);
        $time_code = time() - strtotime($user_forgot->updated_at);


        if ($request->code == $user_forgot->code) {
            if ($time_code > 300) {
                return redirect()->back()->with('msg_err', 'M?? x??c nh???n h???t h???n, nh???p l???i email ????? l???y m??')->with('email', $request->email);
            }
            if ($request->password != $request->confirm_password) {
                return redirect()->back()->with('msg_err', 'M???t kh???u nh???p l???i kh??ng kh???p')->with('email', $request->email)->with('code', $request->code);
            }
            $user->password = Hash::make($request->password);
            $user->save();
            $code = rand(100000, 999999);
            $user_forgot->code = $code;
            $user_forgot->save();
            return redirect(route('admin_login'))->with('msg', '?????i m???t kh???u th??nh c??ng');
        }
        if ($request->code && $request->code != $user->code) {
            return redirect()->back()->with('msg_err', 'M?? x??c nh???n kh??ng ch??nh x??c!')->with('email', $request->email);
        }


        $code = rand(100000, 999999);
        $user_forgot->code = $code;
        $user_forgot->save();
        $data = [
            'email' => $request->email,
            'code' => $code
        ];
        Mail::send('mail.mail-forgot-pass', $data, function ($message) use ($data) {
            $message->from('khuongtv27@gmail.com', 'T??m vi???c JobS');
            $message->to($data['email'], 'Member');
            $message->subject('?????i m???t kh???u t??i kho???n JobS');
        });
        return redirect()->back()->with('msg', '???? g???i m?? x??c nh???n t???i ?????a ch??? email c???a b???n!')->with('email', $request->email);
    }
    public function changePassword()
    {
        return view('admin.change-password');
    }
    public function PostChangePassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required',
                'passNew' => 'required|min:6|confirmed',
                'confirm_password' => 'required',
            ],
            [
                'password.required' => 'Kh??ng ????? tr???ng m???t kh???u c??',
                'passNew.required' => 'Kh??ng ????? tr???ng m???t kh???u m???i',
                'passNew.min' => 'M???t kh???u t???i thi???u 6 k?? t???',
                'passNew.confirmed' => 'M???t kh???u kh??ng kh???p',
                'confirm_password.required' => 'Vui l??ng x??c nh???n m???t kh???u'
            ]

        );
        $email = Auth::user()->email;
        $user = User::where('email', $email)->first();
        if (!empty($user)) {

            if (!password_verify($request->password, $user->password)) {
                return redirect()->back()->with('msg_err', 'M???t kh???u c?? kh??ng ch??nh x??c');
            } elseif ($request->passNew != $request->confirm_password) {
                return redirect()->back()->with('msg_passNewfals', 'M???t kh???u kh??ng kh???p');
            }
            $passNew  = Hash::make($request->passNew);
            $user->update(['password' => $passNew]);
            return redirect()->back()->with('msg', '?????i m???t kh???u th??nh c??ng');
        } else {
            return redirect()->back()->with('msg_err', 'Email kh??ng ch??nh x??c');
        }
    }
}
