
<?php 
session_start();
include('cn.php');
if(!isset($_SESSION['session'])){
    header("location: login.php");
  }

?>
<?php include('include/head.php');?>
<body>
    <?php
    include('include/sidebar.php');
    ?>
    <div class="div">
        <div class="story_board">
            <div class="head1">
                <h2 style="float: left;">Brand | <span style="font-size: 20px;">Brand List</span></h2>
                <a href="index.php?out" style="float:right;" type="button" class="btn btn-outline-danger ">Logout</a>
            </div>


        </div>
        <?php
            if(isset($_REQUEST['btnAdd'])){
                $code = $_REQUEST['txtcode'];
                $name = $_REQUEST['txtname'];
                $desc = $conn->real_escape_string($_REQUEST['txtdesc']);
                $create_by = $_REQUEST['txtcreate_by'];

                $sql = "INSERT INTO `tbl_brand`(`code`, `name`, `desc`, `create_by`) VALUES ('$code','$name','$desc','$create_by')";
                if ($conn->query($sql) === TRUE) {
                    echo '
                  <script>
                    swal({
                      title: "Success",
                      text: "Data insert success",
                      icon: "success",
                    });
                  </script>
                  ';
                  } else {
                    echo '
                  <script>
                    swal({
                      title: "Try again",
                      text: "Data can not insert",
                      icon: "error",
                    });
                  </script>
                  ';
                  }
                
            }

            if(isset($_REQUEST['bId'])){
                $bId = $_REQUEST['bId'];
                if(isset($_REQUEST['btnUpdate'])){
                    $name = $_REQUEST['txtname'];
                    $code = $_REQUEST['txtcode'];
                    $desc = $_REQUEST['txtdesc'];
                    $create_by = $_REQUEST['txtcreate_by'];
                    $curentDate = date("Y_m_d_H_i_s");
                    $update_at = $_REQUEST['txtupdate_at'];
                    $update = $update_at.$curentDate;
                    
                    $sqlUpdate = "UPDATE `tbl_brand` SET `code`='$code',`name`='$name',`desc`='$desc',`create_by`='$create_by',`update_at`='$update' WHERE id=$bId";
                    if($conn->query($sqlUpdate) === TRUE){
                        echo '
                        <script>
                          swal({
                            title: "Success",
                            text: "Data insert success",
                            icon: "success",
                          });
                        </script>
                        ';
                        } else {
                          echo '
                        <script>
                          swal({
                            title: "Try again",
                            text: "Data can not insert",
                            icon: "error",
                          });
                        </script>
                        ';
                        }
                }
                
                $rowFrm = $conn->query("SELECT * FROM `tbl_brand` WHERE id=$bId")->fetch_assoc();
            }
            else{
                $rowFrm = array("name"=>"","code"=>"","desc"=>"","create_by"=>"","update_at"=>"",);
            }
        ?>
        <div class="body1">

            <div class="input-group">
                <a href="/admin/view-brand.php"><button style="float:right; " type="button" class="btn btn-outline-primary ">Brand List</button></a>
            </div>
            <hr>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Code</label>
                    <input type="text" class="form-control" name="txtcode" value="<?php echo ''.$rowFrm['code'].'' ?>" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Name</label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo ''.$rowFrm['name'].'' ?>">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Description</label>
                    <input type="text" class="form-control" name="txtdesc" value="<?php echo ''.$rowFrm['desc'].'' ?>">
                </div>
                <div class="mb-3">
                    <div class="form-group">
                      <label>CreateBy</label>

                      <select class="form-control select2bs4" style="width: 100%;" name="txtcreate_by" >
                        <?php
                        $sqlSUser = "SELECT * FROM `tbl_user`";
                        $qrSUser = $conn->query($sqlSUser);
                        while ($rowSUser = $qrSUser->fetch_assoc()) {
                          if($rowSUser['id'] == $row['id']) $sel='selected';
                          else $sel ='';
                          echo '<option value="' . $rowSUser['id'] . '" '.$sel.'>' . $rowSUser['name'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3" style="display: none;">
                    <label  class="form-label">UpdateAt</label>
                    <input type="date" class="form-control" name="txtupdate_at" >
                </div>
                <?php
                    if(isset($_REQUEST['bId'])){
                        echo'
                            <input type="submit" value="UPDATE" class="btn btn-success" name="btnUpdate">
                            <a href="add-brand.php" class="btn btn-info"> NEW </a>
                        ';
                    }
                    else{
                        echo'
                        <button type="submit" class="btn btn-primary" name="btnAdd">Submit</button>
                        ';
                    }
                ?>
            </form>
        </div>

    </div>
</body>

</html>