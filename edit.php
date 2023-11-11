<?php

  include("db.php");

  //Sending data to edit
  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query="SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
      $row= mysqli_fetch_array($result);
      $title=$row['title'];
      $description=$row['description'];

    }
  }

  //Updating data
  if (isset($_POST['update'])) {
    $id=$_GET['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    $query="UPDATE task set title='$title', description = '$description' WHERE id=$id";
    mysqli_query($conn, $query);
    
    $_SESSION['message']='Task updated successfully';
    $_SESSION['message_type']='primary';
    header("Location: index.php");
  }

?>

<!-- HTML for edition -->

<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">
          <div class="form-group">
            <input type="text" name="title" value="<?php echo $title; ?>" id="" class="form-control" placeholder="Update title">
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Update description"><?php echo $description; ?></textarea>
          </div>
          <button class="btn btn-success" name="update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>