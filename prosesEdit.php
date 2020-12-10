<?php
    include "koneksi.php";

    $target_path = "uploads/";
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];

    if(!file_exists($target_path)) {
    	mkdir($target_path, 0755, true);
    	echo "The directory was created ";
    }
    
    $target_path = $target_path . basename(
    $_FILES['poto']['name']);
    $tmp_name = $_FILES['poto']['tmp_name'];

    $query= "update product set product_nama='$nama', harga='$harga', lokasi_foto='$target_path' where id='$id'";
    $result=mysqli_query($connect, $query);

    if ($result) {
        echo "Berhasil update data ";
        if (move_uploaded_file($_FILES['poto']['tmp_name'], $target_path)) {
            echo "The file " . basename($_FILES['poto']['name'] . " has been uploaded<br>");
        }else{
            echo "There was an error uploading the file, please try again";
        }
?>
<a href="homeCRUD.php">Lihat data</a>
<?php
    } else {
        echo "Gagal update data" . mysqli_error($connect);
    }
?>