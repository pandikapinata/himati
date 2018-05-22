@extends('layouts.admin')
@section('content')
<style>
.invoice-box {
    background: #ffffff;
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, .15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
}

.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td {
    padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}

.invoice-box table tr.information table td {
    padding-bottom: 40px;
}

.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td{
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
    }

    .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
    }
}

/** RTL **/
.rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.rtl table {
    text-align: right;
}

.rtl table tr td:nth-child(2) {
    text-align: left;
}
</style>

<div class="row">
    <div class="col-lg-6">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title text-center">
                                <img src="{{asset('assets/images/header.png')}}" style="width:100%; max-width:300px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                <b>Halo,<br>
                                {{$verif->guest->name}}<br>
                                Penyeawaan barang anda berhasil<br>
                            </td>

                            <td>
                                Invoice #: TR{{$verif->id}}S<br>
                                {{$verif->tgl_pesan}}<br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Item
                </td>
                <td class="text-center">
                    qty
                </td>
                <td class="text-right">
                    Harga
                </td>
            </tr>
            @foreach($verif->barang_sewa as $brg_sewa)
            @php
                $end = \Carbon\Carbon::parse($brg_sewa->end_date);
                $start = \Carbon\Carbon::parse($brg_sewa->start_date);
                $length = $end->diffInDays($start);
                if($length==0){
                    $length=1;
                }
            @endphp
            <tr class="item">
                <td>
                    {{$brg_sewa->barang->nama_barang}} ({{$length}} hari)
                </td>
                <td class="text-center">
                    {{$brg_sewa->qty}}
                </td>
                <td class="text-right">
                    {{$brg_sewa->harga}}
                </td>
            </tr>
            @endforeach

            <tr class="total text-right">
                <td></td>
                <td></td>
                <td>
                    Total: {{$total_harga}}
                </td>
            </tr>
        </table>
</div>
    </div>
<div class="col-lg-6">
    <div class="invoice-box">
        <div class="row justify-content-center">
            <h4>
                <b>BUKTI PEMBAYARAN</b>
            </h4>
            <img src="{{ URL::asset('assets/images/berkas_pembayaran/' . $verif->bukti_pembayaran) }}" class="img-fluid m-t-40" />
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <div>
                <textarea id="deskripsi" class="form-control" rows="5" name="deskripsi" readonly>{{ $verif->keterangan }}</textarea>
            </div>
        </div>
        <div class="inblock" >
            <form action="{{ route('verif.approved', $verif ) }}"  method="POST" >
                @csrf
                <button type="submit" class="btn btn-success" >
                    <span>Approved</span>
                </button>
            </form>
        </div>
        <div class="inblock" >
            <form action="{{ route('verif.decline', $verif ) }}"  method="POST" >
                @csrf
                <button type="submit" class="btn btn-danger" >
                    <span>Decline</span>
                </button>
            </form>
        </div>
    </div>

</div>
</div>


@endsection
