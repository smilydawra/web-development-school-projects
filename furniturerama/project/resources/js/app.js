require('jquery');
import $ from "jquery";
window.$= window.jQuery= $;

require('./bootstrap');

require('aos');
import AOS from "aos";

$(document).ready(function() {
            $(window).scroll(function() {
                if($(this).scrollTop() > 0) { 
                    $('.custom').addClass('bg-light');
                    $('.custom').removeClass('bg-transparent');
                } else {
                    $('.custom').addClass('bg-transparent');
                    $('.custom').removeClass('bg-light');
                }
            });
            $("#mobile_button").click(function(e){
                $('.custom').addClass('bg-light');
                $('.custom').removeClass('bg-transparent');
            });
            $("#pencil_icon").click(function(e) {
            console.log("Top clicked. Replicating event on bottom layer.");
            
            var bottomEvent = new $.Event("click");
            
            bottomEvent.pageX = e.pageX;
            bottomEvent.pageY = e.pageY;
            
            $("#user_image").trigger(bottomEvent);
            
            return false;
            });

            $( "#search_button" ).click(function() {
              $( "#search_form" ).toggle( "slow", function() {});
            });

        });

AOS.init();

        (function(){
            var classname = document.querySelectorAll('.qty_chg');

            Array.from(classname).forEach(function(element){
                element.addEventListener('change',function(){
                    var id = element.getAttribute('data-id');

                    axios.patch('/cart/update/'+id,{
                        qty_chg : this.value,
                    })
                    .then(function (response){
                        console.log(response);
                        window.location = '/cart';
                    })                                    
                    .catch(function(error){
                        console.log(error);
                    })

                })
            })
        })();