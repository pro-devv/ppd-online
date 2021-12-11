<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $param;
    public function index()
    {
        $this->param['data'] = User::role('user')->get();
        return view('pages.user.index',$this->param);
    }
    public function destroy($id)
    {
        try{
            $deleteData = User::find($id);
            $deleteData->delete();
            return redirect()->route('user.index')->withStatus('Data berhasil dihapus');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
        }
    }
}
