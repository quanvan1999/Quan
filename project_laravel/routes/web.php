      <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('dang-nhap','QuanTriVienController@dangNhap')->name('dang-nhap')->middleware('guest');
Route::get('dang-xuat','QuanTriVienController@dangXuat')->name('dang-xuat');

Route::get('quen-mat-khau', 'Auth\ForgotPasswordController@getResetPass')->name('quen-mk');
Route::post('quen-mat-khau', 'Auth\ForgotPasswordController@sendMail')->name('xl-quen-mk');



Route::post('dang-nhap','QuanTriVienController@xuLyDangNhap')->name('xu-ly-dang-nhap');
Route::middleware('auth')->group(function(){
  Route::get('/', function () {
    return view('layout');
})->name('dashboard');
   Route::get('thong-ke', 'QuanTriVienController@thongKe')->name('thong-ke');
   Route::prefix('quan-tri-vien')->group(function(){
    Route::get('/', 'QuanTriVienController@capNhat')->name('quan-tri-vien.view');
          Route::get('tai-khoan', 'QuanTriVienController@taiKhoan')->name('quan-tri-vien.tai-khoan');
          Route::post('tai-khoan/{id}','QuanTriVienController@update')->name('quan-tri-vien.xl-tai-khoan');
          Route::get('danh-sach', 'QuanTriVienController@index')->name('quan-tri-vien.danh-sach');
          Route::post('/{id}/doi-mat-khau','QuanTriVienController@doiMatKhau')->name('quan-tri-vien.doi-mat-khau');
          Route::get('danh-sach/them-moi', 'QuanTriVienController@create')->name('quan-tri-vien.them-moi');
          Route::post('danh-sach/them-moi', 'QuanTriVienController@store')->name('quan-tri-vien.xl-them-moi');
          Route::get('xoa/{id}', 'QuanTriVienController@destroy')->name('quan-tri-vien.xoa'); 
          Route::get('xoa-csdl/{id}', 'QuanTriVienController@destroySQL')->name('quan-tri-vien.xoa-csdl'); 
          Route::get('thung-rac', 'QuanTriVienController@trash')->name('quan-tri-vien.thung-rac');
          Route::get('thung-rac/{id}', 'QuanTriVienController@restore')->name('quan-tri-vien.khoi-phuc');
});

     Route::prefix('linh-vuc')->group(function(){ 
     	Route::get('/', 'LinhVucController@index')->name('linh-vuc.danh-sach');
          Route::get('them-moi', 'LinhVucController@create')->name('linh-vuc.them-moi');
          Route::post('them-moi', 'LinhVucController@store')->name('linh-vuc.xl-them-moi');
          Route::get('cap-nhat/{id}', 'LinhVucController@edit')->name('linh-vuc.cap-nhat'); 
          Route::post('cap-nhat/{id}', 'LinhVucController@update')->name('linh-vuc.xl-cap-nhat');
          Route::get('xoa/{id}', 'LinhVucController@destroy')->name('linh-vuc.xoa'); 
          Route::get('xoa-csdl/{id}', 'LinhVucController@destroySQL')->name('linh-vuc.xoa-csdl'); 
          Route::get('thung-rac', 'LinhVucController@trash')->name('linh-vuc.thung-rac');
          Route::get('thung-rac/{id}', 'LinhVucController@restore')->name('linh-vuc.khoi-phuc');


       
     });
     Route::prefix('cau-hoi')->group(function(){
     	 Route::get('/', 'CauHoiController@index')->name('cau-hoi.danh-sach');
          Route::get('them-moi', 'CauHoiController@create')->name('cau-hoi.them-moi');
          Route::post('them-moi', 'CauHoiController@store')->name('cau-hoi.xl-them-moi');
          Route::get('cap-nhat/{id}', 'CauHoiController@edit')->name('cau-hoi.cap-nhat'); 
          Route::post('cap-nhat/{id}', 'CauHoiController@update')->name('cau-hoi.xl-cap-nhat');
          Route::get('xoa/{id}', 'CauHoiController@destroy')->name('cau-hoi.xoa'); 
           Route::get('xoa-csdl/{id}', 'CauHoiController@destroySQL')->name('cau-hoi.xoa-csdl'); 
          Route::get('thung-rac', 'CauHoiController@trash')->name('cau-hoi.thung-rac');
          Route::get('thung-rac/{id}', 'CauHoiController@restore')->name('cau-hoi.khoi-phuc');
      });
     Route::prefix('goi-credit')->group(function(){
     	 Route::get('/', 'GoiCreditController@index')->name('goi-credit.danh-sach');
          Route::get('them-moi', 'GoiCreditController@create')->name('goi-credit.them-moi');
          Route::post('them-moi', 'GoiCreditController@store')->name('goi-credit.xl-them-moi');
          Route::get('cap-nhat/{id}', 'GoiCreditController@edit')->name('goi-credit.cap-nhat'); 
          Route::post('cap-nhat/{id}', 'GoiCreditController@update')->name('goi-credit.xl-cap-nhat');
          Route::get('xoa/{id}', 'GoiCreditController@destroy')->name('goi-credit.xoa'); 
          Route::get('xoa-csdl/{id}', 'GoiCreditController@destroySQL')->name('goi-credit.xoa-csdl'); 
          Route::get('thung-rac', 'GoiCreditController@trash')->name('goi-credit.thung-rac');
          Route::get('thung-rac/{id}', 'GoiCreditController@restore')->name('goi-credit.khoi-phuc');
      });
     Route::prefix('nguoi-choi')->group(function(){
          Route::get('/', 'NguoiChoiController@index')->name('nguoi-choi.danh-sach');
          Route::get('them-moi', 'NguoiChoiController@create')->name('nguoi-choi.them-moi');
          Route::post('them-moi', 'NguoiChoiController@store')->name('nguoi-choi.xl-them-moi');
          Route::get('/lich-su/{id}','NguoiChoiController@lichSuMuaCredit')->name('nguoi-choi.lich-su');
         /* Route::get('cap-nhat/{id}', 'NguoiChoiController@edit')->name('nguoi-choi.cap-nhat'); 
          Route::post('cap-nhat/{id}', 'NguoiChoiController@update')->name('nguoi-choi.xl-cap-nhat');*/
          Route::get('xoa/{id}', 'NguoiChoiController@destroy')->name('nguoi-choi.xoa'); 
          Route::get('xoa-csdl/{id}', 'NguoiChoiController@destroySQL')->name('nguoi-choi.xoa-csdl'); 
          Route::get('thung-rac', 'NguoiChoiController@trash')->name('nguoi-choi.thung-rac');
          Route::get('thung-rac/{id}', 'NguoiChoiController@restore')->name('nguoi-choi.khoi-phuc');
      });
     Route::prefix('luot-choi')->group(function(){
          Route::get('/', 'LuotChoiController@index')->name('luot-choi.danh-sach');
          Route::get('/chi-tiet/{id}','LuotChoiController@chiTietLuotChoi')->name('luot-choi.chi-tiet');
          Route::get('xoa/{id}', 'LuotChoiController@destroy')->name('luot-choi.xoa'); 
          Route::get('xoa-csdl/{id}', 'LuotChoiController@destroySQL')->name('luot-choi.xoa-csdl');
          Route::get('thung-rac', 'LuotChoiController@trash')->name('luot-choi.thung-rac');
          Route::get('thung-rac/{id}', 'LuotChoiController@restore')->name('luot-choi.khoi-phuc');
      });
 });