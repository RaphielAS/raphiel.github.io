<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
</head>

<body>
    <?php
    include "koneksi.php";
    $id = $_GET['id'];
    $query = "select * from product where id='$id'";
    $result = mysqli_query($connect, $query);
    ?>
    <form enctype="multipart/form-data" action="prosesEdit.php" method="POST">
        <table>
            <?php
            while ($a = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td>Id: </td>
                    <td><input type="number" name="id" value="<?php echo $a['id']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama Product: </td>
                    <td><input type="text" name="nama" value="<?php echo $a['product_nama']; ?>" required></td>
                </tr>
                <tr>
                    <td>Harga: </td>
                    <td><input type="number" name="harga" value="<?php echo $a['harga']; ?>" required></td>
                </tr>
                <tr>
                    <td>Foto Barang: </td>
                    <td><input type="file" name="poto" required></td>
                </tr>
                <tr><td>Foto harus upload ulang</td></tr>
                <tr>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>

</html>