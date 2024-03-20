<?php
session_start();
include('cn.php');
if (!isset($_SESSION['session'])) {
    header("location: login.php");
}

?>
<?php include('include/head.php'); ?>

<body>
    <?php
    include('include/sidebar.php');
    ?>
    <?php
    if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sqluser = "SELECT * FROM `tbl_user` WHERE `name` LIKE '%$search%'";
    } else {
    $sqluser = "SELECT * FROM `tbl_user`";
    }
    $qruser = $conn->query($sqluser);
    ?>
    <div class="div">
        <div class="story_board">
            <div class="head1">
                <h2 style="float: left;">User | <span style="font-size: 20px;">User List</span></h2>
                <a href="index.php?out" style="float:right;" type="button" class="btn btn-outline-danger ">Logout</a>
            </div>     
        </div>
        <!-- sweet alert  -->
        <!-- <script>
                swal({
                    title: "Success",
                    text: "Data delete success",
                    icon: "success",
                });
            </script> -->
        <div class="body1">
                <?php 
                ob_start();
                    if(isset($_GET['delId'])) {
                        $delId = mysqli_real_escape_string($conn, $_GET['delId']);
                        $sqlDeleteBrand = "DELETE FROM `tbl_user` WHERE `id`='$delId'";
                        if($conn->query($sqlDeleteBrand) === TRUE) {
                            echo'
                            <script>
                                swal({
                                    title: "Success",
                                    text: "Data delete success",
                                    icon: "success",
                                });
                            </script> 
                            ';
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                    } else {
                        echo "";
                    }
                    ob_end_flush();
                ?>
            <div class="input-group">      
                <form class="form-inline ml-3 w-100" method="GET">        
                    <div class="input-group input-group ">
                    <a href="/admin/add-user.php"><button style="float:right; " type="button" class="btn btn-outline-primary me-2">Create New</button></a>
                    <input class="form-control form-control-navbar" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                    </div>
                </form>
            </div>
            <hr>
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">CreateAt</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $sqlUser = "SELECT * FROM `tbl_user`";
                $rs = $conn->query($sqlUser);
                $i = 1;
                while ($rowuser = $rs->fetch_assoc()) {
                    echo '
                    <tbody>
                        <tr>
                        <th scope="row">' . $i . '</th>
                        <td>' . $rowuser['code'] . '</td>
                        <td>' . $rowuser['name'] . '</td>
                        <td>' . $rowuser['desc'] . '</td>
                        <td>' . $rowuser['create_at'] . '</td>
                        <td style="display: flex; align-item:center;">
                            <a href="add-user.php?uId='.$rowuser['id'].'" style="float:right; " class="btn btn-outline-primary btn-sm ">កែប្រែ</a>
                            <a href="view-user.php?delId='.$rowuser['id'].'" class="btn btn-outline-danger btn-sm ms-1" onclick="return confirm(\'Are you sure you want to delete this brand?\')">លុប</a> 
                        </td>
                        </tr>
                        
                    </tbody>
                    
                    ';
                    $i++;
                }
                // 
                ?>
            </table>
        </div>

    </div>
</body>
<!--Start script search -->
<script>
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>
<!--End script search -->
</html>