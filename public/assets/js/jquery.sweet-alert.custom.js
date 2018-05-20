function deleteData(e) {
    console.log(e);
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
        $("#formHapus"+$(e).attr("data-id")).submit();
    });
}