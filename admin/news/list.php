<?php
  include '../config.php';
  include '../includes/head.php';
  include '../includes/header.php';
  include '../includes/nav.php';

  $select  = "SELECT * FROM `news`";
  $result  = mysqli_query($conn, $select);
  //print_r($result); exit();
  if(isset($_GET['del_id']) and !empty($_GET['del_id']))
  {
    $del_id = intval($_GET['del_id']);
    $sql_d  = "DELETE FROM `news` WHERE `id`=$del_id";
    $execute= mysqli_query($conn,$sql_d);
    if ($execute) {
        header('location: http://myblog.me/admin/news/list.php');
    }
  }  

?>
<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Xəbərlər
        <small><a href="<?=$admin_url.'/news/add.php';?>">Xəbər Daxil Et</a></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Xəbərlər</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Text</th>
                    <th>Status</th>
                    <th style="width: 40px">Actions</th>
                  </tr>
                <?php
                   while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?=$row['id'];?></td>
                  <td><?=$row['title'];?></td>
                  <td><?=$row['category_id'];?></td>
                  <td><img width="50px" height="50px" src="<?=$uploads_url.$row['main_image'];?>"></td>
                  <td><p><?=$row['description'];?></p></td>
                  <td><?=$row['status'];?></td>
                  <td>
                    <a href="<?=$admin_url.'/news/edit.php?id='.$row['id'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="<?=$admin_url.'/news/list.php?del_id='.$row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <?php
                  }
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div> -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>

<?php 
  include '../includes/footer.php';
?>