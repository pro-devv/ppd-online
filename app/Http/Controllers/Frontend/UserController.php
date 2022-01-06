<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth-user.login-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::role('user')->where('email', $request->get('email'))->first();
        // return $user;

        if ($user == null) {
            return redirect()->route('index.user')->withError('akun tidak ditemukan');
        }else{
            if (!$user || !(\Hash::check($request->get('password'), $user->password))) {
                return redirect()->route('index.user')->withError('Password anda salah');
            }else{
                $token = $user->createToken('token')->plainTextToken;
                Session::put('token',$token);
                Session::put('id_user', $user->id);
                Session::put('nama', $user->name);
                Session::put('email', $user->email);
                return redirect()->route('index.user')->withStatus('Selamat anda berhasil login ');
            }
        }
        if (Auth::Attempt($data)) {
            return 'berhasil login ';
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
        $request->authenticate();
        if (auth()->user()->hasRole('user')) {
            $request->session()->regenerate();
            return redirect()->route('index.user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->param['data'] = User::find($id);
        return view('auth-user.edit-user',$this->param);
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
        // $this->validate($request,
        // [
        //     'nama' => ['required', 'string'],
        //     'email' => ['required', 'string', 'email'],
        //     'nohp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'alamat' => 'required',
        //     'password' => ['required'],
        // ],
        // [
        //     'required' => ':attribute harus diisi',
        //     'min' => ':attribute minimal 10 karakter'
        // ]);

        try {
            $updateData = User::find($id);
            $updateData->name = $request->nama;
            $updateData->email = $request->email;
            $updateData->no_hp = $request->nohp;
            $updateData->alamat = $request->alamat;
            $updateData->save();
            return redirect()->route('index.user')->withStatus('Berhasil Mengganti data');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e]);

        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $request = User::role('user')->find($id);
        if ($request != null) {
        // Auth::guard('web')->logout();
            // $request->session()->invalidate();
            Session::flush();
            return redirect('/');
            # code...
        }else{
            return 'bukan user';
        }

        // return redirect('/');


        // $request->session()->regenerateToken();

    }
}
