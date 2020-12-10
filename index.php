<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>select Table</title>
</head>

<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Nama Produk</td>
            <td>Harga</td>
            <td>Aksi</td>
        </tr>
        <?php
        include "koneksi.php";

        $query = "select * from product";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["product_nama"]; ?></td>
                    <td><?php echo $row["harga"]; ?></td>
                    <td><img class="gmbr" src="<?php echo $row["lokasi_foto"]; ?> "></td>
                    <td>
                        <a href="editForm.php?id=<?php echo $row["id"]; ?>">EDIT</a>
                        <a href="hapus.php?id=<?php echo $row["id"]; ?>">DELETE</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>
</body>

</html>