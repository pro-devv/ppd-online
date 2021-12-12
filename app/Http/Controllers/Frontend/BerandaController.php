<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Banner;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    private $param;
    public function index()
    {
        $this->param['banner'] = Banner::all();
        $this->param['count_banner'] = Banner::all()->count();
        $this->param['artikel'] = Artikel::all();
        return view('welcome',$this->param);
    }
    public function artikel()
    {
        $this->param['data'] = Artikel::all();
        return view('artikel',$this->param);
    }
    public function detail($slug)
    {
        $this->param['data'] = Artikel::select('artikel.*')
                                        ->where('artikel.slug', $slug)
                                        ->get();
        $this->param['lainnya'] = Artikel::all();

        return view('detail-artikel',$this->param);
    }
}
