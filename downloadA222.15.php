<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>downloadA222.php</title>
</head>
<body>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Record List
            <a href="csvA222.15.php" class="btn btn-success pull-right">Export Record</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
					<th>Name_of_Applicant</th>
                <th>Date Received</th>
                <th>Positions</th>
                <th>Number of Positions</th>
                <th>No_of_Positions_Recommended</th>
                <th>No_of_Positions_not_Recommended</th>
                <th>Remarks</th>
                <th>Exemption_end_date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //include database configuration file
                    include 'configA222.php';
                    
                    //get records from database
                    $query = $db->query("SELECT * FROM a22215 ORDER BY Date_Received DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){ ?>                
                    <tr>
                     
                <td><?php echo $rows['Name_of_Applicant'];?></td>
                <td><?php echo $rows['Date_Received'];?></td>
                <td><?php echo $rows['Positions'];?></td>
                <td><?php echo $rows['Number_of_Positions'];?></td>
                <td><?php echo $rows['No_of_Positions_Recommended'];?></td>
				<td><?php echo $rows['No_of_Positions_not_Recommended'];?></td>
                <td><?php echo $rows['Remarks'];?></td>
                <td><?php echo $rows['Exemption_end_date'];?></td>
                      <td><?php echo ($row['Exemption_end_date'] == '1')?'':''; ?></td>
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





