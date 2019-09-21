$(document).ready(function(){

    /*
            $(".votes").owlCarousel();
    */
    /* $('.votes').owlCarousel({
     items:2,
     lazyLoad:true,


 });*/
    /* var review_holder=$('.votes');
         review_holder.owlCarousel({
             items:2,
             rtl:true,
             autoplay:true,
             autoplayTimeout:2000,
             autoplayHoverPause:true
         });*/
    /*$(document).ready(function(){
        $(window).click(function(){
            $(".popup").fadeOut(500);
            $(".popupholder").fadeOut(500);
        })
        $(".popup").click(function(event){
            event.stopPropagation()
        })
    })*/
    $(window).resize(function(){
        var w=$(window).width();
        var h=$(window).height();
        $(".viewports").html(w+" * "+h);
    })
    /*var carousel =$('.slider');
    carousel.owlCarousel({
        item:2
    });    */
    /*
                AOS.init();
    */

    $(".owl-carousel").owlCarousel({
        /*
                            items:4,
        */                  loop:true,
        rtl:true,
        /*
                            autoplay:true,
        */                  margin:10,
        /*
                            autoplayTimeout:3000,
        */
        /*loop:true,*/
        /*nav:true,
        dotsContainer:true*/
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                margin:5
            },
            600:{
                items:3,
                margin:5
            },
            1000:{
                items:4,
                margin:5
            },
            1300:{
                items:4,
                margin:5
            },
            1500 : {
                items: 4,
                margin : 5
            }
        }
    });
    var owl = $('.owl-carousel');
    $(".next").click(function () {
        owl.trigger('next.owl.carousel');
    });
    $(".prev").click(function () {
        owl.trigger('prev.owl.carousel');
    });
    ///////

    $("#footer_input").focusin(function(){
        $(this).addClass("border");
    })
    $("#footer_input").focusout(function(){
        $(this).removeClass("border");
    })
    $("#email").focusin(function(){
        $(this).addClass("border");
    })
    $("#email").focusout(function(){
        $(this).removeClass("border");
    })
    $("#password").focusin(function(){
        $(this).addClass("border");
    })
    $("#password").focusout(function(){
        $(this).removeClass("border");
    })
    ///////
    $(".sub_all").css("display","none");
    $(".im").mouseenter(function(){
        $("#jahat").addClass("test");
        $(".im2").css("color","#11cccc");
        $(".sub_all").css("display","block");
        $(".sub_all").animate({marginTop:'-5px'},500);
    })
    $(".im").mouseleave(function(){
        $("#jahat").removeClass("test");
        $(".im2").css("color","#000");
        $(".sub_all").css("display","none");
        $(".sub_all").animate({marginTop:'10px'},500);
    })
    /* $(".sub_all").css("opacity","0");
     $(".im").mouseenter(function(){
        //$(this).children("div").css("opacity","0.9");
        $(".im2").css("color","#fff");
        //$(".sub_all").css("opacity","0.9");
        $(".sub_all").animate({marginTop:'-5px',opacity:'0.9'},500);
     })
     $(".im").mouseleave(function(){

            $(".im2").css("color","#333");
            //$(".sub_all").css("opacity","0");
            $(".sub_all").animate({marginTop:'10px',opacity:'0'},500);
     })
     */
    // $("#check").css("opacity","0");
    //$(".list").children("li").mouseenter(function(){
    //    $(this).css("opacity","0.9");
    //})

    /////////////
    $(".scroller").fadeOut(0);
    $(window).scroll(function(){
        var scroller=$(window).scrollTop();
        if(scroller>150){
            $(".scroller").fadeIn(500);
        }
        else{
            $(".scroller").fadeOut(500);
        }
    })
    $(".scroller").click(function(){
        $("html,body").animate({scrollTop:0},500);
    })
    /*======*/
    $(".new").mouseenter(function(){
        $(this).css({"background-color":"#fff","border":"solid 1px #f0004c"});
        $(this).children("a").css("color","#f0004c");
    })
    $(".new").mouseleave(function(){
        $(this).css("background-color","#f0004c");
        $(this).children("a").css("color","#fff");
    })
    $(".panel").mouseenter(function(){
        $(this).css({"background-color":"#fff","border":"solid 1px #11cccc"});
        $(this).children("a").css("color","#11cccc");
    })
    $(".panel").mouseleave(function(){
        $(this).css("background-color","#11cccc");
        $(this).children("a").css("color","#fff");
    })
    /*=======hidden_part======*/
    $(".hidden_menu").css("display","none");
    $("#m_hidden").click(function(){
        $(".hidden_menu").slideToggle();
    })
    $("div>ul>li>.content_ghaleb").css("display","none");
    $(".departman_ghaleb").click(function(){
        $("div>ul>li>.content_ghaleb").slideToggle();
    })
    $("div>ul>li>.content_back").css("display","none");
    $(".departman_back").click(function(){
        $("div>ul>li>.content_back").slideToggle();
    })
    $(".hidden_sitegardi").css("display","none");
    $("#sitegardi").click(function(){
        $(".hidden_sitegardi").slideToggle();
    })
    /*==============login_signin==================*/
    $(".loginholder").css("display","none");
    $(".vorod").click(function(){
        $(".loginholder").fadeIn(200);
    })
    $(".exit_login").click(function(){
        $(".loginholder").fadeOut(200);
    })
    $(".signinholder").css("display","none");
    $(".sabt").click(function(){
        $(".signinholder").fadeIn(200);
    })
    $(".exit_signin").click(function(){
        $(".signinholder").fadeOut(200);
    })

    ///
    $("#product_list").fadeOut(0);
    $("#product").keyup(function () {
        $("#product_list").fadeIn(800);
        var min_length = 0; // min caracters to display the autocomplete
        var keyword = $('#product').val();
        if (keyword.length > min_length) {
            $.ajax({
                url: 'ajax.php?c=ajax&a=search_pro',
                //url: 'test.php?c=ajax&a=search_pro',
                type: 'POST',
                data: {keyword:keyword},
                success:function(data){
                    $('#product_list').show();
                    $('#product_list').html(data);
                }
            });
        } else {
            $('#product_list').hide();
        }
    })

    //ajax for register and login
    /* $(".btn_login").click(function () {

         var email = $('#email_login').val();
         var password = $('#password_login').val();
         $.ajax({
             url: 'index.php?c=user&a=login',
             type: 'POST',
             data: {email:email,password:password}
             /!* success:function(data){
                  $('#product_list').show();
                  $('#product_list').html(data);
              }*!/
         });
     })*/
    /*====================send_comment===========*/
    $(".send_comment_holder").css("display","none");
    $(".send_cmt").click(function(){
        $(".send_comment_holder").css("display","block");
    });
    $("#exit_comment").click(function(){
        $(".send_comment_holder").css("display","none");
    });

    $(".search_box").css("display","none");
    $(".ajaxshow").css("display","none");
    $("#search").click(function(){
        $(".search_box").css("display","block");
        $(".headeritem").css("display","none");
        $(".header").css("height","35px");
    })
    $("#exit_search").click(function(){
        $(".search_box").css("display","none");
        $(".headeritem").css("display","flex");
        $(".header").css("height","75px");
    })
    })