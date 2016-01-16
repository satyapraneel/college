var Favourites = (function ($) {
    "use strict";

    var _addMeToFavourite = function () {
        $('body').on('click', '.add-to-favourite', function () {
            var collegeID = $(this).data('college-id');
            var token = $(this).data('token');
            var request = {};
            request.url = $(this).data('action');
            //request.data = 'collegeId='+ collegeID + '&_token=' + token;
            request.data = {_method: 'POST', _token: token, collegeId: collegeID};
            //request.data = { _token : token};
            request.type = 'POST';
            console.log(request);
            request.success = function (data) {
                if (data == 'false') {
                    $('.add-to-favourite').text('Login to add to favourite');
                } else {
                    $('.add-to-favourite').text('Added to favourites');
                }

                _showMyFavourites();

            };
            request.error = function () {
                alert('Opps! Something went wrong');
            };

            $.ajax(request);
        });
    }


    var _showMyFavourites = function () {
        var request = {};
        var form = $('#favourite-hidden');
        request.url = form.prop('action');
        request.type = form.prop('method');
        request.data = form.serialize();
        request.success = function (data) {
            $('#favourite-list').html(data);
            _getButtonClickValue();
        };

        request.error = function (data) {

        };
        $.ajax(request);

    };
    var _getButtonClickValue = function () {
        $('.collegeModal').on('click', function (e) {
            var request1 = {};
            var form1 = $('#modalForm');
            request1.url = form1.prop('action');
            request1.data = form1.serialize() + '&collegeId=' + $(this).data('id');
            request1.cache = false;
            request1.type = form1.prop('method');
            request1.beforeSend = function () {
            }
            request1.success = function (data) {
                //console.log(data);
                $('#modalTitle').html(data.collegeName);
                /* $('#modaldetail').html(data.collegeDetail);*/
                var address = 'Address : ' + data.collegeStreet1 + ', ' + data.collegeStreet2 + ', ' + data.collegeCity + '<br/>' + data.collegeState + ', ' + data.collegePincode + '<br/>' + data.collegeDetail + '<br/>';
                $('#modalAddress').html(address);
                var base = $('#baseUrl').data('base-url');
                var image = base + "/img/" + data.collegeImage;
                $('#modalImage').html('<img src="' + image + '" width="100%" height="100%"/>');
                //$('.favouratesModalClass').html('<button class="btn btn-sm btn-warning pull-right add-to-favourite" data-college-id="' + data.collegeId + '" data-token="'+ data.token +'" data-action="' + data.action +'">Add to favourite</button>');
                if (data.collegeSource) {
                    $('#iFrameModal').attr('src', data.collegeSource).attr('width', '100%');
                }
                //<iframe src="" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                //Favourites.addMeToFavourite();
            }
            request1.error = function () {
                $('#myModal').html('something went wrong').modal();
            }
            $.ajax(request1);
        });
    }
    var init = function () {
        _addMeToFavourite();
        _showMyFavourites();
        _getButtonClickValue();
    };

    return {
        init: init,
        _showMyFavourites: _showMyFavourites
    }
})(jQuery);