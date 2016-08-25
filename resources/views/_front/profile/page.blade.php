@extends('home')
@section('content')
	<section class="section section-content grey-bg">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-3">
                    <ul class="profile-menu">
                        <li class="active"><a href="#">My Profile</a></li>
                        <li><a href="#">My Shipping Info</a></li>
                        <li><a href="#">My Orders</a></li>
                        <li><a href="#">My Returns</a></li>
                    </ul>
                </div>
                <div class="col-md-9 content-profile">
                    <div class="section-title">
                        <h2>Edit Profile</h2>
                    </div>
                    <form class="form-inline-signup">
                        <div class="row clearfix">
                            <div class="col-md-10 col-xs-12">
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="col-md-12">
                                            <select class="form-control">
                                              <option>Select Title</option>
                                              <option valeu="male">Mr.</option>
                                              <option valeu="female">Mrs.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-6"><input type="text" class="form-control" id="firstname" placeholder="First Name"></div>
                                        <div class="col-md-6"><input type="text" class="form-control" id="lastname" placeholder="Last Name"></div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-12"><input type="text" class="form-control" id="emailaddress" placeholder="Email Address"></div>
                                    </div>
                                     <div class="form-group clearfix">
                                        <div class="col-md-6"><input type="text" class="form-control" id="password1" placeholder="Your Password"></div>
                                        <div class="col-md-6"><input type="text" class="form-control" id="password2" placeholder="Confirm Password"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-pink">Save&nbsp;<i class="ion-android-checkmark-circle"></i></button>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
@stop