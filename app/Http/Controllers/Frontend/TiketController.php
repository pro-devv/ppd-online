<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DataPpd;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function index()
    {
        $this->param['data'] = DataPpd::select('data_ppd.id','data_ppd.category','data_ppd.uid','data_ppd.subject','data_ppd.desc','data_ppd.file','data_ppd.status','users.name','users.email','users.no_hp','users.alamat')
                                        ->join('users','data_ppd.uid','users.id')
                                        ->get();
        return view('tiket.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            // return 'belum login';
            return view('tiket.create');
        }else{
            return view('tiket.create');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'category' => 'required',
            'subject' => 'required',
            'desc' => 'required',
            'file_upload' => 'required|max:10000'
        ]);
        try {
            $addData = new DataPpd;
            $addData->category = $request->category;
            $addData->uid = Auth::user()->id;
            $addData->subject = $request->subject;
            $addData->desc = $request->desc;
            $file_upload = $request->file('file_upload');
            if (isset($file_upload)) {
                $filename = Auth::user()->name.'.'.date('His').'.'.$request->file('file_upload')->extension();
                // return $filename;
                if ($file_upload->move('pdf/',$filename)) {
                    // return 'berhasil';
                    $addData->file = $filename;
                    $addData->status = 'diproses';
                }
            }
            $addData->save();
            return redirect()->route('kirim-tiket.index')->withStatus('Berhasil Menambahkan data');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);

        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
