<?php 
$keyword = $_GET["keyword"];
?>
<table class="table table-bordered">
    <tbody id="table">
        <?php
        include('koneksi.php');
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM mahasiswa 
            WHERE 
            nim LIKE '%$keyword%' OR 
            nama LIKE '%$keyword%' OR 
            jurusan LIKE '%$keyword%'");
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