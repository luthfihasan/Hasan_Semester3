<!-- Header -->
<?php include "../header.php" ?>

<?php
// checking if the variable is set or not and if set adding the set data value to variable userid
if (isset($_GET['survei_id'])) {
    $surveiid = $_GET['survei_id'];
}   

// SQL query to select all the data from the table where id = $userid
$query = "SELECT * FROM survei WHERE id_survei = $surveiid ";
$view_survei = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($view_survei)) {
    $id = $row['id_survei'];
    $icon = $row['icon'];
    $judul = $row['judul'];
    $link = $row['link'];
   
}

//Processing form data when form is submitted
if (isset($_POST['update'])) {
    // $icon = $_POST['icon'];
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $icon = $_FILES['icon']['name'];
    $tmp = $_FILES['icon']['tmp_name'];

$fotobaru = date('dmYHis').$icon;
// Set path folder tempat menyimpan fotonya
    $path = "images/".$fotobaru;

if(move_uploaded_file($tmp, $path)){
    $query = "UPDATE survei SET icon = '{$fotobaru}' ,judul = '{$judul}' , link = '{$link}' WHERE id_survei = $surveiid";
    $update_user = mysqli_query($conn, $query);

//dispaying proper message for the user to see wheter the query excuted perfectly or not
if (!$update_user ) {
    echo "something went wrong ". mysqli_error($conn);
    
}else{
   
    echo "<script type='text/javascript'>alert('Mengedit Data Berhasil')</script>";
    }
}
}
// SQL query to update the data in user table where the id = $userid 
    // $query = "UPDATE survei SET icon = '{$fotobaru}' ,judul = '{$judul}' , link = '{$link}' WHERE id_survei = $surveiid";
    // $update_user = mysqli_query($conn, $query);

    // echo "<script type='text/javascript'>alert('Mengedit Data Berhasil')</script>";
    // }
?>

<h1 class="text-center">Update Survei Details</h1>

<div class="container ">

    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="file" name="icon" class="form-control" value="<?php echo $fotobaru ?>">

    </div>
    
    <div class="form-group">
        <label for="judul">Judul Survei</label>
        <input type="text" name="judul" class="form-control" value="<?php echo $judul ?>">
    </div>
    <!-- <small id="emailHelp" class="form-text text-muted">
        We'll never share your email with anyone else.
    </small> -->

    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" name="link" class="form-control" value="<?php echo $link ?>">
    </div>

    <div class="form-group">
        <input type="submit" name="update" class="btn  btn-primary mt-2" value="Update">
    </div>
</form>
</div>

<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Back 
    </a>
<div>

<!-- Footer -->
<?php include "../footer.php" ?>      