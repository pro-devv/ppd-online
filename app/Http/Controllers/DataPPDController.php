<?php

namespace App\Http\Controllers;

use App\Models\DataPpd;
use Exception;
use Illuminate\Http\Request;
use File;

class DataPPDController extends Controller
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
        return view('pages.data-ppd.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->param['data'] = DataPpd::select('data_ppd.id','data_ppd.category','data_ppd.uid','data_ppd.subject','data_ppd.desc','data_ppd.file','data_ppd.status','users.id as id_user','users.name','users.email','users.no_hp','users.alamat')
                                        ->join('users','data_ppd.uid','users.id')
                                        ->where('data_ppd.id',$id)
                                        ->first();
        return view('pages.data-ppd.update',$this->param);
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
        // return $request;
        $request->validate([
            'file_upload' => 'required'
        ],[
            'required' => 'Data harus terisi'
        ]);
        try {
            $updateData = DataPpd::find($id);
            $updateData->category = $request->category;
            $updateData->uid = $request->id_user;
            $updateData->subject = $request->subject;
            $updateData->desc = $request->desc;
            $file_upload = $request->file('file_upload');
            if (isset($file_upload)) {
                $file_path = public_path().'/pdf/'.$updateData->file;
                // return $file_path;
                unlink($file_path);
                $filename = $request->name.'.'.date('His').'.'.$request->file('file_upload')->extension();
                // return $filename;
                if ($file_upload->move('pdf/',$filename)) {
                    // return 'berhasil';
                    $updateData->file = $filename;
                    $updateData->status = 'diterima';
                }
            }
            $updateData->save();
            return redirect()->route('data-ppd.index')->withStatus('Data berhasil di update');

        } catch (Exception $e ) {
            return redirect()->back()->withErrors('Terdapat kesalahan', $e);
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors('Terdapat kesalahan', $e);
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
        try {
            $deleteData = DataPpd::find($id);
            $file_path = public_path().'/pdf/'.$deleteData->file;
            if (File::delete($file_path)) {
                $deleteData->delete();
            }
            return redirect()->route('data-ppd.index')->withStatus('Data berhasil dihapus');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);

        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
        }
    }
}
