@extends('front.home')
@section('content')
	<section class="section section-content">
        <div class="container">
            <div class="section-title no-border">
                <h1>Login</h1>
            </div>
            <!-- Login -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#login-account" aria-expanded="true" aria-controls="collapseOne">
                      Login to your account
                    </a>
                  </h4>
                </div>
                <div id="login-account" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <form class="form-inline">
                      <div class="form-group">
                        <label class="sr-only" for="InputEmail3">Email address</label>
                        <input type="email" class="form-control" id="InputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="InputPassword3">Password</label>
                        <input type="password" class="form-control" id="InputPassword3" placeholder="Password">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
                      </div>
                      <button type="submit" class="btn btn-default btn-pink">Log In</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Register -->
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#create-account" aria-expanded="false" aria-controls="collapseTwo">
                      Create an account
                    </a>
                  </h4>
                </div>
                <div id="create-account" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <p>Register with us for the convenience of easy checkout in the future and to track your order history</p>
                    <form class="form-inline-signup">
                        <div class="row clearfix">
                            <div class="col-md-9 col-xs-12">
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="col-md-4">
                                            <select class="form-control">
                                              <option>Select Title</option>
                                              <option valeu="male">Mr.</option>
                                              <option valeu="female">Mrs.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4"><input type="text" class="form-control" id="firstname" placeholder="First Name"></div>
                                        <div class="col-md-4"><input type="text" class="form-control" id="lastname" placeholder="Last Name"></div>
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
                        <button type="submit" class="btn btn-default btn-pink">Continue&nbsp;<i class="ion-arrow-right-c"></i></button>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@stop