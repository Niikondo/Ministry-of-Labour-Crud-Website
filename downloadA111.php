<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>downloadA111.php</title>
</head>
<body>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Record List
            <a href="csvA111.php" class="btn btn-success pull-right">Export Record</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
					<th>APPLICANT SURNAME</th>
                <th>APPLICANT NAME</th>
                <th>ID NUMBER</th>
                <th>DATE RECEIVED</th>
                <th>APPOINTMENT CRITERIA</th>
                <th>APPOINTMENT DATE</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //include database configuration file
                    include 'dbConfig.php';
                    
                    //get records from database
                    $query = $db->query("SELECT * FROM CDPR ORDER BY ID DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){ ?>                
                    <tr>
                     
                <td><?php echo $rows['APPLICANT_SURNAME'];?></td>
                <td><?php echo $rows['APPLICANT_NAME'];?></td>
                <td><?php echo $rows['ID_NUMBER'];?></td>
                <td><?php echo $rows['DATE_RECEIVED'];?></td>
                <td><?php echo $rows['APPOINTMENT_CRITERIA'];?></td>
				<td><?php echo $rows['APPOINTMENT_DATE'];?></td>
                      <td><?php echo ($row['APPOINTMENT_DATE'] == '1')?'':''; ?></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No user(s) found.....</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


	
</body>
</html>





