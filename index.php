<?php
include "db_conn.php";

// to display recoed in a single page.
$recordsPerPage = 5;

// get current page.
if (isset($_GET['page'])) {
    // $currentPage = $_GET['page'];
} else {
    $currentPage = 2;
}

// calculate offset for the query.
$offset = ($currentPage - 1) * $recordsPerPage;

// query to fetch records with pagination
$sql = "SELECT * FROM `test` LIMIT $offset, $recordsPerPage";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>

<body>
    <style>
        .navbar {
            background-color: #00ff5573;
            border-radius: 8px;
            padding: 10px;

        }
    </style>

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        PHP Complete CRUD Application
    </nav>

    <form action="bulkdelete.php" method="POST">
        <div class="container">
            <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            }
            ?>
            <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
            <!-- <a href="bulkdelete.php" value="submit" class="btn btn-dark mb-3">Delete</a> -->
            <button type="submit" value="submit" class="btn btn-dark mb-3">Delete</button>
            <!-- <input type="submit" value="submit"  class="btn btn-dark mb-3"> -->
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // $sql = "SELECT * FROM `test`";
                    // $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="delete[]" value="<?php echo $row["id"] ?>"></td>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["first_name"] ?></td>
                            <td><?php echo $row["last_name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["gender"] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>