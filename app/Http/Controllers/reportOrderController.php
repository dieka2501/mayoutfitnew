<?php

namespace App\Http\Controllers;
// header("Content-Type: text/plain; charset=utf-8");
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\orderDetail;
use App\order;
use PDF;
use Excel;

class reportOrderController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->od       = new orderDetail;
        $this->order    = new order;
    }
    
    public function index(Request $request)
    {
        if($request->has('date_start') && $request->has('date_end')){
            $date_start         = $request->input('date_start');
            $date_end           = $request->input('date_end');
            $getdata            = $this->order->get_search_report($date_start,$date_end);
            $getall             = $this->order->get_report_search($date_start,$date_end);
        }else{
            $date_start         = date('Y-m-01');
            $date_end           = date('Y-m-31');
            $getdata            = $this->order->get_page_report();
            $getall             = $this->order->get_report_all();
        }

        if ($request->has('search'))
        {
            $view['order']      = $getdata;
            $view['url']        = config('app.url').'public/admin/report/order';
            $view['date_start'] = $date_start;
            $view['date_end']   = $date_end;
            return view('report_order.index',$view);
        }
        elseif ($request->has('pdf')) 
        {
            $view['report']     = $getall;
            $view['url']        = config('app.url').'public/admin/report/order';
            $view['date_start'] = $date_start;
            $view['date_end']   = $date_end;
            $pdf = PDF::loadView('pdf.reportOrder', $view);
            return $pdf->download('report_order.pdf');
        }
        elseif ($request->has('excel')) 
        {
            $profit = 0;
            $orderArray[] = ['Nama Barang', 'Qty','Penjualan','Diskon','HPP','Profit'];
            foreach ($getall as $datas) {
                $multiplehpp = $datas->product_hpp *$datas->order_detail_qty;
                $profit += ($datas->order_detail_price - $datas->order_detail_discount_nominal) - $multiplehpp;
                $orderArray[] = [
                                'Nama Barang'   => $datas->product_name, 
                                'Qty'           => $datas->order_detail_qty, 
                                'Penjualan'     => "Rp " . number_format($datas->order_detail_price,0,',','.'),
                                'Diskon'        => "Rp " . number_format($datas->order_detail_discount_nominal,0,',','.'),
                                'HPP'           => "Rp " . number_format($multiplehpp,0,',','.'),
                                'Profit'        => "Rp " . number_format($profit,0,',','.'),
                               ];
            }
            
            if($request->has('date_start') && $request->has('date_end')){
                $tgl = 'Tgl_'.$request->input('date_start').' - '.$request->input('date_end');
            }else{
                $tgl = 'All';
            }

            Excel::create('Report_Order_'.$tgl, function($excel) use ($orderArray) {
                $excel->sheet('sheet1', function($sheet) use ($orderArray) {
                    $sheet->fromArray($orderArray, null, 'A1', false, false);
                });

            })->download('xlsx');
            //var_dump($orderArray);
        }
        else
        {
            $totalprofit = 0;
            $untung      = 0;
            foreach ($getall as $alls) {
                $multiplehpp = $alls->product_hpp *$alls->order_detail_qty;
                $untung += ($alls->order_detail_price - $alls->order_detail_discount_nominal) - $multiplehpp;
                $totalprofit += $untung;
            }
            $view['order']      = $getdata;
            $view['url']        = config('app.url').'public/admin/report/order';
            $view['date_start'] = $date_start;
            $view['date_end']   = $date_end;
            $view['profit']     = $totalprofit;
            return view('report_order.index',$view);
        }
    }

    // public function create(Request $request)
    // {
    //     if($request->has('date_start') && $request->has('date_end')){
    //         $date_start = $request->input('date_start');
    //         $date_end   = $request->input('date_end');
    //     }else{
    //         $date_start = date('Y-m-01');
    //         $date_end   = date('Y-m-31');
    //     }
    //     $getdata            = $this->od->get_all($date_start,$date_end);
    //     $view['report']     = $getdata;
    //     $view['date_start'] = $date_start;
    //     $view['date_end']   = $date_end;
    //     // return view('pdf.reportOrder',$view);
    //     $pdf = PDF::loadView('pdf.reportOrder', $view);
    //     return $pdf->stream('report_order.pdf');
    // }

}
