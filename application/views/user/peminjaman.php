<!DOCTYPE html>                                                             
<html>
<head>
    <link rel="icon" href="<?= base_url("assets/img/logo.png") ?>" type="image/png">
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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url('assets/img/bank-bantul1.jpg'); ?>');
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
                    <h1 class="heading"><img src="<?= base_url("assets/img/d199db6c-03df-41a8-b1f8-d3c5bb0263a9.png") ?>">Bukunet</h1>
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
                        <li class="breadcrumb-item"><a href="<?= base_url("bukunet") ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url("buku") ?>">Buku</a></li>
                        <li class="breadcrumb-item active text-primary">Pinjam</li>
                    </ol>    
                </div>
            </div>
        </div>
    </div>
    <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="card border-0">
                        <?php foreach ($users as $user): ?>
                            
                        <?php endforeach ?>
                         <form action="<?= base_url('peminjaman/simpan') ?>" method="post">
                            <input type="hidden" name="judul" value="<?= ($buku->judul) ?>">

                            <label>Nama Peminjam:</label>
                            <input type="text" value="<?= ($user->nama) ?>" readonly><br>

                            <label>Judul Buku:</label>
                            <input type="text" value="<?= ($buku->judul) ?>" readonly><br>

                            <label>Tanggal Pinjam:</label>
                            <input type="text" value="<?= date('Y-m-d') ?>" readonly><br>

                            <label>Tanggal Kembali:</label>
                            <input type="text" value="<?= date('Y-m-d', strtotime("+7 days")) ?>" readonly><br>

                            <button type="submit">Pinjam</button>
                        </form>
                    </div>
                </div>
            </main>
<!-- <?php foreach($buku as $b): ?>
<div class="modal fade" id="preview<?= $b->id ?>" tabindex="-1" role="dialog" aria-labelledby="previewLabel" aria-hidden="true">
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
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('peminjaman/form/' . $b->id) ?>" class="btn btn-primary">Pinjam</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?> -->

    <!-- Modal -->
    <div class="moda fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
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
    <!-- modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-lablelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Preview</h5>
                    <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1><?= $post_todolist->title ? html_escape($post_todolist->title) : "No Title" ?></h1>
                    <p><?= $post_todolist->content?></p>
                </div>
                <div class="modal-footer">
                    Di upload pada <?= $post_todolist->created_at ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahTodolist" tabindex="-1" aria-labelledby="tambahTodoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambhTodoLabel">Tulis To Do List</h5>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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