
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- jquery -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://script.viserlab.com/docrib/assets/templates/basic/js/jquery-3.3.1.min.js"></script>
<!-- migarate-jquery -->
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/jquery-migrate-3.0.0.js"></script>
<!-- bootstrap js -->
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/bootstrap.min.js"></script>
<!-- nice-select js-->
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/jquery.nice-select.js"></script>
<!-- chosen js -->
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/chosen.jquery.js"></script>
<!-- swipper js -->
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/swiper.min.js"></script>
<!-- wow js file -->
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/wow.min.js"></script>
<!-- main -->
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/script.js"></script>


    <!-- main -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCo_pcAdFNbTDCAvMwAD19oRTuEmb9M50c"></script>
    <script src="https://script.viserlab.com/docrib/assets/templates/basic//js/map.js"></script>
    <script>
        (function ($) {
            "use strict";

            var mapOptions = {
                center: new google.maps.LatLng(51.5287718, -0.2416804),
                zoom: 12,
                scrollwheel: true,
                backgroundColor: 'transparent',
                mapTypeControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementsByClassName("maps")[0],
                mapOptions);
            var myLatlng = new google.maps.LatLng(51.5287718, -0.2416804);
            var focusplace = {lat: 51.5287718 , lng: -0.2416804 };
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
            })
        })(jQuery);
    </script>
<script>
"use strict";
$('.subs').on('click',function () {

    var email = $('#subscriber').val();
    var csrf = 'YAAuGchChUJtzmH3wE3wjlSx4rGzgNMXX6UntWKX'

    var url = "https://script.viserlab.com/docrib/subscriber";
    var data = {email:email, _token:csrf};

    $.post(url, data,function(response){

        if(response.email){
            $.each(response.email, function (i, val) {
            iziToast.error({
            message: val,
            position: "topRight"
            });
         });
        } else{
            iziToast.success({
            message: response.success,
            position: "topRight"
            });
        }
    });

});


</script>



<link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/templates/basic/css/iziToast.min.css">
<script src="https://script.viserlab.com/docrib/assets/templates/basic/js/iziToast.min.js"></script>


<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>


<script>
    (function ($) {
        "use strict";
        $(document).on("change", ".langSel", function() {
            window.location.href = "https://script.viserlab.com/docrib/change/"+$(this).val() ;
        });
    })(jQuery);
</script>


<script>
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5fe0b9b2a8a254155ab5421d/1eq2tap1m';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>

<script>
    adroll_adv_id = "YXRNNTO7ZBAMFBH67UUE5M";
    adroll_pix_id = "MMQQDWGN25EXPHGRPA3NLR";
    adroll_version = "2.0";
    (function(w, d, e, o, a) {
        w.__adroll_loaded = true;
        w.adroll  = w.adroll  || [];
        w.adroll.f = [ 'setProperties', 'identify', 'track' ];
        var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id
                + "/roundtrip.js";
        for (a = 0; a < w.adroll.f.length; a++) {
            w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) {
                return function() {
                    w.adroll.push([ n, arguments ])
                }
            })(w.adroll.f[a])
        }
        e = d.createElement('script');
        o = d.getElementsByTagName('script')[0];
        e.async  = 1;
        e.src  = roundtripUrl;
        o.parentNode.insertBefore(e, o);
    })(window, document);
    adroll.track("pageView");
</script>
</body>
</html>
