<?php  
    $conn = mysqli_connect("localhost", "root", "", "ia21b2crud");

    if(isset($_POST['addStudent'])){
        $name = $_POST['name'];
        $city = $_POST['city'];

        $insertQuery = "INSERT INTO students (`name`, `city`) VALUES ('$name', '$city')";
        $insert = $conn->query($insertQuery);

        if($insert){
            echo "<script>alert('student added successfully')</script>";
        } else {
            echo "<script>alert('student not added')</script>";
        }
    }

    $selectQuery = "SELECT * FROM students";
    $select = $conn->query($selectQuery);
?>

<h2>Add Student</h2>
<form action="" method="post">
    <input type="text" placeholder="Student Name" name="name" required>
    <br><br>
    <input type="text" placeholder="Student City" name="city" required>
    <br><br>
    <button type="submit" name="addStudent">Add Student</button>
</form>

<table>
    <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Student City</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $select->fetch_object()){ ?>
        <tr>
            <td><?= $row->id; ?></td>
            <td><?= $row->name; ?></td>
            <td><?= $row->city; ?></td>
            <td>
                <a href="./d15 - crud.php?editId=<?= $row->id; ?>">Edit</a>
                <a href="./d15 - crud.php?deleteId=<?= $row->id; ?>" onclick="return confirm('Do you really want to delete the student?')" >Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php  
    if(isset($_GET['editId'])){
        $editId = $_GET['editId'];
        $selectEditQuery = "SELECT * FROM students WHERE id = $editId";
        $selectEdit = $conn->query($selectEditQuery);
        $editRow = $selectEdit->fetch_object();

        if(isset($_POST['editStudent'])){
            $name = $_POST['name'];
            $city = $_POST['city'];

            $updateQuery = "UPDATE students SET `name` = '$name', `city` = '$city' WHERE id = $editId";
            $update = $conn->query($updateQuery);

            if($update){
                echo "<script>alert('student updated successfully')</script>";
                echo "<script>window.location.href = './d15 - crud.php'</script>";
            } else {
                echo "<script>alert('student not updated')</script>";
            }
        }
?>
    <h2>Edit Student</h2>
    <form action="" method="post">
        <input type="text" placeholder="Student Name" name="name" required value="<?= $editRow->name ?>">
        <br><br>
        <input type="text" placeholder="Student City" name="city" required value="<?= $editRow->city ?>">
        <br><br>
        <button type="submit" name="editStudent">Edit Student</button>
        <a href="./d15 - crud.php">Back</a>
    </form>
<?php
    }
?>

<?php  
    if(isset($_GET['deleteId'])){
        $deleteId = $_GET['deleteId'];
        $deleteQuery = "DELETE FROM students WHERE id = $deleteId";
        $delete = $conn->query($deleteQuery);

        if($delete){
            echo "<script>alert('student deleted successfully')</script>";
            echo "<script>window.location.href = './d15 - crud.php'</script>";
        } else {
            echo "<script>alert('student not deleted')</script>";
        }
    }
?>