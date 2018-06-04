$(document).ready(function () {
    /* Slider */
    // invoke the carousel
    $('#my-carousel').carousel({
        interval: 0,
        autoplay:false,
    });
    // scroll slides on mouse scroll
    /*$('#myCarousel').bind('mousewheel DOMMouseScroll', function(e){
        if(e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
            $(this).carousel('prev');
        }
        else{
            $(this).carousel('next');
        }
    });*/
    //scroll slides on swipe for touch enabled devices
    $("#my-carousel").on("touchstart", function(event){
        var yClick = event.originalEvent.touches[0].pageY;
        $(this).one("touchmove", function(event){
            var yMove = event.originalEvent.touches[0].pageY;
            if( Math.floor(yClick - yMove) > 1 ){
                $(".carousel").carousel('next');
            }
            else if( Math.floor(yClick - yMove) < -1 ){
                $(".carousel").carousel('prev');
            }
        });
        $(".carousel").on("touchend", function(){
            $(this).off("touchmove");
        });
    });
    /* End Slider*/
    /* Navbar */
    $(function() {
        //caches a jQuery object containing the header element
        var header = $("header");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                header.removeClass('clearHeader').addClass("darkHeader");
            } else {
                header.removeClass("darkHeader").addClass('clearHeader');
            }
        });
    });
    /* End Navbar */
    /* OWL Carousel */
    $("#featured-product-carousel").owlCarousel({
        autoplay: false,
        loop: true,
        dots:true,
        responsiveClass: true,
        responsive: {
            0:{
                items: 1
            },
            480:{
                items: 1
            },
            769:{
                items: 4
            }
        }
    });
    $("#product-carousel").owlCarousel({
        dots:true,
        responsive: {
            0:{
                items: 1
            },
            480:{
                items: 1
            },
            769:{
                items: 1
            }
        }
    });
    //Product-Detail Image carousel
    // 1) ASSIGN EACH 'DOT' A NUMBER
    dotcount = 1;
    $('#product-carousel .owl-dot').each(function() {
        jQuery( this ).addClass( 'dotnumber' + dotcount);
        jQuery( this ).attr('data-info', dotcount);
        dotcount=dotcount+1;
    });
    // 2) ASSIGN EACH 'SLIDE' A NUMBER
    slidecount = 1;
    $('#product-carousel .owl-item').not('.cloned').each(function() {
        jQuery( this ).addClass( 'slidenumber' + slidecount);
        slidecount=slidecount+1;
    });
    // SYNC THE SLIDE NUMBER IMG TO ITS DOT COUNTERPART (E.G SLIDE 1 IMG TO DOT 1 BACKGROUND-IMAGE)
    $('#product-carousel .owl-dot').each(function() {
        grab = $(this).data('info');
        slidegrab = $('.slidenumber'+ grab +' img').attr('src');
        console.log(slidegrab);
        $(this).css("background-image", "url("+slidegrab+")");
    });

    // THIS FINAL BIT CAN BE REMOVED AND OVERRIDEN WITH YOUR OWN CSS OR FUNCTION, I JUST HAVE IT
    // TO MAKE IT ALL NEAT
    amount = $('#product-carousel .owl-dot').length;
    gotowidth = 100/amount;

    $('#product-carousel .owl-dot').css("width", gotowidth+"%");
    newwidth = $('#product-carousel .owl-dot').width();
    $('#product-carousel .owl-dot').css("height", newwidth+"px");
    /* End OWL Carousel */

    /* Form validation */
    $.validate();

    /* Cart Function */
    /* Set rates + misc */
    var taxRate = 0.05;
    var shippingRate = 15.00;
    var fadeTime = 300;

    /* Assign actions */
    $('.product-quantity input').change( function() {
        updateQuantity(this);
    });
    $('button.remove-product').click( function() {
        removeItem(this);
    });

    /* Recalculate cart */
    function recalculateCart()
    {
        
        var subtotal = 0;
        /* Sum up row totals */
        $('.product-row').each(function () {
            subtotal += parseFloat($(this).children('.product-total-price').text());
        });
        

        /* Calculate totals */
        var tax = subtotal * taxRate;
        var shipping = (subtotal > 0 ? shippingRate : 0);
        var total = subtotal + tax + shipping;
        /* Update totals display */
        $('.totals-value').fadeOut(fadeTime, function() {
            $('#cart-subtotal').html(subtotal.toFixed(2));
            $('#cart-tax').html(tax.toFixed(2));
            $('#cart-shipping').html(shipping.toFixed(2));
            $('#total-cart').html(total.toFixed(2));
            if(total == 0){
                $('.checkout').fadeOut(fadeTime);
            }else{
                $('.checkout').fadeIn(fadeTime);
            }
            $('.totals-value').fadeIn(fadeTime);
        });
    }
    /* Update quantity */
    function updateQuantity(quantityInput)
    {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var rowId = $(quantityInput).attr('id');
        var price = parseFloat(productRow.children('.product-price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;
        /* Update line price display and recalc cart totals */
        productRow.children('.product-total-price').each(function () {

            $(this).fadeOut(fadeTime, function() {
                $(this).text(linePrice.toFixed(2));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });

        $.ajax({
            type: "POST",
            url: document.location.origin+document.location.pathname+'/update',
            data: "row_id="+rowId+'&qty='+quantity,
            success: function (response) {
                if(response>0){
                    $(".cart").text('Cart ('+response+')');
                }else{
                    $(".cart").text('Cart');
                }
            }
        });



    }
    /* Remove item from cart */
    function removeItem(removeButton)
    {
        var rowId = $(removeButton).attr('id');
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function() {
            productRow.remove();
            recalculateCart();
        });
        $.ajax({
            type: "POST",
            url: document.location.origin+document.location.pathname+'/update',
            data: "row_id="+rowId+'&qty=0',
            success: function (response) {
                if(response>0){
                    $(".cart").text('Cart ('+response+')');
                }else{
                    $(".cart").text('Cart');
                }
                
            }
        });
    }

});