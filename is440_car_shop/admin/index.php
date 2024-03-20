<?php 
session_start();
include('cn.php');
if(!isset($_SESSION['session'])){
    header("location: login.php");
  }
  if(isset($_REQUEST['out'])){
    session_destroy();
    session_commit();
    header("location: login.php");
  }

?>
<?php include('include/head.php'); ?>
<body>
    <?php
    include('include/sidebar.php');
    ?>
    <div class="div">
        <div class="story_board">
        <div class="head">
            <h2>Income</h2>
            <hr>
            <h3>$ 100,000</h3>
        </div>
        <div class="head">
            <h2>Income</h2>
            <hr>
            <h3>$ 100,000</h3>
        </div>
        <div class="head">
            <h2>Income</h2>
            <hr>
            <h3>$ 100,000</h3>
        </div>
        <div class="head">
            <h2>Income</h2>
            <hr>
            <h3>$ 100,000</h3>
        </div>
        </div>
        <div class="list">
            <h2>Top Customer</h2>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</body>
</html>