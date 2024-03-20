
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
                <h2 style="float: left;">User | <span style="font-size: 20px;">User List</span></h2>
                <a href="index.php?out" style="float:right;" type="button" class="btn btn-outline-danger ">Logout</a>
            </div>


        </div>
        <?php
            if(isset($_REQUEST['btnAdd'])){
                $name = $_REQUEST['txtname'];
                $code = $_REQUEST['txtcode'];
                $pass = $_REQUEST['txtpass'];
                $desc = $_REQUEST['txtdesc'];

                $sql = "INSERT INTO `tbl_user`(`code`, `name`, `password`, `desc`) VALUES ('$code','$name','$pass','$desc')";
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

            if(isset($_REQUEST['uId'])){
                $uId = $_REQUEST['uId'];
                if(isset($_REQUEST['btnUpdate'])){
                    $name = $_REQUEST['txtname'];
                    $code = $_REQUEST['txtcode'];
                    $desc = $_REQUEST['txtdesc'];
                    $pass = $_REQUEST['txtpass'];

                    $sqlUpdate = "UPDATE `tbl_user` SET `code`='$code',`name`='$name',`password`='$pass',`desc`='$desc' WHERE id=$uId";
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
                
                $rowFrm = $conn->query("SELECT * FROM `tbl_user` WHERE id=$uId")->fetch_assoc();
            }
            else{
                $rowFrm = array("name"=>"","code"=>"","password"=>"","desc"=>"","update"=>"",);
            }
        ?>
        <div class="body1">

            <div class="input-group">
                <a href="/admin/view-user.php"><button style="float:right; " type="button" class="btn btn-outline-primary ">User List</button></a>
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
                    <label  class="form-label">Password</label>
                    <input type="password" class="form-control" name="txtpass" value="<?php echo ''.$rowFrm['password'].'' ?>">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Description</label>
                    <input type="text" class="form-control" name="txtdesc" value="<?php echo ''.$rowFrm['desc'].'' ?>">
                </div>
                <?php
                    if(isset($_REQUEST['uId'])){
                        echo'
                            <input type="submit" value="UPDATE" class="btn btn-success" name="btnUpdate">
                            <a href="add-user.php" class="btn btn-info"> NEW </a>
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