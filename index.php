<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">


    <!-- Formulario -->
    <div class="col-md-4">

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type_1']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset(); } ?>

      <?php if (isset($_SESSION['message_alert'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type_2']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message_alert'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset(); } ?>
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Description"></textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
        </form>
      </div>
    </div>
    <!--Tabla-->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $query='SELECT * FROM task';
            $result_taks= mysqli_query($conn, $query);

            while($row=mysqli_fetch_array($result_taks)) { ?>
              <tr>
                <td> <?php echo $row['title'] ?></td>
                <td> <?php echo $row['description'] ?></td>
                <td> <?php echo $row['created_at'] ?></td>
                <td> 

                </td>
              </tr>

            <?php } ?>
        
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>