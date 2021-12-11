<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Exception;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function index()
    {
        $this->param['data'] = Artikel::all();
        return view('pages.artikel.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.artikel.create');
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
            'title' => 'required',
            'desc' => 'required'
        ],[
            'required' => 'Data harus terisi'
        ]);
        try {
            $slug = \Str::slug($request->title);
            $addData = new Artikel;
            $addData->title = $request->title;
            $addData->slug = $slug;
            $addData->desc = $request->desc;
            $addData->save();
            return redirect()->route('artikel.index')->withStatus('Berhasil Menambah data');
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
        $this->param['data'] = Artikel::find($id);
        return view('pages.artikel.edit',$this->param);
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
        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ],[
            'required' => 'Data harus terisi'
        ]);
        try {
            $slug = \Str::slug($request->title);
            $updateData = Artikel::find($id);
            $updateData->title = $request->title;
            $updateData->slug = $slug;
            $updateData->desc = $request->desc;
            $updateData->save();
            return redirect()->route('artikel.index')->withStatus('Berhasil Mengganti data');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
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
            $deleteData = Artikel::find($id);
            $deleteData->delete();
            return redirect()->route('artikel.index')->withStatus('Berhasil Menghapus data');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['Terdapat kesalahan', $e->getMessage]);
        }
    }
}
