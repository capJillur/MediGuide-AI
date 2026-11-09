<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $r)
    {
        $type = $r->query('type') === 'doctor' ? 'doctor' : 'user';
        $accounts = User::where('role',$type)->latest()->paginate(10)->withQueryString();
        $counts = ['user'=>User::where('role','user')->count(),'doctor'=>User::where('role','doctor')->count()];
        return view('admin.index', compact('accounts','type','counts'));
    }
    public function edit(User $account) { abort_if($account->role==='admin',403); return view('admin.edit', compact('account')); }
    public function update(Request $r, User $account)
    {
        abort_if($account->role==='admin',403);
        $d = $r->validate(['name'=>'required|max:120','email'=>"required|email|unique:users,email,{$account->id}",'phone'=>'nullable|max:20','specialty'=>'nullable|max:100','license_no'=>'nullable|max:60','password'=>'nullable|min:8']);
        if (empty($d['password'])) unset($d['password']);
        $account->update($d);
        return redirect()->route('admin.index',['type'=>$account->role])->with('ok','Account updated.');
    }
    public function approve(User $account)
    {
        abort_unless($account->role === 'doctor', 404);

        if (! $account->doctor_approved_at) {
            $account->forceFill(['doctor_approved_at' => now()])->save();
        }

        return redirect()->route('admin.index', ['type' => 'doctor'])->with('ok', 'Doctor account approved.');
    }
    public function destroy(User $account)
    {
        abort_if($account->role==='admin',403);
        $account->delete();
        return back()->with('ok','Account deleted.');
    }
}
