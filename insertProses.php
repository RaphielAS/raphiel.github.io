<?php
    include "koneksi.php";

    $target_path = "uploads/";
    $nomor = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    
	if(!file_exists($target_path)) {
    	mkdir($target_path, 0755, true);
    	echo "The directory was created ";
	}

	$target_path = $target_path . basename(
    $_FILES['poto']['name']);
    $tmp_name = $_FILES['poto']['tmp_name'];

    $sql = "insert into product values
            ('$nomor', '$nama', '$harga', '$target_path')";

    
    if (mysqli_query($connect, $sql)) {
        if (move_uploaded_file($_FILES['poto']['tmp_name'], $target_path)) {
            echo "The file " . basename($_FILES['poto']['name'] . " has been uploaded<br>");
        }else{
            echo "There was an error uploading the file, please try again";
        }
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data gagal ditambahkan <br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
?>