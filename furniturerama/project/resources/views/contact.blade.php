@extends('/layouts/main')

@section('content')
    <div class='container'>
        <div class="row mt-5 bg-white mx-0 pb-5">

            <div class="col-md-6">
                <small>
                    <ul class="breadcrumb bg-white mt-2">
                        <li><a href="/" class="text-dark">HOME</a> </li>&nbsp;
                        <li>/ <a href="/contact" class="text-dark">CONTACT</a></li>&nbsp;
                    </ul>
                </small>
                <img src="/images/contact.jpg" alt="" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>

            <div class="col-md-6 mt-5">

                <h1 class="h1-responsive font-weight-bold my-4" style="font-size:1.4em;">Contact us</h1>
                <!--Section description-->
                <p class="w-responsive mb-4 mr-4">Do you have any questions? Please do not hesitate to contact us directly. <br />Our team will come back to you within a matter of hours to help you.</p>
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-11 mr-4">
                        @if(count($errors) >0)
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li style="text-align: center; list-style-type: none;">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if($message = Session::get('success'))
                            <div class='alert alert-success'>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form id="contact-form" name="contact-form" action="/contact/email" method="post">
                            @csrf
                            <!--Grid row-->
                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <label for="name" class="">Your name</label>
                                        <input type="text" id="name" name="name" class="form-control mb-3">
                                    </div>
                                </div>
                            </div>

                            <!--Grid row-->
                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <label for="email" class="">Your email</label>
                                        <input type="text" id="email" name="email" class="form-control mb-3">
                                    </div>
                                </div>
                            </div>

                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <label for="subject" class="">Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control mb-3">
                                    </div>
                                </div>
                            </div>

                            <!--Grid row-->
                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <label for="message">Your message</label>
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control mb-3 md-textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
                        </form>
                        <div class="text-center text-md-left mt-4">
                            <a type="button" class="btn btn-warning" onclick="document.getElementById('contact-form').submit();">Send</a>
                        </div>
                        <div class="status"></div>
                    </div>

                </div>
            </div>
        </div><!--/.row -->
        <div class='top row align-items-center mx-0 mt-3 mb-5'>
        @include('/partials/sale_banner_bottom')
        </div>
    </div><!--/.container -->


@stop
