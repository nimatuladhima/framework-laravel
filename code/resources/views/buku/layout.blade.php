<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light sticky-top mb-3" style="background-color: #2596be;">
        <div class="container">
          <a class="navbar-brand">CRUD Laravel</a>
        </div>
      </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer class="fixed-bottom bg-dark text-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Created by &copy; Ahmad Fikri Husaini</span>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.confirm').click(function () {
            var id = $(this).attr('data-id')
            var judul = $(this).attr('data-judul')
            Swal.fire({
                title: 'Confirmasi',
                text: "apakah anda yakin menghapus data dengan id = " + id + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete/"+id
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data Berhasil Di Hapus!!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        })
        $(document).ready(function () {
            $(document).on('click', '#detail', function () {
                var judul = $(this).attr('data-judul')
                var penulis = $(this).attr('data-penulis')
                var penerbit = $(this).attr('data-penerbit')
                var tahun = $(this).attr('data-tahun')
                var cover = '/image/'+$(this).attr('data-cover')
                $('#judul').text(judul)
                $('#penulis').text(penulis)
                $('#penerbit').text(penerbit)
                $('#tahun').text(tahun)
                $("#cover").attr("src", cover);
                console.log('/image/'+cover);
            })
        })
    </script>
</body>
</html>