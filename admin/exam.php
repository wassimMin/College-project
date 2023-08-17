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

        $del_query= "DELETE FROM exam WHERE id = '$del_id' "; 
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
                                <h2 class="text-center text-white bg-primary"> View all Exams </h2>
                        
                        <div align="right" >
                                <a href="addexam.php" class="btn btn-outline-primary"> Add exam </a> <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="card text-primary border-primary">
                                <div class="card-header bg-primary text-white"> Students</div>
                            </div>
                            <table class="table table-border" id="table2excel">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th> id</th>
                                            <th> Date</th>
                                            <th> Subject</th>
                                            <th> Class</th>
                                            <th> Total Marks</th>
                                            <th>
                                                <i class="fa fa-trash-o"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $exam="SELECT * FROM exam ORDER BY id desc ";
                                            $runexam= mysqli_query($con,$exam);
                                            if($runexam->num_rows > 0){
                                            $i=0;
                                            while($rowexam = mysqli_fetch_array($runexam)){
                                                $id= $rowexam['id'];
                                                $date= $rowexam['date'];
                                                $subject= $rowexam['subject'];
                                                $class= $rowexam['class'];
                                                $totalMarks= $rowexam['totalMarks'];
                                                $i++;
                                        
                                              ?>
                                                <tr> 
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $date;?></td>
                                                <td><?php echo $subject;?></td> 
                                                <td><?php echo $class;?></td> 
                                                <td><?php echo $totalMarks;?></td> 

                                          
                                                <td>
                                            <a class="btn btn-danger" href="exam.php?del=<?php echo $id;?>">
                                            <i class="fa fa-trash-o"></i></a>
                                        </td>
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