<?php include('includes/header.php'); ?>
<?php
    $id = $_GET['id'];
    // Create DB Oject
    $db = new Database();

    // Create Query
    $query = "select * from categories where id = ".$id;
    // Run Query
    $category = $db->select($query)->fetch_assoc();
?>

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
            $query = "UPDATE categories SET name = '$name' WHERE id = ".$id;

            $update_row = $db->update($query);
        }
    }

?>

<!-- Deleting Category -->
<?php
    if(isset($_POST['delete'])){
        $query = "DELETE from categories where id = ".$id;
        $delete_row = $db->delete($query);
    }

?>
<form role="form" action="edit_category.php?id=<?php echo $id ?>" method="post">
    <div class="form-group">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $category['name']; ?>">
    </div>

    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete"/>
    </div>
    <br>
</form>

<?php include('includes/footer.php'); ?>