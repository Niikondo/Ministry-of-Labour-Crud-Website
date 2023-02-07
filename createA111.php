<?php

$user = 'root';
$password = '';

$database = 'IRAMOL';

$servername ='localhost';

//Create connection
$connection = new mysqli($servername,$user,$password, $database);


$APPLICANT_SURNAME = "";
$APPLICANT_NAME= "";
$ID_NUMBER= "";
$DATE_RECEIVED= "";
$APPOINTMENT_CRITERIA= "";
$APPOINTMENT_DATE= "";

$errorMassage = "";
$succesMassage = "";

if(isset($_POST["submit"])){
var_dump($_POST);
print_r($_FILES);
//var_dump($_FILES);
//var_dump($_FILES["fileUpload"]);
exit;
}
 
 if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    
$APPLICANT_SURNAME=$_POST["APPLICANT_SURNAME"];
$APPLICANT_NAME=$_POST["APPLICANT_NAME"];
$ID_NUMBER= $_POST["ID_NUMBER"];
$DATE_RECEIVED= $_POST["DATE_RECEIVED"];
$APPOINTMENT_CRITERIA= $_POST["APPOINTMENT_CRITERIA"];
$APPOINTMENT_DATE=$_POST["APPOINTMENT_DATE"];
$FILENAME = '';
//check if file is uploaded
$check =  getimagesize($_POST["fileUpload"]["tmp_name"]);
if($check !== false){
    $FILENAME = $_FILES["fileUpload"]["tmp_name"];
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"],'uploads/' .$_FILES["fileUpload"]["tmp_name"]);
}

do {
    if (empty($APPLICANT_SURNAME) || empty($APPLICANT_NAME) || empty($ID_NUMBER) || empty($DATE_RECEIVED)){
        $errorMassage = "FIRST FOUR FIELDS ARE REQUIRED!!";
        break;
    }

    // add new client to database
    $sql ="INSERT INTO CDPR (APPLICANT_SURNAME, APPLICANT_NAME, ID_NUMBER, DATE_RECEIVED, APPOINTMENT_CRITERIA, APPOINTMENT_DATE) " .
          "VALUES('$APPLICANT_SURNAME','$APPLICANT_NAME','$ID_NUMBER' ,'$DATE_RECEIVED','$APPOINTMENT_CRITERIA','$APPOINTMENT_DATE')";
          $result = $connection->query($sql);

          if(!$result){
              $errorMassage= "Invalid query: " . $connection->error;
              break;
          }



          $APPLICANT_SURNAME = "";
          $APPLICANT_NAME= "";
          $ID_NUMBER= "";
          $DATE_RECEIVED= "";
          $APPOINTMENT_CRITERIA= "";
          $APPOINTMENT_DATE= "";

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
   <script src="jquery.js" ></script>

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

        <!--<form style="font-size:22px">-->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">APPLICANT_SURNAME </label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="APPLICANT_SURNAME" value="<?php echo $APPLICANT_SURNAME ; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >APPLICANT NAME</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  
                 class="form-control" name="APPLICANT_NAME" value="<?php echo $APPLICANT_NAME; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >ID NUMBER</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="ID_NUMBER" value="<?php echo $ID_NUMBER; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >DATE RECEIVED</label>
                <div class="col-sm-6">
                    <input type="datetime-local" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="DATE_RECEIVED" value="<?php echo $DATE_RECEIVED; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">APPOINTMENT CRITERIA</label>
                <div class="col-sm-6">
                    <input type="text" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="APPOINTMENT_CRITERIA" value="<?php echo $APPOINTMENT_CRITERIA; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >APPOINTMENT_DATE</label>
                <div class="col-sm-6">
                    <input type="datetime-local" style= "border: 4px solid Black;margin-left: 125px;
                                                         border-radius: 4px;"  class="form-control" name="APPOINTMENT_DATE" value="<?php echo $APPOINTMENT_DATE; ?>">
                </div>
               
               
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >UPLOAD</label>
                <div class="col-sm-6">
                <input id="fileUpload" type="file" style= "border: 4px solid Black;margin-left: 125px; border-radius: 4px;"  class="form-control" name="update" value="<?php echo $filename; ?>">
                </div>
                <div class="col-sm-6">
                    
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
                    <button id="submitButton" class="btn btn-secondary" name="submit">Submit</button>
            </div>
        
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-secondary" href="officeA111.php" role="button">Cancel</a>
            </div>
            </div>
        </div>
        </div>
        <!--</form>-->
<script>

$(document).ready(function(){
    $("#submitButton").on("click",function(){
        var APPLICANT_SURNAME,APPLICANT_NAME,ID_NUMBER,DATE_RECEIVED,APPOINTMENT_CRITERIA,APPOINTMENT_DATE;          
        APPLICANT_SURNAME = $("input[name=APPLICANT_SURNAME]").val();
        APPLICANT_NAME = $("input[name=APPLICANT_NAME]").val();
        ID_NUMBER = $("input[name=ID_NUMBER]").val();
        DATE_RECEIVED = $("input[name=DATE_RECEIVED]").val();
        APPOINTMENT_CRITERIA = $("input[name=APPOINTMENT_CRITERIA]").val();
        APPOINTMENT_DATE = $("input[name=APPOINTMENT_DATE]").val();
        UPLOAD =$("input[name=UPDATE]").val();
        var dataArray =[APPLICANT_SURNAME,APPLICANT_NAME,ID_NUMBER,DATE_RECEIVED,APPOINTMENT_CRITERIA,APPOINTMENT_DATE];
        var jsonString = JSON.stringify(dataArray);
        
        var file = $('#fileUpload').prop("html website mlirec/uploads")[0];
        var form_data =  new FormData();
        form_data.append("fileUpload",file);
        var jsonFormData = JSON.stringify(form_data);

        
        $.ajax({
            type: "POST",
            url: "logic.php",/*
            processData: false,
            contentType:false,*/
            data: {formValues:jsonString,fileUpload:jsonFormData},
            cache:false,
            success:function(response){
                alert(response);
                console.log(response);
            }
        });
    });
});
/*
$(document).ready(fucntion(){
    $("#submitButton").on("click",function(){
            alert(0);
            var file_data= $("#fileUpload").prop("files")[0];
            var form_data =  new FormData();
            form_data.append("file",file_data);
            $.ajax({
                type:"POST",
                url: "logic.php",
                data: {addApplicant:0,file:form_data},
                cache:false,
                success:function(response){
                    console.log(response);
                }
            });
        })
})  */  
        

</script>
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