
<footer>
    <div class="container">
        <div class="row">

            <div class="col-sm-6" style="direction: rtl">
                <div class="footer-section">
                    <p class="" style="color: #fff;font-family: main, sans-serif">ساخته شده با عشق در ایران <i class="ion-heart" aria-hidden="true" style="color: #f0004c"></i> توسط <a href="https://colorlib.com" target="_blank">منتظری</a></p>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-sm-6">
                <div class="footer-section">
                    <ul class="social-icons">
                        <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>


<!-- SCIPTS -->

<script src="{{asset('public/common-js/jquery-3.1.1.min.js')}}"></script>

<script src="{{asset('public/common-js/tether.min.js')}}"></script>

<script src="{{asset('public/common-js/bootstrap.js')}}"></script>

<script src="{{asset('public/common-js/layerslider.js')}}"></script>

<script src="{{asset('public/common-js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
   /* function test(){
        Swal.fire({
            title: 'خطا!',
            text: 'برای لایک کردن ابتدا وارد سایت شوید',
            type: 'error',
        })
    }*/
    $(document).ready(function() {
        $('.like').on('click', function (e) {
            e.preventDefault();
                let post_id = $(this).attr('data-test');
                let token   = $('meta[name="csrf-token"]').attr('content');
                //alert(post_id+user_id);
                $.ajax({
                    url     : "{{route('ajaxLike')}}",
                    method  : 'POST',
                    data    : {
                        post_id  : post_id,
                    },
                    headers:
                        {
                            'X-CSRF-TOKEN': token
                        },
                    success : function(data){
                        if (data == "noAuth"){
                            Swal.fire({
                                title: 'خطا!',
                                text: 'برای لایک کردن ابتدا وارد سایت شوید',
                                type: 'error',
                            })
                        }else {
                            if (data[0] == "delete"){
                                $(".p-"+post_id).attr('class','ion-ios-heart-outline p-'+post_id);
                                $('.count-'+post_id).html(data[1]);
                            }else{
                                $(".p-"+post_id).attr('class','ion-heart p-'+post_id).attr('style','color:#f0004c');
                                $('.count-'+post_id).html(data[1]);
                            }
                        }
                    }
                });


        });
     });
</script>

</body>
</html>
