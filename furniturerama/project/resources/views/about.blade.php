@extends('/layouts/main')

@section('content')
 
    <div class='container aboutus'>
        <img src='images/about.jpg' class="img-fluid" alt='About' height="auto" width="100%">
        <div class='top row align-items-center mx-0'>
        @include('partials/sale_banner_bottom') 
        </div>   
        <div class="bg-white py-4">           
            <h2 class="px-4">About us</h2>
            <p class="px-4">Furniturerama believes everyone should live in a home they love. Through technology and innovation, Furniturerama makes it possible for shoppers to quickly and easily find exactly what they want from a selection of various items across home furnishings, décor, home improvement and more. Committed to delighting its customers every step of the way, Furniturerama is reinventing the way people shop for their homes - from product discovery to final delivery.            
            </p>
            <p class="px-4">
            Since launching in 2015, Furniturerama's mission is to make great style easy, long-lasting and well-priced. Furniturerama works directly with its manufacturers to produce unique, durable pieces using high-quality materials. This direct relationship means Furniturerama can bring you beautiful modern furniture and decor at unrivaled value — up to 50% better than traditional retailers.
            </p>
        </div>

        <div class='mx-0 mb-4' style="background-image: url(/images/slices_15.jpg); background-size: cover; height: 300px">
            <div class="d-flex justify-content-end aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500" data-aos-anchor-placement="tom-bottom">
                <div class="col-5 bg-light rounded  mt-4 mr-4 pb-4" style="opacity: 0.9;">
                    <div class='text-center font-weight-bold display-4 text-black' style="padding-top:7%">SALE</div>
                    <div class='text-center font-weight-bold h4 text-black'>up to 50% off</div>
                    <div class='text-center font-weight-bold'><a href="/furniture"><div type="button" class="rounded btn btn-warning">Click to View</div></a></div>
                </div>
            </div>
        </div>

        <h2 class='fp mb-5 font-weight-bold'>Why should you choose us?</h2>
        <div class='row whyus  mx-0 mb-5'>
            <div class='col-3 why'>
                <img src='images/shipping2.png' class="mb-3" alt='Shipping Logo'>
                <h3>Free Shipping</h3>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum, ipsa repellat eveniet.</p>
            </div>
            <div class='col-3 why'>
                <img src='images/payment.png' class="mb-3" alt='Shipping Logo'>
                <h3>Easy Payment</h3>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum, ipsa repellat eveniet.</p>
            </div>
            <div class='col-3 why'>
                <img src='images/shipping.png' class="mb-3" alt='Shipping Logo'>
                <h3>24/h Shipping</h3>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum, ipsa repellat eveniet.</p>
            </div>
            <div class='col-3 why'>
                <img src='images/gurantee.png' class="mb-3" alt='Shipping Logo'>
                <h3>100% Gurantee</h3>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo laborum, ipsa repellat eveniet.</p>
            </div>
        </div>  <!--/. whyus-->              
    </div><!--/. container-->


@stop