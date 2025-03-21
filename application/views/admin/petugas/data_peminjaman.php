<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <link rel="icon" href="https://freeiconshop.com/wp-content/uploads/edd/list-flat.png" type="image/png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/bootstrap/") ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100" style="background: linear-gradient(45deg, rgba(0, 255, 255, 0.2), rgba(255, 255, 255, 0.2), rgba(152, 255, 152, 0.2));">
                <div class="sidebar-logo">
                    <a href="#">Aps To Do List</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Menu
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= base_url('petugas') ?>" class="sidebar-link"><i class="fa-solid fa-home pe-2"></i>Overview</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= site_url('databuku') ?>" class="sidebar-link collapsed" data-bs-target="#pages"
                            aria-expanded="false"><i class="fa-solid fa-ticket pe-2"></i>
                            Data Buku
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= site_url('datapeminjaman') ?>" class="sidebar-link collapsed" data-bs-target="#auth" 
                            aria-expanded="false"><i class="fa-solid fa-list pe-2"></i>
                            Data Peminjaman
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Setting
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="<?= base_url('login'); ?>" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('login/logout'); ?>" class="sidebar-link">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="https://e7.pngegg.com/pngimages/527/663/png-clipart-logo-person-user-person-icon-rectangle-photography.png" class="avatar img-fluid rounded-circle" alt="">
                            </a>
                            <div class="dropdown-menu p-2 text-muted dropdown-menu-end" style="text-align: center;">
                                <img src="https://e7.pngegg.com/pngimages/527/663/png-clipart-logo-person-user-person-icon-rectangle-photography.png" class="avatar img-fluid rounded-circle" alt="" style=" position: center;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $this->session->userdata('user'); ?></h5>
                                    <p class="card-text"><?php //echo $this->session->userdata('role'); ?></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
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
                                        <th scope="col">Id petugas</th>
                                        <th scope="col">Buku</th>
                                        <th scope="col">Tanggal pinjam</th>
                                        <th scope="col">Tanggal kembali</th>
                                        <th scope="col">Denda</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($peminjaman as $b): ?>
                                    <tr>
                                        <td>
                                            <?=$no++?>
                                        </td>
                                        <td>
                                            <div><?= $b->id_petugas ?></div>
                                        </td>
                                        <td>
                                            <div><?= $b->buku ?></div>
                                        </td>
                                        <td>
                                            <div class="text-gray"><small><?= date('Y-m-d', strtotime($b->tanggal_pinjam)) ?><small></div>
                                        </td>
                                        <td>
                                            <div class="text-gray"><small><?= $b->tanggal_kembali ?><small></div>
                                        </td>
                                        <td>
                                            <div class="text-gray">
                                                <small>
                                                    <?php  
                                                        $tgl1=new DateTime(date("Y-m-d"));
                                                        $tgl2=new DateTime($b->tanggal_kembali);
                                                        if ($tgl1>$tgl2) {
                                                            $selisih= $tgl1->diff($tgl2);
                                                            echo $selisih->days*5000;
                                                        }
                                                        else
                                                        {
                                                            echo 0;
                                                        }
                                                    ?>
                                                <small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-gray"><small><?= $b->status ?><small></div>
                                        </td>
                                        <td>
                                            <div class="action">
                                                <a  class="btn btn-success" role="button" data-toggle="modal" data-target="#edit<?= $b->id ?>">
                                                    Kembalikan
                                                </a>
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
            <?php $no=1; foreach($peminjaman as $b): ?>
                <div class="modal fade" id="edit<?= $b->id ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1>Kemballikan Buku</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <form action="<?= base_url("editform/").$b->id?>" method="post"> 
                                    <?php  
                                        $tgl1=new DateTime(date("Y-m-d"));
                                        $tgl2=new DateTime($b->tanggal_kembali);
                                        $selisih_hari="";
                                        if ($tgl1>$tgl2) {
                                            $selisih= $tgl1->diff($tgl2);
                                            $selisih_hari=$selisih->days*5000;
                                        }
                                        else
                                        {
                                            echo 0;
                                        }
                                    ?>
                                    <input type="" name="denda" value="<?= $selisih_hari ?>">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <button type="submit" class="btn btn-primary btn-sm">Kembalikan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Aps version 1.0</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/bootstrap/") ?>js/script.js"></script>

    <!-- //jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- //datatable -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
        var table = $('#myTable').DataTable({
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });

        // Tambahkan elemen input untuk filter tanggal
        $("#myTable_wrapper").prepend(
            '<div class="row mb-3">' +
            '    <div class="col-md-3">' +
            '        <label for="startDate">Tanggal Awal:</label>' +
            '        <input type="date" id="startDate" class="form-control">' +
            '    </div>' +
            '    <div class="col-md-3">' +
            '        <label for="endDate">Tanggal Akhir:</label>' +
            '        <input type="date" id="endDate" class="form-control">' +
            '    </div>' +
            '    <div class="col-md-3">' +
            '        <button id="filterBtn" class="btn btn-primary mt-4">Filter</button>' +
            '    </div>' +
            '</div>'
        );

        // Filter Tanggal
        $('#filterBtn').click(function () {
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();

            if (startDate && endDate) {
                table.draw();
            } else {
                alert('Pilih rentang tanggal terlebih dahulu!');
            }
        });

        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = $('#startDate').val();
                var max = $('#endDate').val();
                var date = data[3] || ''; // Kolom tanggal pinjam

                if (!min || !max) {
                    return true;
                }

                if (date >= min && date <= max) {
                    return true;
                }
                return false;
            }
        );
    });
	</script>

    <?php if($this->session->flashdata('success')): ?>
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
                title: '<?= $this->session->flashdata('success') ?>'
            })
        </script>
    <?php endif; ?>
</body>

</html>
