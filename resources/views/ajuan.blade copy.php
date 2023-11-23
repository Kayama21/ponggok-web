@extends('index')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Ajuan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Ajuan</li>
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
                        <a type="button" id="reload-button"><ion-icon name="reload" size="small"></ion-icon></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableRequests" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Dokumen yang diajukan</th>
                                    <th>NIK</th>
                                    <th>Nama pengaju</th>
                                    <th>Email</th>
                                    <th>No. WA</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data ditampilkan pake JQuery di bawah -->
                            </tbody>
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
    $(document).ready(function() {

        var tableRequests = $('#tableRequests').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            ajax: {
                url: '/ajuan-table',
                type: 'get',
                dataSrc: 'data'
            },
            columns: [{
                    data: 'kategoriSurat'
                },
                {
                    data: 'namaPengaju'
                },
                {
                    data: 'nik'
                },
                {
                    data: 'email'
                },
                {
                    data: 'wa'
                },
                {
                    data: 'created_at',
                    render: function(data, type, row) {
                        var date = new Date(data);
                        return date.toLocaleString();
                        return data;
                    }
                },
                {
                    data: 'statusSurat',
                    render: function(data, type, row) {
                        if (data === 0) {
                            return 'Proses Verifikasi';
                        } else if (data === 1) {
                            return 'Proses Tanda Tangan Lurah';
                        } else if (data === 2) {
                            return 'Proses Finalisasi';
                        } else if (data === 3) {
                            return 'Proses Selesai';
                        } else {
                            return 'Proses ajuan ditolak'
                        }
                    }
                },
                {
                    data: 'statusSurat',
                    render: function(data, type, row) {
                        if (data === 0) {
                            return '<a class="btn btn-primary" data-id="' + row.id + '" href="ajuan/verifikasi/' + row.id + '" >Verifikasi</a>';
                        } else if (data === 1) {
                            return '<a class="btn btn-secondary" data-id="' + row.id + '" href="ajuan/signature/' + row.id + '" >Tanda Tangan</a>';
                        } else if (data === 2) {
                            return '<a class="btn btn-success" data-id="' + row.id + '" href="ajuan/kirim-email/' + row.id + '" >Kirim Berkas</a>';
                        } else {
                            return '';
                        }
                        return data;
                    }
                }
            ]
        });

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 3000
        });

        $("#reload-button").click(function() {
            tableRequests.ajax.reload(function(json) {
                // Success callback
                Toast.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Refresh List ajuan berhasil'
                });
            }, function(error) {
                // Error callback
                Toast.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Refresh List ajuan gagal'
                });
            });
        });

    });
</script>
@endsection('script')