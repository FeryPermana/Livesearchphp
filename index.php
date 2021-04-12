<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Data Siswa</title>
    <style>
        #loading {
            width: 35px;
            height: 35px;
            border: solid 5px whitesmoke;
            border-top-color: salmon;
            border-radius: 100%;
            display: none;
            animation: putar 2s linear infinite;
        }

        @keyframes putar {
            from {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(360deg)
            }
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        DATA SISWA
                    </div>
                    <div class="card-body">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" name="keyword" type="search" id="keyword" placeholder="Search" aria-label="Search">
                            <div id="loading"></div>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">JURUSAN</th>
                                </tr>
                            </thead>
                            <tbody id="table">
                                <?php
                                include('koneksi.php');
                                $no = 1;
                                $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['nim'] ?></td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo $row['jurusan'] ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script>
            var keyword = document.getElementById('keyword');
            var table = document.getElementById('table');
            var loading = document.getElementById('loading');

            keyword.addEventListener('keyup', function() {
                loading.style.display = "block";
                // buat objec ajax
                var xhr = new XMLHttpRequest();

                // cek kesiapan ajax
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        table.innerHTML = xhr.responseText;
                        loading.style.display = "none";
                    }
                }

                // eksekusi ajax
                xhr.open('GET', 'http://localhost/medium/search.php?keyword=' + keyword.value, true);
                xhr.send();

            });
        </script>
</body>

</html>