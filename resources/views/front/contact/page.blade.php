@extends('home')
@section('content')
	<section id="featured-products" class="section section-content grey-bg">
        <div class="container">
            <div class="section-title">
                <h2>Hubungi Kami</h2>
            </div>
            <div class="context row clearfix">
                <div class="col-md-12 img-thumbnail">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3055904081607!2d106.79674631476917!3d-6.223376995495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1495f1fddc9%3A0xfe3d872dbc2b760a!2sGoogle+Indonesia!5e0!3m2!1sen!2sid!4v1465886736510" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-5 contact-info">
                    <h4>Contact Us</h4>
                    <p class="pre-text">
                        Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam <br><br>
                        Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat sed do eiusmod tempor incididunt ut labore
                    </p>
                    <div class="info">
                        <ul>
                            <li class="address"><label class="icon"><i class="ion-ios-home-outline"></i></label> <span>Ranelagh Place, Liverpool, L3 5UL, England</span></li>
                            <li class="hotline"><label class="icon"><i class="ion-ios-telephone-outline"></i></label> <span>8 (395) 989—20—11</span></li>
                            <li class="email"><label class="icon"><i class="ion-ios-email-outline"></i></label> <span><a href="#">info@mayoutfit.com</a></span></li>
                        </ul>
                    </div>
                </div>
                <form action="contact-us" class="contact-form-box col-md-7 col-sm-12" enctype="multipart/form-data" method="post">
                <fieldset>
                    <h4>Send Us Message</h4>
                    <div class="row">
                        <div class="col-md-9 col-sm-7">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control grey validate" id="name" name="from" type="text" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control grey validate" id="email" name="from" type="text" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input class="form-control grey validate" id="subject" name="from" type="text" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">Message</label>
                                <input class="form-control grey validate" id="messages" name="from" type="text" value="" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="submit">
                        <button class="button btn btn-primary button-medium" id="submitMessage" name="submitMessage" type="submit">Send Message</button>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </section>
@stop