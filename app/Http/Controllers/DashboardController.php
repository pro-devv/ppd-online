<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Banner;
use App\Models\DataPpd;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $param;
    public function index()
    {
        $this->param['banner'] = Banner::all()->count();
        $this->param['artikel'] = Artikel::all()->count();
        $this->param['dataPpd'] = DataPpd::all()->count();
        $this->param['user'] = User::all()->count();
        // return $this->param;
        return view('dashboard',$this->param);
    }
}
