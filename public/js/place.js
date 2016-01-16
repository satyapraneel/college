var Filter = (function ($) {
    var init = function () {
        _getLocationDetail();
        _getPlaceButtonClick();
        _placeDropDownSelect();
    }
    var _getLocationDetail = function () {
        var addressLocation = $('#mapLocation').text();
        addressLocation = $.parseJSON(addressLocation);
        var arr = [];
        for (var address in addressLocation) {
            var array = $.map(addressLocation[address], function (value, index) {
                return value;
            });
            arr.push(array);
        }
        initialize(arr);
    }


    function initialize(locations) {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            // center: new google.maps.LatLng(-33.92, 151.25),
            center: new google.maps.LatLng(23.3500, 85.3300)
            // mapTypeId: google.maps.MapTypeId.ROADMAP
        });


        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][2], locations[i][3]),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    _getPlaceDetail(locations[i][4])
                }
            })(marker, i));
        }
    }

    var _getPlaceButtonClick = function () {
        $('.placeModal').on('click', function (e) {
            _getPlaceDetail($(this).data('id'));
        });
    }

    var _placeDropDownSelect = function() {
        $('#lstCities').on('change', function () {
            _getPlaceList();
        });
    }

    $(function () {
        $('#lstCities').multiselect();
        Filter.init();
        Favourites.init();
    });

    var _getPlaceDetail = function (placeId) {
        var form = $('#modalPlaceForm');
        var request = {};
        request.url = form.prop('action');
        request.data = form.serialize() + '&placeId=' + placeId;
        request.type = form.prop('method');
        request.beforeSend = function () {
        }
        request.success = function (data) {
            $('#modalPlaceTitle').html(data.placeName);
            /* $('#modaldetail').html(data.collegeDetail);*/
            var address = 'Address : ' + data.placeStreet1 + ', ' + data.placeStreet2 + ',  <br/>' + '<br/>';
            $('#modalPlaceAddress').html(data.placeDetail);
            var base = $('#baseUrl').data('base-url');
            var carosal = '';


            var i = 0;
            for(images in data.placeImages) {
                var image = base + "/img/" + data.placeImages[images]['image'];
                if (i == 0) {
                    carosal += '<div class="item active">' +
                    '<img src="' + image + '"  style="height:300px !important;" ></div>';
                    i++;
                }
                else{
                    carosal += '<div class="item">' +
                    '<img src="' + image + '"  style="height:300px !important;"></div>';
                }
            }
            $('.carousel').carousel();
            console.log(data);
            if (data.placeSource) {
                $('#iFrameModal').attr('src', data.placeSource).attr('width', '100%');
            }
            $('#modalImage').html(carosal);
            $('#myPlaceModal').modal('show');

            //var base = $('#baseUrl').data('base-url');
            //var image = base + "/img/" + data.collegeImage;
            //$('#modalImage').html('<img src="' + image + '" width="100%" height="100%"/>');

            //$('#myModal').modal('show');
            //$('#colDetails').html(data);
        }
        request.error = function () {
            $('#modalPlaceDetails').html('something went wrong');
        }
        $.ajax(request);

    }
    var _getPlaceList = function(){
        var form = $('#citySelect');
        var request = {};
        request.url = form.prop('action');
        request.data = form.serialize();
        request.type = form.prop('method');
        request.beforeSend = function () {

        }
        request.success = function (data) {
            //$('#colDetails').empty();
            //console.log(data);
            $('#placeDetails').html(data);
            _getLocationDetail();
            _getPlaceButtonClick();
        }
        request.error = function () {
            $('#colDetails').html('something went wrong');
        }
        $.ajax(request);
    }

    return {
        init: init
    }
})(jQuery);