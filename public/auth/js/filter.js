var Filter = (function($){
    var sector = $('.sector');
    var form = $('#college');
    var request = {};
    var init = function(){
        _getSelectedValues();
        _getSelectedCityValue();

    }
    var _getSelectedValues = function() {
        $('#checkboxForSector').on('change', 'input[type=checkbox]', function(e) {

            _getResponse();
        });
    }
    var _getSelectedCityValue = function(){
        $('#lstFruits').on('change', function() {
            _getResponse();
        });
    }
    var _getResponse = function(){
        var pleaseWaitDiv = $('<div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="modal-header"><h1>Processing...</h1></div><div class="modal-body"><div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div></div></div>');
        request.url =  form.prop('action');
        request.data = form.serialize();
        request.type = form.prop('method');
        request.beforeSend = function(){
            pleaseWaitDiv.modal();
        }
        request.success = function (data) {
            $('#colDetails').html(data);
        }
        request.error = function () {
            $('#colDetails').html('something went wrong');
        }
        pleaseWaitDiv.modal('hide');
        $.ajax(request);
    }
    return {
        init:init
    }
})(jQuery);