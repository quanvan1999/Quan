<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CauHoiRequest;


class CauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCauHoi= CauHoi::all();
        return view('ds-cau-hoi', compact('listCauHoi'));   
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listLinhVuc= LinhVuc::all();
        return view('them-moi-cau-hoi', compact('listLinhVuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauHoiRequest $request)
    {
        $cauHoi=new CauHoi;
        $cauHoi->noi_dung=$request->noi_dung;
        $cauHoi->linh_vuc_id=$request->linh_vuc;
        $cauHoi->phuong_an_a=$request->phuong_an_a;
        $cauHoi->phuong_an_b=$request->phuong_an_b;
        $cauHoi->phuong_an_c=$request->phuong_an_c;
        $cauHoi->phuong_an_d=$request->phuong_an_d;
        $cauHoi->dap_an=$request->dap_an;
        $cauHoi->save();
        $request->session()->flash('success', 'Thêm thành công!');
       return redirect()->route('cau-hoi.them-moi');

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
        $cauHoi=CauHoi::find($id);
        $listLinhVuc=LinhVuc::all();
        return view('them-moi-cau-hoi', compact('cauHoi','listLinhVuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CauHoiRequest $request, $id)
    {
        $cauHoi=CauHoi::find($id);
        $cauHoi->noi_dung=$request->noi_dung;
        $cauHoi->linh_vuc_id=$request->linh_vuc;
        $cauHoi->phuong_an_a=$request->phuong_an_a;
        $cauHoi->phuong_an_b=$request->phuong_an_b;
        $cauHoi->phuong_an_c=$request->phuong_an_c;
        $cauHoi->phuong_an_d=$request->phuong_an_d;
        $cauHoi->dap_an=$request->dap_an;
        $cauHoi->save();
        return redirect()->route('cau-hoi.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $cauHoi=CauHoi::find($id);
        $cauHoi->delete();
        return redirect()->route('cau-hoi.danh-sach');

    }
    public function trash()
    {
        $cauHoiRac= CauHoi::onlyTrashed()->get();
        return view('cau-hoi-thung-rac', compact('cauHoiRac'));
    }
    public function restore($id)
    {
        $cauHoi=CauHoi::withTrashed()->find($id);
        $cauHoi->restore();
        return redirect()->route('cau-hoi.thung-rac');
    }
    public function destroySQL($id)
    {
        $cauHoi=CauHoi::withTrashed()->find($id);
        $cauHoi->forceDelete();
        return redirect()->route('cau-hoi.thung-rac');

    }
}
