<?php
    include "koneksi.php";

    $id=$_GET['id'];
    $query = "delete from product where id='$id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Data berhasil dihapus";
?>
<a href="homeCRUD2.php">Lihat data</a>
<?php
    } else {
        echo "Data gagal dihapus" . mysqli_error($connect);
    }
?>