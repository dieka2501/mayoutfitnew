<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\event;

class eventController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->event        = new event;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('cari')){
            $cari       = $request->input('cari');
            $get_news   = $this->event->get_search($cari);
        }else{
            $cari       = "";
            $get_news   = $this->event->get_page();    
        }
        $page                       = ($request->has('page'))?$request->input('page'):1;
        $view['notip']              = session('notip');
        $view['data']               = $get_news;
        $view['cari']               = $cari;
        $view['url ']               = config('app.url').'public/admin/event';
        return view('event.list',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view['event_name']           = session('event_name');
        $view['event_description']    = session('event_description');
        $view['event_date']           = session('event_date');
        $view['ids']                  = session('ids');
        $view['event_status']         = session('event_status');
        $view['notip']                = session('notip');
        $view['url']                  = config('app.url').'public/admin/event/add';
        return view('event.add',$view);
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
        $event_name         = $request->input('event_name');
        $event_date         = $request->input('event_date');
        $event_description  = $request->input('event_description');
        $event_status       = $request->input('event_status');
        $insert['event_name']              = $event_name;
        $insert['event_date']              = $event_date;
        $insert['event_description']       = $event_description;
        $insert['event_status']            = $event_status;
        $insert['created_at']              = date('Y-m-d H:i:s');
        $ids = $this->event->add($insert);
        return redirect('admin/event');
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
        // var_dump($id);
        $get_data                     = $this->event->get_id($id); 
        $view['id_event']             = $id;
        $view['event_name']           = $get_data->event_name;
        $view['event_description']    = $get_data->event_description;
        $view['event_date']           = $get_data->event_date;
        $view['ids']                  = $get_data->ids;
        $view['event_status']         = $get_data->event_status;
        $view['notip']                = session('notip');
        $view['url']                  = config('app.url').'public/admin/event/edit';
        return view('event.add',$view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ids                = $request->input('ids');
        $event_name         = $request->input('event_name');
        $event_date         = $request->input('event_date');
        $event_description  = $request->input('event_description');
        $event_status       = $request->input('event_status');
        $insert['event_name']              = $event_name;
        $insert['event_date']              = $event_date;
        $insert['event_description']       = $event_description;
        $insert['event_status']            = $event_status;
        $insert['created_at']              = date('Y-m-d H:i:s');
        $this->event->edit($ids,$insert);
        // var_dump($ids);die;
        return redirect('admin/event');
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
        $this->event->del($id);
        return redirect('admin/event');

    }
}
