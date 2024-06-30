@extends('layout.admin_main')
@section('body')

<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
@if ($message = Session::get('Success') )
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif

<section class="section dashboard">
    <!-- Table with hoverable rows -->
    <table class="table table-striped " id="data-table" style="width:100%" >
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tempat, Tanggal Lahir</th>
                <th scope="col">Posisi yang dilamar</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Datatables
            $('#data-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('data') }}",
                "columns": [
                { "data": 'DT_RowIndex', "searchable": false, "orderable": false},
                { "data": "nama" },
                { "data": "tempat_tgllahir" },
                { "data": "posisi" },
                // Tambahkan kolom lain di sini jika perlu
                { "data": "action", "searchable": false, "orderable": false }
                ]
            });

        });


    </script>


    @endsection
