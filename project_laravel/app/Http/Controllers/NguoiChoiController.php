<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use App\LichSuMuaCredit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NguoiChoiRequest;
use Illuminate\Support\Str;




class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNguoiChoi= NguoiChoi::all();
        return view('ds-nguoi-choi', compact('listNguoiChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('them-moi-nguoi-choi');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NguoiChoiRequest $request)
    {
        $nguoiChoi=new NguoiChoi;
        $nguoiChoi->ten_dang_nhap=$request->ten_dang_nhap;
        $nguoiChoi->mat_khau=Hash::make($request->mat_khau);
        $nguoiChoi->email=$request->email;
        if(!$request->hasFile('hinh_dai_dien'))
            $nguoiChoi->hinh_dai_dien='';
        else
        {
            $avatar=$request->hinh_dai_dien;
            $name=$avatar->getClientOriginalName();
            $hinh= Str::random(4)."_". $name;
            while(file_exists("assets/images/users/".$hinh))
            {
                $hinh=Str::random(4)."_". $name;            
            }
            $avatar->move("assets/images/users",$hinh);
            $nguoiChoi->hinh_dai_dien=$hinh;
        }
        $nguoiChoi->diem_cao_nhat='0';
        $nguoiChoi->credit='0';


        $nguoiChoi->save();
        $request->session()->flash('success', 'Thêm thành công!');
       return redirect()->route('nguoi-choi.them-moi');    
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
         $nguoiChoi=NguoiChoi::find($id);
        return view('them-moi-nguoi-choi' , compact('nguoiChoi'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NguoiChoiRequest $request, $id)
    {
       /** $nguoiChoi=NguoiChoi::find($id);
        $nguoiChoi->ten_dang_nhap=$request->ten_dang_nhap;
        $nguoiChoi->mat_khau=Hash::make($request->mat_khau);
        $nguoiChoi->email=$request->email;
        $nguoiChoi->hinh_dai_dien=$request->hinh_dai_dien;
        $nguoiChoi->diem_cao_nhat=$request->diem_cao_nhat;
        $nguoiChoi->credit=$request->credit;
        $nguoiChoi->save();
        return redirect()->route('nguoi-choi.danh-sach');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoiChoi=NguoiChoi::find($id);
        $nguoiChoi->delete();
        return redirect()->route('nguoi-choi.danh-sach');    
    }
    public function trash()
    {
        $nguoiChoiRac= NguoiChoi::onlyTrashed()->get();
        return view('nguoi-choi-thung-rac', compact('nguoiChoiRac'));
    }
    public function restore($id)
    {
        $nguoiChoi=NguoiChoi::withTrashed()->find($id);
        $nguoiChoi->restore();
        return redirect()->route('nguoi-choi.thung-rac');
    }
    public function destroySQL($id)
    {
        $nguoiChoi=NguoiChoi::withTrashed()->find($id);
        $nguoiChoi->forceDelete();
        return redirect()->route('nguoi-choi.thung-rac');

    }
    public function lichSuMuaCredit($id)
    {
        $lichSuMuaCredit = LichSuMuaCredit::where('nguoi_choi_id',$id)->get();
        return view('lich-su-mua-credit',compact('lichSuMuaCredit',));
    }
}
