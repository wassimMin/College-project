<?php 
    ob_start();
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location : login.php');

    }
    require_once('inc/top.php');
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
                                <h2 class="text-center text-white bg-primary"> Student Details </h2>
                        </div>
                        <div class="col-md-4">
                            <?php 
                                $user_id=$_GET['id'];

                                if(isset($_GET['id'])){
                                    $edit_id = $_GET['id'];
                                
                                    $selectStudent = "SELECT * FROM student WHERE id_et = '$edit_id'"; 
                                    $run = mysqli_query($con, $selectStudent);
                                
                                      if($run && mysqli_num_rows($run) > 0){
                                    $row = mysqli_fetch_array($run);
                            
                                    $student_id = $row['id_et'];
                                    $studentname = $row['name_prenom'];
                                    $matricule = $row['matricule'];
                                    $class = $row['class'];
                                    $gender = $row['gender'];
                                    $mobile = $row['mobile'];
                                    $email = $row['email'];
                                    $password = $row['password_us'];
                                    $subject=$row['subject_s'];
                                    $subjectArray= explode(",",$subject);
                                    $date = $row['date_nais'];
                                   
                                } else {
                                    exit();
                                }
                                }
                            ?>
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="bg-dark text-white">Name</th>
                                        <th><?php echo $studentname; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white"> Matricule</th>
                                        <th><?php echo $matricule; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white"> Class</th>
                                        <th><?php echo $class; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white"> Gender</th>
                                        <th><?php echo $gender; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white"> Mobile</th>
                                        <th><?php echo $mobile; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white"> Email</th>
                                        <th><?php echo $email; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white"> Password</th>
                                        <th><?php echo $password; ?></th>
                                    </tr>
                                </tbody>

                            </table>
                       
                        </div>
            
                        <div class="col-md-4">
                        <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="bg-dark text-white"> Subject</th>
                                        <th><?php echo $subject; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white"> Date of birth</th>
                                        <th><?php echo $date; ?></th>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                <img src="images/logo.png" width="100%" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"> FSEI UHBC</h5>
                                    <p class="card-text"> Faculty of exact sciences and informatics</p>
                                    <p class="card-text"><small class="text-muted"></small></p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div><hr>
                    <div class="row">
                        <div class="col-md-8">
                    <h2 class="text-center text-white bg-primary"> Marks Details </h2><hr>
                            <table class="table table-bordered" id="table2excel">
                                <thead class="thead-dark">
                                    <tr>
                                        <th> Date</th>
                                        <th> Subject</th>
                                        <th> Total Marks</th>
                                        <th> Obtained Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                     $result = "SELECT * FROM result WHERE matricule = '$user_id'";
                                     $run_result= mysqli_query($con,$result);
                                     $ia=0;
                                     while ($row_result = mysqli_fetch_array($run_result)){
                                        $date =$row_result['date'];
                                        $subject=$row_result['subject'];
                                        $total_marks =$row_result['totalMarks'];
                                        $obtain_mark=$row_result['obtainmark'];
                                     
                                    ?>
                                    <tr>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $subject; ?></td>
                                        <td> <?php echo $total_marks ; ?></td>
                                        <td> <?php echo $obtain_mark ; ?></td>

                                    </tr>
                                    <?php 
                                     }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                        <h2 class="text-center text-white bg-primary">Presence Details</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-info btn-block"> Present Days 
                                    <span class="badge badge-light"><?php echo rand(4,100); ?></span>
                                </button><hr><br>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="butoon" class="btn btn-info btn-block"> Absent Days
                                        <span class="badge badge-light"><?php echo rand(4,100); ?></span>
                                </button>
                            </div>

                        </div>
                        <table class="table table-bordered" id="table2excel">
                         </div>
                    </div>
                </div>
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