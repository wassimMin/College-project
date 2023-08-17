<?php 
include_once('db.php');
$student= "SELECT * FROM student";
$student_run= mysqli_query($con,$student);
$row_student= mysqli_num_rows($student_run);

$exam= "SELECT * FROM exam";
$exam_run= mysqli_query($con,$exam);
$row_exam= mysqli_num_rows($exam_run);

$result= "SELECT * FROM result";
$result_run= mysqli_query($con,$result);
$row_result= mysqli_num_rows($result_run);

$subject= "SELECT * FROM subject";
$subject_run= mysqli_query($con,$subject);
$row_subject= mysqli_num_rows($subject_run);

$msg= "SELECT * FROM msg";
$msg_run= mysqli_query($con,$msg);
$row_msg= mysqli_num_rows($msg_run);

$register= "SELECT * FROM register";
$register_run= mysqli_query($con,$register);
$row_register= mysqli_num_rows($register_run);

?>
<div class="list-group">
<a href="result.php" class="list-group-item list-group-item-action active">
        <i class="fa fa-tachometer"></i> Student Dashboard
    </a>
    <a href="result.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-calendar-o" aria-hidden="true"></i> Result 
        <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge badge-light">27</span>
        </button>
    </a>
    <a href="msg.php" class="list-group-item list-group-item-action ">
        <i class="fa fa-envelope"></i> Messages 
        <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge badge-light">+99</span>
        </button>
    </a>
</div>

