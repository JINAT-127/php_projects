<?php
include_once 'header.php';
if(isset($_POST['name'])){
  $obj->add_category($_POST['name']);
}
?>
<?php
include_once 'left_menu.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Category </h3>
            </div>
            <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">category List</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$list=$obj->get_category();
$i=1;
while ($row=$list->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $row['name'] ?></td>
                      <td>
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?category_edit=<?php echo $row['categoryID'] ?>" class="btn btn-xs btn-primary">Edit</a>
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?category_delete=<?php echo $row['categoryID'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <?php
if(isset($_GET['category_edit'])){
  ?>
<h1>Welcome</h1>
  <?php 
}
                ?>
              </div>
             
            </div>
          </div>
        </div>
        </div>
      </div>

    </div>
  </section>
</div>
<?php include_once 'footer.php'; ?>