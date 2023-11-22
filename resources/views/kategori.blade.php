@extends('index')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Document Kategori</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Document Kategori</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/kategori/page-add" type="button" class="btn btn-primary">Tambah Kategori</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableCategories" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:70%">Document Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $k)
                                <tr>
                                    <td>{{ $k->kategoriSurat }}</td>
                                    <td>
                                        <a href="/kategori/page-update/{{$k->id}}" type="button" class="btn btn-secondary" style="margin-right: 10px;">Update</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/kategori/destroy/'.$k->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                        >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                    <th>Document Name</th>
                                </tr> -->
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script')
<script>
    $(function() {
        $('#tableCategories').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection('script')