<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>downloadA110.20.php</title>
</head>
<body>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Record List
            <a href="csvA110.20.php" class="btn btn-success pull-right">Export Record</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
					<th>Organization</th>
                <th>Date Received</th>
                <th>Department Division</th>
                <th>Approval Period</th>
                <th>Requested Section</th>
                <th>Date Sign by the Minister</th>
                <th>Exemp Contops</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //include database configuration file
                    include 'dbConfig.php';
                    
                    //get records from database
                    $query = $db->query("SELECT * FROM a11020 ORDER BY Date_Received DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){ ?>                
                    <tr>
                     
                <td><?php echo $rows['Organization'];?></td>
                <td><?php echo $rows['Date_Received'];?></td>
                <td><?php echo $rows['Department_Division'];?></td>
                <td><?php echo $rows['Approval_Period'];?></td>
                <td><?php echo $rows['Requested Section'];?></td>
				<td><?php echo $rows['Date_Sign_by _the_Minister'];?></td>
                <td><?php echo $rows['Exemp_Contops'];?></td>
                      <td><?php echo ($row['Exemp_Contops'] == '1')?'':''; ?></td>
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





