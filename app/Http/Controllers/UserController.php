<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    // register controller
    public function register(UserRegisterRequest $request): RedirectResponse {
        // get validated data
        $validated = $request->safe()->except(['repeatPassword']);

        // encrypt password
        $validated['password'] = Hash::make($validated['password']);

        // insert data to DB
        DB::table('user')->insert([
            'name' => $validated['namaLengkap'],
            'username' => $validated['username'],
            'password' => $validated['password'],
            'id_level' => $validated['userLevel'],
            'id_departemen' => $validated['departemen']
        ]);

        // redirect to user-list view
        return redirect()->route('user-management')->with('status', "User berhasil dibuat");
    }

    /**
     * Login Controller
     */
    public function login(Request $request): RedirectResponse {
        // validate the login data
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // attempt login
        $credentials = $request->only(['username', 'password']);
        if(Auth::attempt($credentials)) {
            // regenerate session if login success
            $request->session()->regenerate();

            // Get user's level and departement name
            $levelName = DB::table('level')->select('nama_level')->where('id', '=', Auth::user()->id_level)->first();
            $deptName = DB::table('departemen')->select('departemen_name')->where('id', '=', Auth::user()->id_departemen)->first();

            // Add values to user session
            session(['username' => $credentials['username']]);
            session(['user_level' => $levelName->nama_level]);
            session(['user_dept' => $deptName->departemen_name]);

            // check user's role in session values and redirect accordingly
            $userRole = session('user_level');

            if($userRole === "Admin") {
                return redirect()->route('user-management');
            } else if($userRole === "Direktur") {
                return redirect()->route('direktur-landing');
            } else if($userRole === "Manager Divisi") {
                return redirect()->route('manager-divisi-landing');
            } else if($userRole === "Manager Procurement") {
                return redirect()->route('manager-procurement-landing');
            }
        }

        // if login fails
        return back()->withErrors(['credential' => "Username atau password salah"])
                     ->onlyInput('username');
    }

    // get users controller
    public function getUsers(Request $request): View {
        // get data from 'user' table
        $users = DB::table('user')
                ->join('level', 'user.id_level', '=', 'level.id')
                ->join('departemen', 'user.id_departemen', '=', 'departemen.id')
                ->select(['user.id',
                          'user.name',
                          'user.username',
                          'level.nama_level',
                          'departemen.departemen_name'])
                ->get();

        return view('admin.user-management', ['users' => $users]);
    }

    /**
     * Logout Controller
     */
    public function logout(Request $request): RedirectResponse {
        // logout process
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login-page');
    }
}
