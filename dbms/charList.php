<?php 

include "dbCon.php";

$sql = "SELECT * FROM characterInfo";

$result = $con->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: #201f29;">

    <div class="container text-white">

        <h2>Characters</h2>
        
<table class="table text-white">

    <thead>

        <tr>

        <th>Character Name</th>

        <th>Character Description</th>

        <th>Actions</th>
        
        </tr>

    </thead>

    <tbody class=""> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['charName']; ?></td>

                    <td><?php echo $row['charDesc']; ?></td>

                    <td>
                    <a class="btn btn-warning" href="charEquipment.php?charID=<?php echo $row['charID']; ?>">Equipment</a> 
                    <a class="btn btn-info" href="charEdit.php?charID=<?php echo $row['charID']; ?>">Edit</a>
                    <a class="btn btn-danger" href="charDelete.php?charName=<?php echo $row['charName']; ?>">Delete</a>  </td>
                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

<a href="charAdd.php" type="button" class="btn-primary rounded mb-3 p-2" >Create Character</a>

    </div> 

</body>

</html>