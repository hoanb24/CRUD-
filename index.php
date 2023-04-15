<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        th,
        td {
            text-align: center;
        }

        th {
            font-weight: bold;
        }

        img {
            max-height: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Product Table</h1>
        <a href="A_Updt.php?add=add"><button class="btn btn-success"> ADD</button></a>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Discount</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connectdata.php');
                $sql = "SELECT * FROM product;";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['pname'] ?></td>
                            <td><?php echo $row['category'] ?></td>
                            <td><?php echo $row['discount'] ?></td>
                            <td><?php echo $row['pdescription'] ?></td>
                            <td>
                                <a href="A_Updt.php?add=up&&id=<?php echo $row['id']; ?>">Update</a><br>
                                <a href="deletep.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php }
                } ?>
                <!-- Add more rows here -->
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>