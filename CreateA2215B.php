<?php include 'fileslogic.php';?>

<?php

$user = 'root';
$password = '';

$database = 'iralmol_v2';

$servername ='localhost';

//Create connection
$connection = new mysqli($servername,$user,$password, $database);




$Name_of_Applicant = "";
$Date_of_Application= "";
$Section_to_be_Varied= "";
$Cat_of_affected_employees= "";
$Recommendations= "";
$Variation_end_date= "";
$filename="";



$errorMassage = "";
$succesMassage = "";

 
 if ( $_SERVER['REQUEST_METHOD'] == 'POST') {

$Name_of_Applicant=$_POST["Name_of_Applicant"];
$Date_of_Application=$_POST["Date_of_Application"];
$Section_to_be_Varied=$_POST["Section_to_be_Varied"];
$Cat_of_affected_employees=$_POST["Cat_of_affected_employees"];
$Recommendations=$_POST["Recommendations"];
$Variation_end_date=$_POST["Variation_end_date"];
$filename =$_FILES['filename']['name'];


do {
    if (empty($Name_of_Applicant) || empty($Date_of_Application) || empty($Section_to_be_Varied) || empty($Cat_of_affected_employees)){
        $errorMassage = "All the fields are required";
        break;
    }

    // add new client to database
    $sql ="INSERT INTO a2215 (Name_of_Applicant, Date_of_Application, Section_to_be_Varied, Cat_of_affected_employees, Recommendations, Variation_end_date, filename ) " .
          "VALUES('$Name_of_Applicant','$Date_of_Application','$Section_to_be_Varied' ,'$Cat_of_affected_employees','$Recommendations','$Variation_end_date','$filename')";
          $result = $connection->query($sql);

          if(!$result){
              $errorMassage= "Invalid query: " . $connection->error;
              break;
          }



          $Name_of_Applicant = "";
          $Date_of_Application= "";
          $Cat_of_affected_employees= "";
          $Section_to_be_Varied="";
          $Recommendations= "";
          $Variation_end_date= "";
          $filename="";


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
               border:black; width:1500px; border-width:5px;margin-right: 150px; margin-left: 290px; border-style:solid;background:lightgrey;padding:10px;border-radius: 15px; margin-top:-20px">
      
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
       

        <form method="post" style="font-size:22px" enctype="multipart/form-data" >
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name of Applicant </label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Name_of_Applicant" value="<?php echo $Name_of_Applicant ; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Date of Application</label>
                <div class="col-sm-6">
                    <input type="datetime-local" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  
                 placeholder="date format example:0000:00:00:" class="form-control" name="Date_of_Application" value="<?php echo $Date_of_Application; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Section to be Varied</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Section_to_be_Varied" value="<?php echo $Section_to_be_Varied; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Cat of affected Employees</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Cat_of_affected_employees" value="<?php echo $Cat_of_affected_employees; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Recommendation(if any)</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Recommendations" value="<?php echo $Recommendations; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Variation end date</label>
                <div class="col-sm-6">
                    <input type="datetime-local" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="Variation_end_date" value="<?php echo $Variation_end_date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" method="POST" enctype="multipart/form-data" >Upload File</label>
                <div class="col-sm-6">
                    <input type="file"  name="filename" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" value="<?php echo $filename; ?>">
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
                    <button type="submit" name="save" class="btn btn-secondary">Submit</button>
            </div>
        
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-secondary" href="offA222.15.php" role="button">Cancel</a>
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