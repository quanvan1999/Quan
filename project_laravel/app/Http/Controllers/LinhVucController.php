<?php

namespace App\Http\Controllers;
use App\LinhVuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LinhVucRequest;

class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLinhVuc= LinhVuc::all();
        return view('ds-linh-vuc', compact('listLinhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('them-moi-linh-vuc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinhVucRequest $request)
    {

        $linhVuc=new LinhVuc;
        $linhVuc->ten_linh_vuc=$request->ten_linh_vuc;
        $linhVuc->save();
        $request->session()->flash('success', 'Thêm thành công!');
       return redirect()->route('linh-vuc.them-moi');
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
        $linhVuc=LinhVuc::find($id);
        return view('them-moi-linh-vuc' , compact('linhVuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinhVucRequest $request, $id)
    {
        $linhVuc=LinhVuc::find($id);
        $linhVuc->ten_linh_vuc=$request->ten_linh_vuc;
        $linhVuc->save();
        return redirect()->route('linh-vuc.danh-sach');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linhVuc=LinhVuc::find($id);
        $linhVuc->delete();
        return redirect()->route('linh-vuc.danh-sach');

    }
    public function trash()
    {
        $linhVucRac= LinhVuc::onlyTrashed()->get();
        return view('linh-vuc-thung-rac', compact('linhVucRac'));
    }
    public function restore($id)
    {
        $linhVuc=LinhVuc::withTrashed()->find($id);
        $linhVuc->restore();
        return redirect()->route('linh-vuc.thung-rac');
    }
    public function destroySQL($id)
    {
        $linhVuc=LinhVuc::withTrashed()->find($id);
        $linhVuc->forceDelete();
        return redirect()->route('linh-vuc.thung-rac');

    }
}
