<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth-user.register-user');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,
        [
            'nama' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'nohp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat' => 'required',
            'password' => ['required'],
        ],
        [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal 10 karakter'
        ]);


        // return $request;
        try {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->nohp,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password),
            ]);
            //code...
            $user->assignRole('user');

            event(new Registered($user));

            Auth::login($user);

            return redirect()->route('index.user');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);

        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
        }


    }
}
