
<?php 
include('cn.php');
if(empty($_SESSION['session'])){
    header("location: login.php");
}

?>
<?php  include('include/head.php') ?>
<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header"><a id="nav-title" href="https://codepen.io" target="_blank"><i class="fab fa-codepen"></i>IS440 Car Shop</a>
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button"><i class="fas fa-palette"></i><span><a href="/admin/index.php">Dashboard</a></span></div>
    <div class="nav-button"><i class="fas fa-thumbtack"></i><span><a href="/admin/view-user.php">User</a></span></div>
    <div class="nav-button"><i class="fas fa-images"></i><span>Customer</span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-heart"></i><span><a href="/admin/view-brand.php">Brand</a></span></div>
    <div class="nav-button"><i class="fas fa-chart-line"></i><span>Category</span></div>
    <div class="nav-button"><i class="fas fa-fire"></i><span>Payment Method</span></div>
    <div class="nav-button"><i class="fas fa-magic"></i><span>Product</span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-gem"></i><span>Report</span></div>
    <div id="nav-content-highlight"></div>
    <hr/>
    <a href="index.php?out" class="btn btn-outline-danger sm z-3 position-absolute w-100">Logout</a>
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <!-- <div id="nav-footer">
  </div> -->
  

  <div id="nav-footer">
    <div id="nav-footer-heading">
      <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547"/></div>
      <?php
        $id = $_SESSION['session'];
        $sql = "SELECT * FROM `tbl_user` WHERE `id` = '$id'";
        $rs = $conn->query($sql);
        $row = mysqli_fetch_assoc($rs);
      ?>
      <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">UserName</a><span id="nav-footer-subtitle"><?php echo $row['name'] ?></span></div>
      <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
    </div>
    <div id="nav-footer-content">
      <Lorem><?php echo $row['desc']  ?></Lorem>
    </div>
  </div>
</div>