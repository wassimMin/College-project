<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
    header('Location: login.php');
    exit();
}

require_once('inc/top.php');
require_once('inc/db.php');

if(isset($_GET['id'])){
    $edit_id = $_GET['id'];

    $getStudent = "SELECT * FROM student WHERE id_et = '$edit_id'"; 
    $runGetStudent = mysqli_query($con, $getStudent);

    if($runGetStudent && mysqli_num_rows($runGetStudent) > 0){
        $row = mysqli_fetch_array($runGetStudent);

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
                                <h2 class="text-center text-white bg-primary"> Add Student </h2>
                             <form action="student.php" method="post" enctype="multipart/form-data">
                             <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> id</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $student_id;?>" name="id_et"> 
                                    </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Student name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $studentname;?>" name="studentname"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Matricule</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $matricule;?>" name="matricule"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> For Class</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="class" required>
                                                <option value="1"<?php if($class == '1'){echo "selected ";}?> >Class 1</option>
                                                <option value="2"<?php if($class == '2'){echo "selected ";}?> >Class 2</option>
                                                <option value="3"<?php if($class == '3'){echo "selected ";}?> >Class 3</option>
                                                <option value="4"<?php if($class == '4'){echo "selected ";}?> >Class 4</option>
                                                <option value="5"<?php if($class == '5'){echo "selected ";}?> >Class 5</option>
                                                <option value="6"<?php if($class == '6'){echo "selected ";}?> >Class 6</option>
                                                <option value="7"<?php if($class == '7'){echo "selected ";}?> >Class 7</option>
                                                <option value="8"<?php if($class == '8'){echo "selected ";}?> >Class 8</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Gender </label>
                                    <div class="col-sm-10">
                                    <div class="col-sm-10">
                                        <select class="form-control" name="gender" required>
                                                <option value="male"<?php if($gender == 'male'){echo "selected ";}?>> Male</option>
                                                <option value="female"<?php if($gender == 'female'){echo "selected ";}?>> Female</option>
                                                <option value="him"> Him</option>
                                        </select> 
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Mobile </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $mobile; ?>" name="mobile"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Email </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $email; ?>" name="email"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Password </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $password; ?>" name="password_us"> 
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
                                                <input class="form-check-input" type="checkbox" name="sub[]" value="<?php echo $subjectName;?>" <?php if(in_array("$subjectName",$subjectArray)){echo"checked";}?>/>
                                                <?php echo $subjectName;?>
                                            </label>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-dark"> Date Of Birth </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control"  name="date_nais" value="<?php echo $date?>"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                            <button class="btn btn-outline-primary btn-block" name="update" type="submit">Update student</button>
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
if(isset($_POST['update'])){
    if(isset($_GET['id'])){
        $student_id = $_GET['id'];
    }
    $student_id=$_POST['id_et'];
    $studentname = $_POST['name_prenom'];
    $matricule = $_POST['matricule'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password_us'];
    $date = $_POST['date_nais'];
    $sub = implode(",", $_POST['sub']);

    $update = "UPDATE student SET
    name_prenom = '$studentname',
    matricule = '$matricule',
    class = '$class',
    gender = '$gender',
    mobile = '$mobile',
    email = '$email',
    password_us = '$password',
    subject_s = '$sub',
    date_nais = '$date'
    WHERE id_st = '$student_id';";
    $runUpdate = mysqli_query($con, $update);

        echo "<script>alert('Welcome, You have updated the student!')</script>";
        echo "<script>window.open('student.php', '_self')</script>";

}
?>

