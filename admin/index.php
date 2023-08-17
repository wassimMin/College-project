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
                                <h2 class="text-center text-white bg-primary">Statics OverView of UHBC univ </h2>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-primary border-primary">
                                <div class="card-header bg-primary text-white"> Students</div>
                                <div class="card-body">
                                    <table class="table table-borderd table-condensed">
                                        <tbody>
                                            <tr>
                                                <th class="bg-dark text-white">Class 1</th>
                                                <th>51</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Class 2</th>
                                                <th>80</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Class 3</th>
                                                <th>50</th>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card text-primary border-primary">
                                <div class="card-header bg-primary text-white"> Students</div>
                                <div class="card-body">
                                    <table class="table table-borderd table-condensed">
                                        <tbody>
                                            <tr>
                                                <th class="bg-dark text-white">Group 1</th>
                                                <th>29</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Group 2</th>
                                                <th>27</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Group 3</th>
                                                <th>16</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Group 4</th>
                                                <th>23</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Group 5</th>
                                                <th>19</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Group 6</th>
                                                <th>25</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Group 7</th>
                                                <th>23</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Group 8</th>
                                                <th>20</th>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                        <div class="card text-primary border-primary">
                                <div class="card-header bg-primary text-white"> Teachers</div>
                                <div class="card-body">
                                    <table class="table table-borderd table-condensed">
                                        <tbody>
                                            <tr>
                                                <th class="bg-dark text-white">BDD </th>
                                                <th>3</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">THL </th>
                                                <th>2</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">SE </th>
                                                <th>3</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">WEB</th>
                                                <th>2</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">Réseaux</th>
                                                <th>4</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white">POO</th>
                                                <th>3</th>
                                            </tr>
                                          
                                            <tr>
                                                <th class="bg-dark text-white">English</th>
                                                <th>1</th>
                                            </tr>
                                          

                                        </tbody>
                                    </table>
                                </div>
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