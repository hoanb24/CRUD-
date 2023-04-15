<?php
session_start();
$add = $_GET['add'];
if ($add != "add") {
    $id = $_GET['id'];
};
include('connectdata.php');
error_reporting(0);
?>
<html>
<link rel="stylesheet" href="style.css">

<body>


    <form method="POST" action="" enctype="multipart/form-data">
        <table>
            <?php if ($add != "add") {
                $sql = "SELECT * FROM product where id = $id;";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <tr>
                            <th> <label for="tenSP">Tên sản phẩm:</label></th>
                            <th> <input type="text" id="tenSP" name="tenSP" value="<?php echo $row['pname'] ?>" required><br></th>
                        </tr>
                        <tr>

                            <th> <label for="DanhMuc">Danh mục sản phẩm:</label></th>
                            <th> <input type="text" id="DanhMucSP" name="DanhMucSP" value="<?php echo $row['category'] ?>" required><br></th>
                        </tr>
                        <tr>
                            <th><label for="PTGiam">Phần trăm giảm giá:</label></th>
                            <th> <input type="number" id="PTGiam" name="PTGiam" min="0" max="100" value="<?php echo $row['discount'] ?>"><br></th>
                        </tr>
                        <tr>
                            <th> <label for="desc">Mô tả:</label></th>
                            <th><textarea id="desc" name="desc"><?php echo $row['pdescription']; ?></textarea><br></th>
                        </tr>

                <?php break;
                    }
                }
            } else {
                ?>
                <tr>
                    <th> <label for="tenSP">Tên sản phẩm:</label></th>
                    <th> <input type="text" id="tenSP" name="tenSP" value="<?php echo $row['pname'] ?>" required><br></th>
                </tr>
                <tr>

                    <th> <label for="DanhMuc">Danh mục sản phẩm:</label></th>
                    <th> <input type="text" id="DanhMucSP" name="DanhMucSP" value="<?php echo $row['category'] ?>" required><br></th>
                </tr>
                <tr>
                    <th><label for="PTGiam">Phần trăm giảm giá:</label></th>
                    <th> <input type="number" id="PTGiam" name="PTGiam" min="0" max="100" value="<?php echo $row['discount'] ?>"><br></th>
                </tr>
                <tr>
                    <th> <label for="desc">Mô tả:</label></th>
                    <th><textarea id="desc" name="desc"><?php echo $row['pdescription']; ?></textarea><br></th>
                </tr>
            <?php
            } ?>

        </table>
        <?php

        if ($add == "add") { ?>
            <input type="submit" name="add" value="ADD">
        <?php } else {
        ?>
            <input type="submit" name="update" value="UPDATE">
        <?php };
        ?>
        <?php
        error_reporting(0);


        if (isset($_POST["add"]) or isset($_POST["update"])) {
            $data = [
                $_POST["tenSP"],
                $_POST["DanhMucSP"],
                $_POST["PTGiam"],
                $_POST["desc"]
            ];
        }
        ?>
    </form>

    <?php
    error_reporting(0);
    if (isset($_POST['add'])) {
        $sql = "INSERT INTO product(pname, category, discount, pdescription) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
        $result = $mysqli->query($sql);
        var_dump($result);
        if ($result) {
            echo "Thanh cong";
            header("location:index.php");
        }
    } else if (isset($_POST['update'])) {
        $sql = "UPDATE product SET pname='$data[0]',category='$data[1]',discount='$data[2]',pdescription='$data[3]' WHERE id = $id;";
        $result = $mysqli->query($sql);
        if ($result) {
            echo "Thanh cong";
            header("location:index.php");
        }
    }
    ?>
</body>

</html>