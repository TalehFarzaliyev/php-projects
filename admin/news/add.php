<?php
  include '../functions/model_lib.php';
  include '../includes/head.php';
  include '../includes/header.php';
  include '../includes/nav.php';

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $title  = $_POST['name'];
    $desc   = $_POST['editor1'];
    $cat_id = $_POST['category_id'];
    $status = $_POST['status'];
    $new_name= '';
    if(isset($_FILES['image']))
    {
      $file_name  = $_FILES['image']['name'];
      $file_tmp   = $_FILES['image']['tmp_name'];
      $new_name   = date('d-m-y').'-'.rand(0,100).'.jpeg';
      move_uploaded_file($file_tmp,"../../uploads/".$new_name);
    }

    $sql    = "INSERT INTO news(`title`,`description`,`category_id`,`main_image`,`status`)
    values('$title','$desc',$cat_id,'$new_name',$status)";

    $query  = mysqli_query($conn,$sql);

    if($query)
    {
      echo "<script>alert('Added!');</script>";    
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
       Xəbər  Daxil et
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?=$admin_url.'/news/add.php';?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="name" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" name="image" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category_id">
                    <option>Please Select One</option>
                    <?php
                      $categories = getCategories();
                      foreach($categories as $key=>$value)
                      {
                        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="editor1" id="editor1">
                  </textarea>
                </div>
                <script>
                  CKEDITOR.replace( 'editor1' );
                </script>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option>Please Select One</option>
                    <option value="0">InActive</option>
                    <option value="1">Active</option>
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