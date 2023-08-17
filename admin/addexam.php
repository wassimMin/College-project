<?php 
    ob_start();
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location : index.php');

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
                                <h2 class="text-center text-white bg-primary"> Create Exam </h2>
                             <form action="addstudent.php" method="post" enctype="multipart/form-data">
                             <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> id</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter Exam id" name="id"> 
                                    </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Matricule</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter student matricule" name="matricule"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> For Class</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="class" required>
                                                <option value="1">Class 1</option>
                                                <option value="2">Class 2</option>
                                                <option value="3">Class 3</option>
                                                <option value="4">Class 4</option>
                                                <option value="5">Class 5</option>
                                                <option value="6">Class 6</option>
                                                <option value="7">Class 7</option>
                                                <option value="8">Class 8</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Mobile </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Email </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter Email" name="email"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Password </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter Password" name="password"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Subject </label>
                                    <div class="col-sm-10">
                                        <?php
                                            $subject= "SELECT * FROM subject";
                                            $runSubject=mysqli_query($con,$subject);
                                            while($rowSubject=mysqli_fetch_array($runSubject)){
                                                $id=$rowSubject['id'];
                                                $subjectName=$rowSubject['subjectName'];
                                            
                                        ?>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="sub[]" value="<?php echo $subjectName;?>"/><?php echo $subjectName;?>
                                            </label>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Date Of Birth </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control"  name="date"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                            <button class="btn btn-outline-primary btn-block" name="submit" type="submit">Add student</button>
                                    </div>
                                </div>
                                
                             </form>   
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
<?php 
if(isset($_POST['submit'])){
    $student_id=$_POST['id_et'];
    $studentname=$_POST['studentname'];
    $matricule=$_POST['matricule'];
    $class=$_POST['class'];
    $gender=$_POST['gender'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $date=$_POST['date'];

    $sub=implode(",",$_POST['sub']);

    $insert_student= "INSERT INTO student 
    (name_prenom,matricule, class, gender, mobile, email, password_us, subject_s, date_nais,id_et) 
    VALUES
    ('$studentname', '$matricule', '$class', '$gender', '$mobile', '$email', '$password', '$sub', '$date', NOW())";
    $insert_pro=mysqli_query($con, $insert_student);

    if($insert_pro){
        echo "<script>alert('Welcome, You have added a new student!')</script>";
        echo "<script>window.open('student.php', '_self')</script>";
    }
}
?>
