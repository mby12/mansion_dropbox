@extends("master")

@section('subtitle', 'Report')

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('content')
    {{ $dataTable->table() }}

@endsection

@section('footer')
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    {{ $dataTable->scripts() }}

@endsection
