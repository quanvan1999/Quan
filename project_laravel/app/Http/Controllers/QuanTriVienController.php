<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\QuanTriVien;
use App\LinhVuc;
use App\CauHoi;
use App\GoiCredit;
use App\NguoiChoi;
use App\LuotChoi;
use  App\Http\Requests\DangNhapRequest;
use Illuminate\Support\Facades\Hash;
use  App\Http\Requests\QuanTriVienRequest;
use Illuminate\Support\Str;
use  App\Http\Requests\DoiMatKhauRequest;


class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listQTV= QuanTriVien::all();
        return view('ds-quan-tri-vien', compact('listQTV'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('them-moi-quan-tri-vien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuanTriVienRequest $request)
    {
         $qTV=new QuanTriVien;
        $qTV->ten_dang_nhap=$request->ten_dang_nhap;
        $qTV->mat_khau=Hash::make($request->mat_khau);
        $qTV->email=$request->email;
        $qTV->ho_ten=$request->ho_ten;
        if(!$request->hasFile('anh_dai_dien'))
            $qTV->anh_dai_dien='';
        else
        {
            $avatar=$request->anh_dai_dien;
            $name=$avatar->getClientOriginalName();
            $hinh= Str::random(4)."_". $name;
            while(file_exists("assets/images/admin/".$hinh))
            {
                $hinh=Str::random(4)."_". $name;            
            }
            $avatar->move("assets/images/admin",$hinh);
            $qTV->anh_dai_dien=$hinh;
        }        $qTV->save();
        $request->session()->flash('success', 'Thêm thành công!');
       return redirect()->route('quan-tri-vien.them-moi');    
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
        $qTV=QuanTriVien::find($id);
        return view('them-moi-quan-tri-vien' , compact('qTV'));
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
        $admin = QuanTriVien::find($id);
        $admin->ho_ten = $request->input('hoten');
        $admin->email = $request->input('email');
        $admin->save();
        return redirect()->route('quan-tri-vien.tai-khoan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qTV=QuanTriVien::find($id);
        $qTV->delete();
        return redirect()->route('quan-tri-vien.danh-sach'); 
    }
     public function trash()
    {
        $qTVRac= QuanTriVien::onlyTrashed()->get();
        return view('quan-tri-vien-thung-rac', compact('qTVRac'));
    }
    public function restore($id)
    {
        $qTV=QuanTriVien::withTrashed()->find($id);
        $qTV->restore();
        return redirect()->route('quan-tri-vien.thung-rac');
    }
    public function destroySQL($id)
    {
        $qTV=QuanTriVien::withTrashed()->find($id);
        $qTV->forceDelete();
        return redirect()->route('quan-tri-vien.thung-rac');

    }
    public function dangNhap()
    {
        return view("dang-nhap");
    }
    public function xuLyDangNhap(DangNhapRequest $request)
    {
       // $request->validate([
      //      'ten_dang_nhap'=> 'required',
       //     'mat_khau'=> 'required|min:6'
      //  ]);

        if(Auth::attempt(['ten_dang_nhap' => $request->ten_dang_nhap, 'password' => $request->mat_khau])) 
            return redirect()->route('linh-vuc.danh-sach');
        else
        {
            $request->session()->flash('error', 'Sai tên tài khoản hoặc mật khẩu!');
            return redirect()->route('dang-nhap');     
        }
    }
    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
    protected function guard()
    {
        return Auth::guard();
    }
    public function capNhat()
    {
        return view('cap-nhat-tai-khoan');  
    }
    public function taiKhoan()
    {
        return view('quan-tri-vien-tai-khoan');
    }
    public function doiMatKhau(DoiMatKhauRequest $request, $id)
    {
        $admin = QuanTriVien::find($id);
        $mat_khau_cu = Hash::check($request->input('old_matkhau'),$admin->mat_khau);
        if ( $mat_khau_cu )
        {
            $admin->mat_khau = Hash::make($request->input('new_matkhau'));
            $admin->save();
            return redirect()->route('quan-tri-vien.tai-khoan');
        }
        else
        {
            $request->session()->flash('error', 'Mật khẩu cũ sai!');
            return redirect()->route('quan-tri-vien.tai-khoan');
        }
    }
    public function thongKe()
    {
        $linhVuc_count=LinhVuc::count();
        $cauHoi_count=CauHoi::count();
        $nguoiChoi_count=NguoiChoi::count();
        $goiCredit_count=GoiCredit::count();
        $luotChoi_count=LuotChoi::count();        
        return view('thong-ke',compact('linhVuc_count','cauHoi_count','nguoiChoi_count','goiCredit_count','luotChoi_count'));
    }
}
