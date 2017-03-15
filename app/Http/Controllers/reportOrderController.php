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
use Log;

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
            $getdata            = $this->order->get_search_report($date_start,$date_end);
            $getall             = $this->order->get_report_search($date_start,$date_end);
        }
        $totalprofit = 0;
        $untung      = 0;
        foreach ($getall as $alls) {
            $profit = $alls->order_detail_price - $alls->order_detail_discount_nominal - $alls->product_hpp ;
            $totalprofit += $profit * $alls->order_detail_qty;
        }
        if ($request->has('search'))
        {
            $view['order']      = $getdata;
            $view['url']        = config('app.url').'public/admin/report/order';
            $view['date_start'] = $date_start;
            $view['date_end']   = $date_end;
            $view['totalprofit']= $totalprofit;
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
            $grandprofit = 0;
            

            $orderArray[] = ['Nama Barang', 'Qty','Harga Jual','Diskon','HPP','Profit','Total Profit'];
            foreach ($getall as $datas) {
                // $profit = 0;
                // $grandprofit = 0;
                $profit = $datas->order_detail_price - $datas->order_detail_discount_nominal - $datas->product_hpp ;
                $grandprofit = $profit * $datas->order_detail_qty;
                $orderArray[] = [
                                'Nama Barang' => $datas->product_name, 
                                'Qty' => $datas->order_detail_qty, 
                                'Harga Jual' => $datas->order_detail_price,
                                'Diskon' => $datas->order_detail_discount_nominal,
                                'Hpp' => $datas->product_hpp,
                                'Profit' =>  $profit,
                                'Total Profit' =>  $grandprofit,
                               ];

            }
            
            if($request->has('date_start') && $request->has('date_end')){
                $tgl = 'Tgl_'.$request->input('date_start').' - '.$request->input('date_end');
            }else{
                $tgl = 'All';
            }
            ob_end_clean();
            ob_start();
            Excel::create('Report_Order_'.$tgl, function($excel) use ($orderArray) {
                $excel->sheet('sheet1', function($sheet) use ($orderArray) {
                    $sheet->fromArray($orderArray,NULL,"A1",false,false);
                });

            })->export('xlsx');
            // var_dump($orderArray);
            // Log::info($orderArray);
        }
        else
        {
            // var_dump($getall[0]->product_hpp);die;
            
             // var_dump($totalprofit);
            $view['order']      = $getdata;
            $view['url']        = config('app.url').'public/admin/report/order';
            $view['date_start'] = $date_start;
            $view['date_end']   = $date_end;
            $view['totalprofit']= $totalprofit;
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
