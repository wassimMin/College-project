<?php 
include ('inc/top.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <?php include('inc/navbar.php'); ?>
        </div>
    </div>
    <div class="row mt-2"> 
            <div class="col-md-4">
                <h2 class="text-secondary">Register Your name</h2><hr>
                <form action="" method="post">
                    <div class="form-group row">
                         <label class="col-sm-2 col-form-label text-dark">Name</label>
                         <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Your name" name="name" style="border:1px solid black; padding-left:5px"/>
                         </div>
                    </div> <br>
                    <div class="form-group row">
                         <label class="col-sm-2 col-form-label text-dark">Email</label>
                         <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Your email" name="email" style="border:1px solid black; padding-left:5px"/>
                         </div>
                    </div> <br>
                    <div class="form-group row">
                         <label class="col-sm-2 col-form-label text-dark">Mobile</label>
                         <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Your Mobile" name="mobile" style="border:1px solid black; padding-left:5px"/>
                         </div>
                    </div> <br>
                    <div class="form-group row">
                         <label class="col-sm-2 col-form-label text-dark">Address</label>
                         <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Your Address" name="address" style="border:1px solid black; padding-left:5px"/>
                         </div>
                    </div><br>
                    <div class="form-group row">
                         <label class="col-sm-2 col-form-label text-dark">Groupe </label>
                         <div class="col-sm-10">
                         <select class="form-control" name="qualification" style="border:1px solid black; padding-left:5px">
                            <option value="1">Group 1</option>
                            <option value="2">Group 2</option>
                            <option value="3">Group 3</option>
                            <option value="4">Group 4</option>
                            <option value="5">Group 5</option>
                            <option value="6">Group 6</option>
                            <option value="7">Group 7</option>
                            <option value="8">Group 8</option>
                         </select>
                        </div>
                    </div><br>
                    <div class="form-group row">
                         <div class="col-sm-10">
                            <button class="btn btn-dark" name="submit">submit</button>
                         </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
                
            </div>

            <div class="col-md-3">
                
            </div>
    </div>
    <div class="container-fluid">
        <div class="row bg-dark mt-2">
            <?php include('inc/footer.php')?>
        </div>

    </div>
</div>

</body>


</html>