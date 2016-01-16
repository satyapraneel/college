var Filter = (function ($) {
    var sector = $('.sector');
    var form = $('#college');
    var request = {};
    var init = function () {
        _getSelectedValues();
        _getSelectedCityValue();
        _getButtonClickValue();

    }
    var _getSelectedValues = function () {
        $('#checkboxForSector').on('change', 'input[type=checkbox]', function (e) {

            _getResponse();
        });
    }
    var _getSelectedCityValue = function () {
        $('#lstFruits').on('change', function () {
            _getResponse();
        });
    }
    var _getResponse = function () {
        var pleaseWaitDiv = $('<div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="modal-header"><h1>Processing...</h1></div><div class="modal-body"><div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div></div></div>');
        request.url = form.prop('action');
        request.data = form.serialize();
        request.type = form.prop('method');
        request.beforeSend = function () {
            pleaseWaitDiv.modal();
        }
        request.success = function (data) {
            //$('#colDetails').empty();
            //console.log(data);
            $('#colDetails').html(data);
            _getButtonClickValue();
        }
        request.error = function () {
            $('#colDetails').html('something went wrong');
        }
        pleaseWaitDiv.modal('hide');
        $.ajax(request);
    }

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
                $('.favouratesModalClass').html('<button class="btn btn-sm btn-warning pull-right add-to-favourite" data-college-id="' + data.collegeId + '" data-token="'+ data.token +'" data-action="' + data.action +'">Add to favourite</button>');
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

    return {
        init: init
    }
})(jQuery);