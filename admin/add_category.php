<?php include('includes/header.php'); ?>

<?php
    // Create DB Oject
    $db = new Database();

    if(isset($_POST['submit'])){
        // Assign the variables
        $name = mysqli_real_escape_string($db->link, $_POST['name']);

        // Simple Validation
        if ($name == ''){
            // Set error
            $error = "Please fill all fields!!!";
        }else{
            $query = "INSERT INTO categories (name) VALUES('$name')";

            $insert_row = $db->insert($query);
        }
    }

?>

<form role="form" action="add_category.php" method="post">
    <div class="form-group">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control" placeholder="Enter Category">
    </div>

    <div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
    <br>
</form>

<?php include('includes/footer.php'); ?>