<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DROPBOX</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">

    @yield("head")

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include("parts.navigation")

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include("parts.topbar")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">@yield("subtitle")</h1>
                    @yield("content")

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>THEMANSION DROPBOX WEBVERSION v0.1 &copy; 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    {{-- <script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Page level custom scripts -->
    {{-- <script src="{{ url("js/demo/chart-area-demo.js") }}"></script>
    <script src="{{ url("js/demo/chart-pie-demo.js") }}"></script> --}}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $("#ambil_barang_form").keypress(function(e) {
                if (e.which == 13) {
                    $("#ambil_barang").trigger('click');
                }
            });
            $("#ambil_barang").click(function() {
                Swal.showLoading()
                let thisId = $("#ambil_barang_form").val();
                $.post("{{ route('item.check') }}", {
                    id: thisId
                }, function(result) {
                    Swal.hideLoading()
                    if (result.success) {
                        Swal.fire({
                            title: 'Pengambilan Barang',
                            html: `<table class="table">
                                        <tr>
                                            <td>Unit</td>
                                            <td>:</td>
                                            <td>${result.data.unit}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pengirim</td>
                                            <td>:</td>
                                            <td>${result.data.nama_pengirim}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penerima</td>
                                            <td>:</td>
                                            <td>${result.data.nama_penerima}</td>
                                        </tr>
                                        <tr>
                                            <td>No Resi</td>
                                            <td>:</td>
                                            <td>${result.data.no_resi}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Logistik</td>
                                            <td>:</td>
                                            <td>${result.data.nama_logistik}</td>
                                        </tr>
                                        <tr>
                                            <td>No Loker</td>
                                            <td>:</td>
                                            <td>${result.data.no_loker}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Terima Barang</td>
                                            <td>:</td>
                                            <td>${result.data.created_at}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Ambil Barang</td>
                                            <td>:</td>
                                            <td>${result.data.take_date || "-"}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Pengambilan</td>
                                            <td>:</td>
                                            <td>${result.data.is_take == 1 ? "Sudah" : "Belum"} Diambil</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pengambil</td>
                                            <td>:</td>
                                            <td>${result.data.nama_pengambil || "-"}</td>
                                        </tr>
                                    </table>`,
                            showCancelButton: true,
                            showConfirmButton: result.data.is_take != 1,
                            cancelButtonText: "Tutup",
                            input: result.data.is_take == 1 ? false : 'text' ,
                            showLoaderOnConfirm: true,
                            inputAttributes: {
                                placeholder: "Nama Pengambil Barang"
                            },
                            preConfirm: (input) => {
                                if (input.length == 0) {
                                    Swal.showValidationMessage(
                                        `Nama Wajib Diisi`
                                    )
                                } else {
                                    // Build formData object.
                                    let formData = new FormData();
                                    formData.append('_token', '{{ csrf_token() }}');
                                    formData.append('id', thisId);
                                    formData.append('nama_pengambil', input);

                                    return fetch(`{{ route('item.take') }}`, {
                                            method: "POST",
                                            body: formData
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error(response
                                                    .statusText)
                                            }
                                            return response.json()
                                        })
                                        .catch(error => {
                                            Swal.showValidationMessage(
                                                `Request failed: ${error}`
                                            )
                                        })
                                }
                            },
                            confirmButtonText: 'Ambil',
                            allowOutsideClick: () => !Swal.isLoading()
                        }).then((result) => {
                            console.log(result.value);
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire(
                                    'Sukses!',
                                    'Berhasil memproses status!',
                                    'success'
                                )
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data tidak ditemukan!'
                        })
                    }
                })
            })
        })
    </script>

    @yield("footer")

</body>

</html>
