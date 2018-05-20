

var i=1;
function getvalue(){
    var val = $('#item').val();
    var qty = $('#qty').val();
    var member = $('#member').val();

    if(qty == '' || val == '' || member == ''){
        alert('pastikan semua data yang diperlukan terisi');
    }else{
        var index = i-1;
        var url = "/getitem/"+val;
        $.ajax({
            type:'get',
            url: url,
            success: function(data){
                var datafinal = "<tr >"+
                                    data+
                                    "<td>"+qty+"</td>"+
                                    "<td>"+
                                    "<button type='button' class='btn btn-danger' onclick='hapus(this)'>hapus</button>"+
                                    "<input type='hidden' name='id[]' value='"+val+"'></input>"+
                                    "<input type='hidden' name='qty[]' value='"+qty+"'></input>"+
                                    "</td>"+
                                "</tr>";
                $('#tbody').append(datafinal);
                addprice(val, qty);
                i++;
            }, error: function(){
                alert('error');
            }
        });
    }
}

function hapus(x){
    var index = x.rowIndex;
    var row = $('#myTable #tbody tr').eq(index-1);
    var jumlah = row.find('td').eq(5).html();
    var harga = row.find('td').eq(4).html();
    var harga_sekarang = $('#jml-pembelian').val();
    var harga_sekarang = harga_sekarang - (jumlah*harga);
    $('#jml-pembelian').attr('value', harga_sekarang);
    document.getElementById("myTable").deleteRow(index);
}

function addprice(id, qty){
    var url = '/price/'+id;
    $.ajax({
        type: 'get',
        url: url,
        success: function(data){
            var last = parseInt($('#jml-pembelian').val());
            var ajak = parseInt(data)*qty;
            var price = last+ajak;
            $('#jml-pembelian').attr('value', price);
        }
    });
}

function kurangiprice(id, qty){
    var url = '/price/'+id;
    $.ajax({
        type: 'get',
        url: url,
        success: function(data){
            var last = parseInt($('#jml-pembelian').val());
            var ajak = parseInt(data)*qty;
            var price = last-ajak;
            $('#jml-pembelian').attr('value', price);
        }
    });
}

function getNote(id){
    var url = "/note/"+id;
    $.ajax({
        type: 'get',
        url:url,
        success: function(data){
            $('#note-detail').html(data);
            $('#modalNota').modal('show');
        }
    });
}

function delete_note(id){
    $('#delete-form').attr('action', '/pembelian/'+id);
    $('#modalhapus').modal('show');
}
