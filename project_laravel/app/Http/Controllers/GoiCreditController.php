<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoiCredit;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GoiCreditRequest;


class GoiCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listgoiCredit= GoiCredit::all();
        return view('ds-goi-credit', compact('listgoiCredit'));       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('them-moi-goi-credit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoiCreditRequest $request)
    {
        $goiCredit=new GoiCredit;
        $goiCredit->ten_goi=$request->ten_goi;
        $goiCredit->credit=$request->credit;
        $goiCredit->so_tien=$request->so_tien;
        $goiCredit->save();
       return redirect()->route('goi-credit.danh-sach');
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
       $goiCredit=GoiCredit::find($id);
        return view('them-moi-goi-credit' , compact('goiCredit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoiCreditRequest $request, $id)
    {
        $goiCredit=GoiCredit::find($id);
        $goiCredit->ten_goi=$request->ten_goi;
        $goiCredit->credit=$request->credit;
        $goiCredit->so_tien=$request->so_tien;
        $goiCredit->save();
        return redirect()->route('goi-credit.danh-sach');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goiCredit=GoiCredit::find($id);
        $goiCredit->delete();
        return redirect()->route('goi-credit.danh-sach');
    }
    public function trash()
    {
        $goiCreditRac= GoiCredit::onlyTrashed()->get();
        return view('goi-credit-thung-rac', compact('goiCreditRac'));
    }
    public function restore($id)
    {
        $goiCredit=GoiCredit::withTrashed()->find($id);
        $goiCredit->restore();
        return redirect()->route('goi-credit.thung-rac');
    }
    public function destroySQL($id)
    {
        $goiCredit=GoiCredit::withTrashed()->find($id);
        $goiCredit->forceDelete();
        return redirect()->route('goi-credit.thung-rac');

    }
}
