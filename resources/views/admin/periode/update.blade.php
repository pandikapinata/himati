@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card">
			<div class="card-body">
                <h2 class="font-light text-muted text-center" >
                    Form Edit Periode HMTI
                </h2>
                <h6 class="subtitle m-t-20 text-center">
                    Masukkan Periode HMTI
                </h6>
                <form class="form-material m-t-40" action="{{ route('period.update', 1) }}" method="POST">
                <div class="modal-body">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Nama Kabinet</label>
                        <input id="kabinet" type="text" class="form-control" name="kabinet" value="{{ $periods->kabinet }}" autofocus>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Periode Awal</label>
                        <input id="period_awal" class="form-control" type="text" name="period_awal" value="{{ $periods->period_awal }}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Periode Akhir</label>
                        <input id="period_akhir" class="form-control" type="text" name="period_akhir" value="{{ $periods->period_akhir }}">
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-outline-success">Submit</button>
                    </div>
                </div>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
