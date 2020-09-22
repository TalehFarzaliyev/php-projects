<?php
  //include '../functions/generalfunctions.php';
  include '../functions/model_lib.php';
  include '../includes/head.php';
  include '../includes/header.php';
  include '../includes/nav.php';

  if (isset($_GET['id']) and !empty($_GET['id']))
  {
    $id   = intval($_GET['id']);
    if(isset($_POST['submit']))
    {
      //myDebug($_POST);
      $name     = $_POST['name'];
      $order    = $_POST['order'];
      $parent_id= $_POST['parent'];
      $type     = $_POST['type'];
      $status   = $_POST['status'];
      $sql_u    = "UPDATE menu SET `name`='$name', `order`=$order,
      `parent_id`=$parent_id, `type`=$type, `status`=$status Where `id`=$id";
      $execute  = mysqli_query($conn, $sql_u);
      if($execute)
      {
        header('Location: http://myblog.me/admin/menu/list.php');
      }
      else
      {
        echo $sql_u;
      }
    }
    
    $sql  = "SELECT * FROM menu WHERE `id`=$id";
    $query= mysqli_query($conn,$sql);
    $row_count = mysqli_num_rows($query);  //sorgudan gelen recordlarin sayini tapir.
    if($row_count == 1)
    {
      $row = mysqli_fetch_array($query);
    }
  }

?>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menyu Redaktə etmək
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
              <h3 class="box-title">Menyu Redaktə etmək</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?=$admin_url.'/menu/edit.php?id='.$row['id'];?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="" value="<?=$row['name'];?>">
                </div>
                <div class="form-group">
                  <label>Order</label>
                  <input type="number" name="order" value="<?=$row['order'];?>" min="0" class="form-control">
                </div>
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="parent">
                    <option value="0">Please Select One</option>
                    <?php
                      $parents = getParentElements();
                      foreach($parents as $key=>$value)
                      {
                        if ($row['parent_id'] == $value['id']) {
                          echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                        }
                        else
                        {
                          echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                        }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <select class="form-control" name="type">
                    <?php
                      $types = Type_Values();
                      foreach($types as $key=>$value)
                      {
                        if ($row['type'] == $key) {
                          echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        }
                        else
                        {
                          echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">\
                    <option value="0">Please Select One</option>
                    <?php
                      $status = Status_Values();
                      foreach($status as $key=>$value)
                      {
                        if ($row['status'] == $key) {
                          echo '<option value="'.$key.'" selected>'.$value.'</option>';
                        }
                        else
                        {
                          echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                      }
                    ?>
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