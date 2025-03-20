<!DOCTYPE html>                                                             
<html>
<head>
    <link rel="icon" href="<?= base_url("assets/img/logo perpus.png") ?>" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukunet</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet">
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- icon font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .bg-breadcrumb {
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('<?= base_url('assets/img/perpus.jpg'); ?>');
            background-position: center top;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 120px 0 60px 0;
            transition: 0.5s;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0 pt-2">
                    <h1 class="heading"><img src="<?= base_url("assets/img/logo perpus.png") ?>">Bukunet</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                    <!-- mode mobile -->
                    <div class="d-block d-lg-none my-2">
                        <?php if ($this->session->userdata('username')): ?>
                            <!-- Menampilkan avatar jika user sudah login, dan membuka modal profil -->
                            <img src="https://e7.pngegg.com/pngimages/527/663/png-clipart-logo-person-user-person-icon-rectangle-photography.png" alt="" class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px; border-radius: 50%;">
                            <div class="dropdown-menu dropdown-menu-end card-body" aria-labelledby="dropdownMenuButton1">
                                <h5 class="card-title"><?php echo $this->session->userdata('username'); ?></h5> 
                                <h5 class="card-title">(<?php echo $this->session->userdata('bagian'); ?>)</h5>
                                <p class="card-text"><?php echo $this->session->userdata('role'); ?></p>
                                <a href="<?= base_url('profile/edit'); ?>" class="btn btn-primary" data-toggle="modal" data-target="#editpp">Edit Profil</a>
                                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-secondary">Logout</a>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        <?php else: ?>
                            <!-- Menampilkan tombol login jika user belum login -->
                            <a href="<?= base_url("userlogin") ?>" class="btn rounded-pill d-inline-flex flex-shrink-0 py-2 px-4" style="background-color: #00d084; color: white;">Log In</a>
                        <?php endif; ?>
                    </div>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?= base_url("bukunet") ?>" class="nav-item nav-link">Home</a>
                        <a href="<?= base_url("buku") ?>" class="nav-item nav-link active">Buku</a>
                        <a href="<?= base_url("peminjaman") ?>" class="nav-item nav-link">Peminjaman</a>
                        <a href="" class="nav-item nav-link" data-toggle="modal" data-target="#contactModal">Contact</a>
                    </div>
                    <!-- mode desktop -->
                    <div class="d-none d-lg-block">
                        <?php if ($this->session->userdata('email')): ?>
                            <?php foreach($users as $image): ?>
                            <img src="<?= base_url('uploads/'.$image->avatar) ?>" class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px;border-radius: 50%;">
                            <div class="dropdown-menu dropdown-menu-end card-body" aria-labelledby="dropdownMenuButton1">
                                <img src="<?= base_url('uploads/'.$image->avatar) ?>" class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px; border-radius: 50%;">
                                <h5 class="card-title"><?php echo $this->session->userdata('nama'); ?></h5> 
                                <h5 class="card-title">(<?php echo $this->session->userdata('email'); ?>)</h5>
                                <p class="card-text"><?php echo $this->session->userdata('role'); ?></p>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editpp">Edit Profil</a>
                                <a href="<?= base_url('user/users/logout'); ?>" class="btn btn-secondary">Logout</a>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Menampilkan tombol login jika user belum login -->
                            <a href="<?= base_url("userlogin") ?>" class="btn rounded-pill d-inline-flex flex-shrink-0 py-2 px-4" style="background-color: #FFD700; color: white;">Log In</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
            </nav>     
            <!-- program -->
            <!-- Header Start -->
            <div class="container-fluid bg-breadcrumb">
                <div class="container text-center py-5" style="max-width: 900px;">
                    <h4 class="text-white display-4 mb-4 animate__animated" data-animation="animate__fadeInDown">Daftar Buku</h4>
                    <ol class="breadcrumb d-flex justify-content-center mb-0 animate__animated" data-animation="animate__fadeInDown">
                        <li class="breadcrumb-item"><a href="<?= base_url("staffapp") ?>">Home</a></li>
                        <li class="breadcrumb-item active text-primary">Daftar Buku</li>
                    </ol>    
                </div>
            </div>
        </div>
    </div>
    <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title text-center">
                                Basic Table
                            </h5>
                        </div>
                        <div class="card-body">
                            <div id="flash-message" data-message="<?= $this->session->flashdata('message') ?>"></div>
                            <table id="myTable" class="table table-striped ov" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">jumlah</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($buku as $b): ?>
                                    <tr>
                                        <td>
                                            <?=$no++?>
                                        </td>
                                        <td>
                                            <div><?= $b->gambar ?></div>
                                        </td>
                                        <td>
                                            <div><?= $b->judul ?></div>
                                        </td>
                                        <td>
                                            <div class="text-gray"><small><?= $b->jumlah ?><small></div>
                                        </td>
                                        <td>
                                            <div class="action">
                                                <a href="#" class="btn btn-warning" role="button"  data-toggle="modal" data-target="#preview<?= $b->id ?>">Preview</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php foreach($buku as $b): ?>
                <?php 
                // var_dump($b);
                    // Cek apakah buku sudah ada di koleksi user
                    $isInKoleksi = $this->M_koleksi->cek_koleksi($this->session->userdata('id'), $b->id);
                ?>
                <div class="modal fade" id="preview<?= $b->id ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Informasi Buku</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Penulis:</strong> <?= $b->penulis ?></p>
                                <p><strong>Penerbit:</strong> <?= $b->penerbit ?></p>
                                <p><strong>Tahun Terbit:</strong> <?= $b->tahun_terbit ?></p>
                                <!-- <p>
                                    <?php for ($i = 0; $i < 4 ; $i++): ?>
                                        <?php if ($i <= round($rata_rating[$i]["rating"])): ?>
                                            <span style="color: gold; font-size: 25px;">★</span>
                                        <?php else: ?>
                                            <span style="color: gray; font-size: 25px;">★</span>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    (<?= number_format($rata_rating[$i]["rating"], 2) ?> / 5)
                                </p> -->
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url('user/peminjaman/form/' . $b->id) ?>" class="btn btn-primary">Pinjam</a>
                                <!-- Tombol Simpan / Hapus Koleksi -->
                                <button class="toggle-koleksi" data-id="<?= $b->id ?>">
                                    <i class="fa <?= $isInKoleksi ? 'bi-bookmark-fill' : 'bi-bookmark'; ?>"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    <!-- Modal -->
    <div class="moda fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="ocntactModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Contact</h1>
                    <p>Hubungi kami melalui form berikut</p>
                    <form action="<?php echo site_url("user/dashboard/contact");?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<? echo $this->session->userdata('username') ?>" required />
                        </div>
                        <div class="form-group">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer mobile -->
    <footer class="footer_section d-block d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            StaffApp
                        </a>
                        <p>
                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde.
                        </p>
                        <div class="footer_social">
                            <a href="">
                                <i class="bi bi-whatsapp" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Working Hours
                    </h4>
                    <p>
                        Monday-Friday
                    </p>
                    <p>
                        07.30 Am -16.30 Pm
                    </p>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Contact Us
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href=""></a><br><br>
                    &copy; <span id="displayYear"></span> Distributed By
                    <a href="" target="_blank"></a>
                </p>
            </div>
        </div>
    </footer>

    <!-- footer desktop -->
    <footer class="footer_section d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Contact Us
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            StaffApp
                        </a>
                        <p>
                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde.
                        </p>
                        <div class="footer_social">
                            <a href="">
                                <i class="bi bi-whatsapp" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Working Hours
                    </h4>
                    <p>
                        Monday-Friday
                    </p>
                    <p>
                        07.30 Am -16.30 Pm
                    </p>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/"></a><br><br>
                    &copy; <span id="displayYear"></span> Distributed By
                    <a href="https://themewagon.com/" target="_blank"></a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#" class="btn btn-success btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url("assets/") ?>js/script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#myTable')) {
                $('#myTable').DataTable().destroy(); // Hapus DataTables yang sebelumnya
            }
            $('#myTable').DataTable({
                "language": {
                    "search": "Cari Buku:"
                }
            });
        });
    </script>

    <script>
        $(window).scroll(function () {
            var navbar = $('.navbar');
            if ($(window).scrollTop() > 50) {
                navbar.addClass('scrolled');
            } else {
                navbar.removeClass('scrolled');
            }
        });
    </script>
    <script>
        const backToTop = document.querySelector('.back-to-top');

        window.addEventListener('scroll', () => {
            if(window.scrollY > 0){
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });
        backToTop.style.display = 'none';
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Buat observer untuk memantau elemen saat masuk ke viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Tambahkan kelas animasi saat elemen terlihat
                        const animation = entry.target.getAttribute("data-animation");
                        entry.target.classList.add(animation);
                    }
                });
            }, {
                threshold: 0.1 // Hanya jalankan ketika 10% elemen terlihat
            });

            // Ambil semua elemen yang akan dianimasikan
            const elementsToAnimate = document.querySelectorAll(".animate__animated");

            elementsToAnimate.forEach((el) => {
                observer.observe(el); // Pantau setiap elemen
            });
        });
    </script>
    <script>
        function deleteConfirm(event){
            Swal.fire({
                title: 'Delete Confirmation!',
                text: 'Are you sure to delete the item?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes Delete',
                confirmButtonColor: 'red'
            }).then(dialog => {
                if(dialog.isConfirmed){
                    window.location.assign(event.dataset.deleteUrl);
                }
            });
        }
    </script>

    <script>
    $(document).ready(function() {
        $(".btn-pinjam").click(function(e) {
            e.preventDefault();

            let id_buku = $(this).data("id");
            let url_form_peminjaman = $(this).attr("href");

            $.ajax({
                url: "<?= base_url('tersimpan') ?>" + id_buku,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.status === "tersedia") {
                        // Jika tersedia, pindah ke halaman form peminjaman
                        window.location.href = url_form_peminjaman;
                    } else {
                        // Jika stok habis, tampilkan alert
                        alert(response.pesan);
                    }
                }
            });
        });
    });
    </script>

    <script>
        $(document).ready(function() {
            $(".toggle-koleksi").click(function() {
                var btn = $(this);
                var id_buku = btn.data("id");

                $.ajax({
                    url: "<?= base_url('tersimpan'); ?>",
                    type: "POST",
                    data: { id_buku: id_buku },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "added") {
                            btn.find("i").removeClass("bi-bookmark").addClass("bi-bookmark-fill");
                        } else if (response.status === "removed") {
                            btn.find("i").removeClass("bi-bookmark-fill").addClass("bi-bookmark");
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan, coba lagi nanti.");
                    }
                });
            });
        });
    </script>

    <?php if($this->session->flashdata('message')): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('message') ?>'
            })
        </script>
    <?php endif; ?>
</body>
</html>