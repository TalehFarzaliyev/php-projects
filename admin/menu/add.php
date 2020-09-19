<?php
  include '../config.php';
  include '../includes/head.php';
  include '../includes/header.php';
  include '../includes/nav.php';

  $select  = "SELECT * FROM menu where `status`=1";

  $rows    = mysqli_query($conn, $select);

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $name   = $_POST['name'];
    $parent = $_POST['parent'];
    $order  = $_POST['order'];
    $type   = $_POST['type'];
    $status = $_POST['status'];

    $sql    = "INSERT INTO menu(`name`,`parent_id`,`order`,`type`,`status`)
    values('$name',$parent,$order,$type,$status)";

    $query  = mysqli_query($conn,$sql);

    if($query)
    {
      header('Location: http://myblog.me/admin/menu.php?mod=index');    
    }
    else
    {
      echo $sql;
    }
  }



?>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menyu Daxil et
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Menyu Daxil etmek</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?=$admin_url.'/menu/add.php';?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                  <label>Order</label>
                  <input type="number" name="order" min="0" class="form-control">
                </div>
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="parent">
                    <option value="0">Please Select One</option>
                    <option value="1">option 1</option>
                    <option value="1">option 1</option>
                    <option value="1">option 1</option>
                    <option value="1">option 1</option>
                    <option value="1">option 1</option>
                    <option value="1">option 1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <select class="form-control" name="type">
                    <option>Please Select One</option>
                    <option value="0">General Page</option>
                    <option value="1">Static Page</option>
                    <option value="2">Category Page</option>
                    <option value="2">Special Page</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option>Please Select One</option>
                    <option value="0">InActive</option>
                    <option value="1">Active</option>
                    <option value="2">Deletd</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Daxil Et</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php 
  include '../includes/footer.php';
?>