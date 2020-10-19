<?php
require_once('connection.php');

if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stmt = $db->prepare("SELECT * FROM addsub WHERE id = :id");
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    // Delete an original record from db
    $delete_stmt = $db->prepare('DELETE FROM addsub WHERE id = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header('Location:show.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
      }

      li {
        float: left;
      }

      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      li a:hover:not(.active) {
        background-color: #111;
      }

      .active {
        background-color: #4CAF50;
      }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    
</head>

<body>
    <ul>
        <li><a class="active" href="show.php">Home</a></li>
        <li><a href="add.php">เพิ่มรายวิชา</a></li>
        <li><a href="logout.php">logout</a></li>
    </ul>

    <div class="container">
        <div class="display-3 text-center mb-3">Information</div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ชื่อวิชา</th>
                    <th>ชั้นปี</th>
                    <th>subject</th>
                    <th>Edit Name</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $select_stmt = $db->prepare("SELECT * FROM addsub");
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <tr>
                        <td><?php echo $row["firstname"]; ?></td>
                        <td><?php echo $row["lastname"]; ?></td>
                        <td><?php echo $row["subject_id"]; ?></td>
                        <td><a href="edit.php?update_id=<?php echo $row["id"]; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>



    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>