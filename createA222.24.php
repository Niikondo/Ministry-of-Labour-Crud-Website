<?php

$user = 'root';
$password = '';

$database = 'IRAMOL';

$servername ='localhost';

//Create connection
$connection = new mysqli($servername,$user,$password, $database);




$Name_of_Applicant = "";
$Date_Received= "";
$Positions= "";
$Number_of_Positions= "";
$No_of_Positions_Recommended= "";
$No_of_Positions_not_Recommended= "";
$Remarks= "";
$Exemption_end_date= "";

$errorMassage = "";
$succesMassage = "";

 
 if ( $_SERVER['REQUEST_METHOD'] == 'POST') {

$Name_of_Applicant=$_POST["Name_of_Applicant"];
$Date_Received=$_POST["Date_Received"];
$Positions= $_POST["Positions"];
$Number_of_Positions= $_POST["Number_of_Positions"];
$No_of_Positions_Recommended= $_POST["No_of_Positions_Recommended"];
$No_of_Positions_not_Recommended=$_POST["No_of_Positions_not_Recommended"];
$Remarks= $_POST["Remarks"];
$Exemption_end_date=$_POST['Exemption_end_date'];

do {
    if (empty($Name_of_Applicant) || empty($Date_Received) || empty($Positions) || empty($No_of_Positions_Recommended)|| empty($No_of_Positions_not_Recommended)|| empty($Remarks) ){
        $errorMassage = "All the fields are required";
        break;
    }

    // add new client to database
    $sql ="INSERT INTO a22224 (Name_of_Applicant, Date_Received, Positions, Number_of_Positions, No_of_Positions_Recommended, No_of_Positions_not_Recommended,Remarks, Exemption_end_date ) " .
          "VALUES('$Name_of_Applicant','$Date_Received','$Positions' ,'$Number_of_Positions','$No_of_Positions_Recommended','$No_of_Positions_not_Recommended','$Remarks','$Exemption_end_date')";
          $result = $connection->query($sql);

          if(!$result){
              $errorMassage= "Invalid query: " . $connection->error;
              break;
          }



          $Name_of_Applicant = "";
          $Date_Received= "";
          $Positions= "";
          $Number_of_Positions= "";
          $No_of_Positions_Recommended= "";
          $No_of_Positions_not_Recommended= "";
          $Remarks= "";
          $Exemption_end_date= "";

$succesMassage = "Record Added Successfully";


}while(false);

 }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>

     <title>MILREC</title>
</head>
<body background=""style="background-size:100%;background-color:lightgrey">
<header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                <a class="navbar-brand"style="margin-left:450px" href="#">MLIREC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link active" style="margin-left:10px" href="index.php">Home <span class="sr-only"></span></a>
                    
                    </div>
                </div>
                </nav>
            </header>
            <br>
            <h2 style="text-align: center">Add New Record</h2>
            <br>
            <br>
            <br>
            <div class="container-5 " style="background-color:lightgrey,   text-align: center;
               border:black; width:1500px; border-width:5px;margin-right: 150px; margin-left: 290px; border-style:solid;background:lightgrey;padding:10px;border-radius: 24px; margin-top:-20px">
      
        <?php
        if (!empty($errorMassage)) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show'style='position:fixed;top:1em ;width:600px;right:20%;opacity:5;left:20%;text-align:center;margin-left:250px' role='alert'> 
            <strong>$errorMassage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert'aria-label='close'></button>
            </div>
            ";
        }

        ?>

        <form method="post" style="font-size:22px" >
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name of Applicant </label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Name_of_Applicant" value="<?php echo $Name_of_Applicant ; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Date Received</label>
                <div class="col-sm-6">
                    <input type="datetime-local" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  
                 placeholder="date format example:0000:00:00:" class="form-control" name="Date_Received" value="<?php echo $Date_Received; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Positions</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Positions" value="<?php echo $Positions; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Number of Positions</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Number_of_Positions" value="<?php echo $Number_of_Positions; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">No of Positions Recommended</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="No_of_Positions_Recommended" value="<?php echo $No_of_Positions_Recommended; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >No of Positions not Recommended</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="No_of_Positions_not_Recommended" value="<?php echo $No_of_Positions_not_Recommended; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Remarks</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Remarks" value="<?php echo $Remarks; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Exemption end date</label>
                <div class="col-sm-6">
                    <input type="datetime-local"style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  placeholder="date format example:0000:00:00:"   class="form-control" name="Exemption_end_date" value="<?php echo $Exemption_end_date; ?>">
                </div>
            </div>
            <?php
            if (!empty($succesMassage)){

                echo"
                <div class='row mb-3' style='position:fixed;margin-left:190px;width:1300px;top:35em '>
                <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$succesMassage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                </div>
                </div>
                ";

            }
            ?>
<br>


<div style="margin-left:200px">
            <div class= "row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
        
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-secondary" href="officeA222.24.php" role="button">Cancel</a>
            </div>
            </div>
        </div>
        </div>
        </form>
    
</body>
<footer>
  <p Style=" position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: -20px;
            width: 100%;
            height: 40px;
            background: white;
            text-align: center;">Copyright ©2022 MLIREC All Rights Reserved</p>
  
</footer>
</html>