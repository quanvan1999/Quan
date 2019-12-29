<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use App\LuotChoi;
use App\ChiTietLuotChoi;
use Illuminate\Support\Facades\DB;

class LuotChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $listLuotChoi= luotChoi::all();
        return view('ds-luot-choi', compact('listLuotChoi'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listNguoiChoi= NguoiChoi::all();
        return view('them-moi-luot-choi', compact('listNguoiChoi'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $luotChoi=luotChoi::find($id);
        $luotChoi->nguoi_choi_id=$request->nguoi_choi;
        $luotChoi->so_cau=$request->so_cau;
        $luotChoi->diem=$request->diem;
        $luotChoi->ngay_gio=$request->ngay_gio;
        $luotChoi->save();    
        return redirect()->route('luot-choi.danh-sach');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $luotChoi=luotChoi::find($id);
        $luotChoi->delete();
        return redirect()->route('luot-choi.danh-sach');

    }
    public function trash()
    {
        $luotChoiRac= luotChoi::onlyTrashed()->get();
        return view('luot-choi-thung-rac', compact('luotChoiRac'));
    }
    public function restore($id)
    {
        $luotChoi=luotChoi::withTrashed()->find($id);
        $luotChoi->restore();
        return redirect()->route('luot-choi.thung-rac');
    }
    public function destroySQL($id)
    {
        $luotChoi=luotChoi::withTrashed()->find($id);
        $luotChoi->forceDelete();
        return redirect()->route('luot-choi.thung-rac');

    }
    public function chiTietLuotChoi($id)
    {
        $chiTietLuotChoi = ChiTietLuotChoi::where('luot_choi_id',$id)->get();
        return view('chi-tiet-luot-choi',compact('chiTietLuotChoi',));
    }
}
