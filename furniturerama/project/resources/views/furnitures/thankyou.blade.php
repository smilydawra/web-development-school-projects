@extends('layouts.main')

@section('content')

<div class='container bg-white mt-5 mb-3 pb-4' >
    <div class="col">
        <small>
            <ul class="breadcrumb bg-white mt-2">
                <li><a href="#" class="text-dark">HOME</a> </li>&nbsp;
                <li>/ <a href="#" class="text-dark">THANK YOU</a></li>&nbsp;
            </ul>
        </small>
        <!-- THANK YOU SECTION -->
        <div class='thankyou' style='text-align: center;'>
            <!-- THANK YOU -->
            <div>
                <img src='/images/thankyou.png' alt='Thank you check mark'>
                <h1 style="font-size:1.4em;">Thank you for your purchase.</h1>
                <h5>Your order was completed successfully.</h5>
            </div>
            <!-- RECIEPT -->
            @if(count($errors) >0)
                <div class='alert alert-success'>
                    <ul>
                        <?php $x=1; ?>
                        @foreach($errors->all() as $error)
                            @if($x==1)
                                <li style="text-align: center; list-style-type: none;">ORDER ID : {{ $error }}</li>
                            @endif
                            @if($x==2)
                                <li style="text-align: center; list-style-type: none;">TOTAL : ${{ $error }}</li>
                            @endif
                            @if($x==3)
                                <li style="text-align: center; list-style-type: none;">AUTHORIZATION CODE : {{ $error }}</li>
                            @endif
                        <?php $x++; ?>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>

            </div>
            <!-- SOCIAL MEDIA -->
            <div>
                <p style='margin-top: 50px;'>Don't forget to share it on our social media</p>
                <button type="button" class="btn btn-social-icon btn-outline-facebook"><i class="fa fa-facebook"></i></button>
                <button type="button" class="btn btn-social-icon btn-outline-twitter"><i class="fa fa-twitter"></i></button>
                <button type="button" class="btn btn-social-icon btn-outline-instagram"><i class="fa fa-instagram"></i></button>
                <button type="button" class="btn btn-social-icon btn-outline-youtube"><i class="fa fa-youtube"></i></button>
            </div>
            <!-- HOMEPAGE -->
            <div>
                <a href='/' class="btn btn-warning" style='background-color: #ffba26; margin-top: 25px;'>
                {{ __('Back To Homepage') }}
                </a>
            </div>
        </div>

    </div>
</div>
<div class="row my-5 mx-auto py-5 container-fluid">
    <img src="images/home_page_03.jpeg" height="100" width="100%">
</div>
@endsection
