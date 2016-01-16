<script src="{{ URL::asset('js/vendor/jquery-1.11.1.min.js')}}"></script>
<script src="{{ URL::asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/filter.js')}}"></script>
<script src="{{ URL::asset('js/place.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap-select.js')}}"></script>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    $('.college_image').click(function() {
        $('.college-list').toggle('slow');
        $('.colleg-list_2a').hide();
        $('.colleg-list_1a').hide();
        $('.city-list').hide();
        $('html, body').animate({ scrollTop: $('.college_image').offset().top},2000);
    });
    $('#colleg-list_1').click(function() {
        $('.colleg-list_1a').toggle('slow');
        $('.colleg-list_2a').hide();

    });
    $('#colleg-list_2').click(function() {
        $('.colleg-list_2a').toggle('slow');
        $('.colleg-list_1a').hide();
    });
    $('.city').click(function() {
        $('.city-list').toggle('slow');
        $('.colleg-list_2a').hide();
        $('.colleg-list_1a').hide();
        $('.college-list').hide();
        $('html, body').animate({ scrollTop: $('.city').offset().top},2000);
    });
</script>