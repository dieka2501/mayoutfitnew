<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use App\product;
use App\galery;
use App\aboutus;
use App\termsprivacy;
use App\carerrs;
use App\faq;
use App\howorder;
use App\partners;
use App\newsletter;
use App\contactus;
use App\store;

class homeController extends Controller
{
    function __construct(){
        $this->category     = new category;
        $this->product      = new product;
        $this->category     = new category;
        $this->galery       = new galery;
        $this->aboutus      = new aboutus;
        $this->termsprivacy = new termsprivacy;
        $this->carerrs 		= new carerrs;
        $this->faq 			= new faq;
        $this->howorder 	= new howorder;
        $this->partners 	= new partners;
        $this->newsletter 	= new newsletter;
        $this->contactus 	= new contactus;
        $this->store    = new store;
        $getcategory        = $this->category->get_all('category_name','ASC');
        $arr_cat            = [];
        foreach ($getcategory as $cats) {
            $arr_cat[$cats->idcategory] = $cats->category_name;
        }
        // $share['']
        view()->share('list_category',$arr_cat);
        view()->share('count',count(session('cart.idproduct')));
        view()->share('idproduct',session('cart.idproduct'));
        view()->share('name',session('cart.name'));
        view()->share('price',session('cart.price'));
        view()->share('code',session('cart.code'));
        view()->share('image',session('cart.image'));
        view()->share('qty',session('cart.qty'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort                = 'created_at';
        $order               = "DESC";
        $getdatagalery       = $this->galery->get_page_front($sort,$order);
        $getdatacategory     = $this->category->get_page_front($sort,$order);
        $frontnew            = $this->product->get_page_front_new();
        $frontsale            = $this->product->get_page_sale();
        $getrandomproduct2   = $this->product->get_page_front_random2();
        $view['listgalery']  = $getdatagalery;
        $view['listcategory']= $getdatacategory;
        $view['frontnew']     = $frontnew; //(!empty($frontnew))?$frontnew->product_image:"";
        $view['frontsale']    = $frontsale;// (!empty($frontsale))?$frontsale->product_image:"";
        $view['listproduct2'] = $getrandomproduct2;
        return view('front.home.page',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function aboutus(Request $request)
    {
    	if ($this->aboutus->get_id() == NULL) {
    		$result = (object) array('aboutus_content' => "",);
    	}else{
    		$result = $this->aboutus->get_aboutus();
    	}

    	return view('front.home.aboutus')->with('data',$result);
    }
    
    public function termsprivacy(Request $request)
    {    	
    	if ($this->termsprivacy->get_id() == NULL) {
    		$result = (object) array('terms_privacy_content' => "",);
    	}else{
    		$result = $this->termsprivacy->get_termsprivacy();
    	}
    	
    	return view('front.home.termsprivacy')->with('data',$result);
    }
    
    public function carerrs(Request $request)
    {
    	if ($this->carerrs->get_id() == NULL) {
    		$result = (object) array('carerrs_content' => "",);
    	}else{
    		$result = $this->carerrs->get_carerrs();
    	}
    	 
    	return view('front.home.carerrs')->with('data',$result);
    }

    public function frontstore(Request $request)
    {
        if ($this->store->get_id() == NULL) {
            $result = (object) array('store_content' => "",);
        }else{
            $result = $this->store->get_store();
        }
         
        return view('front.home.store')->with('data',$result);
    }
    
    public function faq(Request $request)
    {
    	if ($this->faq->get_id() == NULL) {
    		$result = (object) array('faq_content' => "",);
    	}else{
    		$result = $this->faq->get_faq();
    	}
    
    	return view('front.home.faq')->with('data',$result);
    }
    
    public function howorder(Request $request)
    {
    	if ($this->howorder->get_id() == NULL) {
    		$result = (object) array('how_order_content' => "",);
    	}else{
    		$result = $this->howorder->get_howorder();
    	}
    
    	return view('front.home.howorder')->with('data',$result);
    }
    
    public function partners(Request $request)
    {
    	if ($this->partners->get_id() == NULL) {
    		$result = (object) array('partners_content' => "",);
    	}else{
    		$result = $this->partners->get_partners();
    	}
    
    	return view('front.home.partners')->with('data',$result);
    }
    
    public function newsletter(Request $request)
    {
    	if ($this->newsletter->get_id() == NULL) {
    		$result = (object) array('newsletter_content' => "",);
    	}else{
    		$result = $this->newsletter->get_newsletter();
    	}
    
    	return view('front.home.newsletter')->with('data',$result);
    }
    
    public function contactus(Request $request)
    {    
    	$contactus_nama       = (session('contactus_nama') == NULL ) ? session('contactus_nama'): "";
    	$contactus_email      = (session('contactus_email') == NULL) ? session('contactus_email') : "" ;
    	$contactus_pesan      = (session('contactus_pesan') == NULL) ? session('contactus_pesan'): "";
    	
    	$view['contactus_nama']          = $contactus_nama;
    	$view['contactus_email']         = $contactus_email;
    	$view['contactus_pesan']         = $contactus_pesan;    	
    	$view['url']        			 = config('app.url')."public/contactus/add";
    	$view['notip']      			 = session('notip');
    	return view('front.home.contactus',$view);
    }
    
    public function contactusstore(Request $request)
    {
    	$contactus_nama        = $request->input('contactus_nama');
        $contactus_email       = $request->input('contactus_email');
        $contactus_pesan       = $request->input('contactus_pesan');
        
        $insert['contactus_nama']             = $contactus_nama;
        $insert['contactus_email']            = $contactus_email;
        $insert['contactus_pesan']            = $contactus_pesan;
        
        $ids = $this->contactus->add($insert);
        if($ids > 0){
        	$request->session()->flash('notip','<div class="alert alert-success">Send message successful</div>');
        	return redirect('/contactus');
        }else{
        	$request->session()->flash('contactus_nama',$contactus_nama);
        	$request->session()->flash('contactus_email',$contactus_email);
        	$request->session()->flash('contactus_pesan',$contactus_pesan);
        	$request->session()->flash('notip','<div class="alert alert-danger">Send message failed, please try again</div>');
        	return redirect('/contactus');
        }
    }
}
