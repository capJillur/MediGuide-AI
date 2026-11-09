<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Mail,Log};

class AuthController extends Controller
{


    public function showAdminLogin() { return view('auth.admin-login'); }

    public function adminLogin(Request $r)
    {
        $c = $r->validate(['email'=>'required|email','password'=>'required']);
        if (!Auth::attempt($c + ['role'=>'admin']))
            return back()->withErrors(['email'=>'Invalid administrator credentials.'])->onlyInput('email');
        $r->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function showRegister($role) { return view('auth.register', compact('role')); }

    public function register(Request $r, $role)
    {
        $rules = ['name'=>'required|string|max:120','email'=>'required|email|unique:users','phone'=>'required|string|max:20','password'=>'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'];
        if ($role === 'doctor') $rules += ['specialty'=>'required|string|max:100','license_no'=>'required|string|max:60'];
        $data = $r->validate($rules);
        $user = User::create($data + ['role'=>$role]);
        $this->sendOtp($user);
        session(['otp_email'=>$user->email]);
        return redirect()->route('otp');
    }

    private function sendOtp(User $u): void
    {
        $code = (string) random_int(100000, 999999);
        $u->update(['otp_code'=>bcrypt($code),'otp_expires_at'=>now()->addMinutes(10)]);
        Log::info("MediGuide OTP for {$u->email}: $code");           // dev: see storage/logs/laravel.log
        try { Mail::raw("Your MediGuide AI verification code is $code (valid 10 minutes).", fn ($m) => $m->to($u->email)->subject('MediGuide AI OTP')); } catch (\Throwable $e) {}
        if (config('app.debug')) session()->flash('dev_otp', $code);   // demo convenience only
    }

    public function showOtp() { abort_unless(session('otp_email'), 404); return view('auth.otp'); }

    public function verifyOtp(Request $r)
    {
        $r->validate(['otp'=>'required|digits:6']);
        $u = User::where('email', session('otp_email'))->firstOrFail();
        if (!$u->otp_code || $u->otp_expires_at->isPast() || !password_verify($r->otp, $u->otp_code))
            return back()->withErrors(['otp'=>'Invalid or expired code.']);
        $u->update(['email_verified_at'=>now(),'otp_code'=>null,'otp_expires_at'=>null]);
        session()->forget('otp_email');
        return redirect()->route('login', $u->role === 'doctor' ? 'doctor' : 'patient')->with('ok','Account verified. Please sign in.');
    }

    public function resendOtp()
    {
        $u = User::where('email', session('otp_email'))->firstOrFail();
        $this->sendOtp($u);
        return back()->with('ok','A new code has been sent.');
    }

    public function showLogin($portal = 'patient') { return view('auth.login', compact('portal')); }

    public function login(Request $r)
{
    $c = $r->validate(['email'=>'required|email','password'=>'required','portal'=>'required|in:patient,doctor']);
    $role = $c['portal'] === 'doctor' ? 'doctor' : 'user';
    $creds = ['email'=>$c['email'],'password'=>$c['password']];

    $u = User::where('email',$c['email'])->where('role',$role)->first();
    if ($u && password_verify($c['password'], $u->password) && !$u->email_verified_at) {
        $this->sendOtp($u); session(['otp_email'=>$u->email]);
        return redirect()->route('otp')->withErrors(['otp'=>'Please verify your account first.']);
    }
    if ($u && $role === 'doctor' && password_verify($c['password'], $u->password) && !$u->doctor_approved_at) {
        return back()->withInput($r->only('email'))
            ->with('approval_pending', 'Your account is not approved yet. Please wait, thank you.');
    }
    if (!Auth::attempt($creds + ['role'=>$role]))
        return back()->withErrors(['email'=>"Invalid {$c['portal']} credentials."])->onlyInput('email');

    $r->session()->regenerate();
    return redirect()->route('dashboard');
}




    public function logout(Request $r)
    {
        Auth::logout(); $r->session()->invalidate(); $r->session()->regenerateToken();
        return redirect()->route('home');
    }


}
