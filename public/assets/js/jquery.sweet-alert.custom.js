
!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples
    SweetAlert.prototype.init = function() {

    //Warning Message
    $('#sa-warning').click(function(e){
        e.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "Anda tidak akan dapat mengembalikan file anda!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText:"Batal",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            closeOnConfirm: false
        }, function(){
            $("#sa-warning").submit();
        });
    });

    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);