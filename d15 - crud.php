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
                <a href="./d15 - crud.php?deleteId=<?= $row->id; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>