<?php 
    ob_start();
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location : login.php');

    }
    require_once('inc/top.php');
    require_once('inc/db.php');

    if(isset($_GET['del'])){
        $del_id= $_GET['del'];

        $del_query= "DELETE FROM student WHERE id = '$del_id' "; 
        $del_run = mysqli_query($con,$del_query);
        if($del_run){
            echo "<script> alert ('You have Deleted Successfully')</script>";
            echo "<script> window.open('student.php','_self')</script>";
        }
    }
?>



    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                    <?php include('inc/navbar.php'); ?>
                </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-3">
                <?php include('inc/sidebar.php'); ?>        
        </div>
            <div class="col-md-9"> 
                <div class="row">
                    <div class="col-md-12">
            
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                                <h2 class="text-center text-white bg-primary"> View all Registration </h2>
                        <div class="col-md-12">
                            <div class="card text-primary border-primary">
                                <div class="card-header bg-primary text-white"> Students</div>
                            </div>
                            <table class="table table-border" id="table2excel">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th> id</th>
                                            <th> Student name</th>
                                            <th> Email</th>
                                            <th> Mobile</th>
                                            <th> Address</th>
                                            <th> Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $register="SELECT * FROM register ORDER BY regid desc ";
                                            $runregister= mysqli_query($con,$register);
                                            if($runregister->num_rows > 0){
                                            $i=0;
                                            while($rowregister = mysqli_fetch_array($runregister)){
                                                $id= $rowregister['regid'];
                                                $name= $rowregister['regName'];
                                                $email= $rowregister['regEmail'];
                                                $mobile= $rowregister['regMobile'];
                                                $address= $rowregister['regAddress'];
                                                $date= $rowregister['date'];
                                                $i++;
                                        
                                              ?>
                                                <tr> 
                                                <td><?php echo $i;?></td>
                                                <td><?php echo ucfirst($name);?></td>
                                                <td><?php echo $email;?></td> 
                                                <td><?php echo $mobile;?></td> 
                                                <td><?php echo $address;?></td> 
                                                <td><?php echo $date;?></td> 

                                          
                                       
                                           </tr>
                                           <?php
                                         }
                                        }
                                        ?>
                                    </tbody>
                            </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid">
            <div class="row bg-dark mt-2">
                <?php include('inc/footer.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#table2excel').DataTable();
    });
</script>