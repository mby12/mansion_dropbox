@extends("master")

@section('subtitle', 'Terima Barang')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-12">
                            @if (session('inputted'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success !</strong> {{ session('inputted') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('in.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Pilih Unit</label>
                                    <select required name="unit" class="custom-select select2">
                                        <option selected disabled>-- Unit Penerima --</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->room_no }}">{{ $unit->room_no }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Pengirim</label>
                                    <input required name="pengirim" type="text" class="form-control"
                                        placeholder="Nama Pengirim">
                                </div>
                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input required name="penerima" type="text" class="form-control"
                                        placeholder="Nama Penerima">
                                </div>
                                <div class="form-group">
                                    <label>No Resi</label>
                                    <input required name="no_resi" type="text" class="form-control"
                                        placeholder="Nomor Resi">
                                </div>
                                <div class="form-group">
                                    <label>Nama Logistik</label>
                                    <input required name="nama_logistik" type="text" class="form-control"
                                        placeholder="Nama Logistik">
                                </div>
                                <div class="form-group">
                                    <label>No Loker</label>
                                    <input required name="loker" type="text" class="form-control"
                                        placeholder="Nomor Loker">
                                </div>

                                <button type="submit" class="btn btn-block btn-success">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        })
    </script>
@endsection
