<?php

include("dbCon.php");

$check="";

$charID = $_GET['charID'];


    $sql = "SELECT * FROM `characterinfo` WHERE charID='$charID'";

     $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $charData = mysqli_fetch_assoc($result);
    }else{
        $check="Error 1";
    };

    $statsql = "SELECT * FROM `characterstats` WHERE charID='$charID'";

     $qresult = $con->query($statsql);

        if ($qresult->num_rows > 0) {
            $charStats = mysqli_fetch_assoc($qresult);
    }else{
        $check="Error 2";
    };

    $wepName = $charStats['weaponName'];
    $equipName = $charStats['equipmentName'];

    $wepsql = "SELECT * FROM `weapon` WHERE weaponName='$wepName'";

     $wresult = $con->query($wepsql);

        if ($wresult->num_rows > 0) {
            $wepStats = mysqli_fetch_assoc($wresult);
    }else{
        $check="Error 3";
    };

    $equipsql = "SELECT * FROM `equipment` WHERE equipmentName='$equipName'";

     $eresult = $con->query($equipsql);

        if ($eresult->num_rows > 0) {
            $equipStats = mysqli_fetch_assoc($eresult);
    }else{
        $check="Error 4";
    };



if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$charName = $_POST['charName'];
		$charDesc = $_POST['charDesc'];

		if(!empty($charName) && !empty($charDesc) && !is_numeric($charName) && !is_numeric($charDesc))
		{
			$checkQuery = "SELECT * FROM characterinfo WHERE charName = '$charName'";
			$checkResult = mysqli_query($con, $checkQuery);

			if($checkResult)
			{
				if($checkResult && mysqli_num_rows($checkResult) > 0)
				{
					$check = "Character already exists!";
				}else
					{

					$query = "UPDATE characterinfo SET charName = '$charName',charDesc = '$charDesc' where charID = '$charID' ";

					mysqli_query($con, $query);

					header("Location: charList.php");
					die;
					}
				
			}
		}
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBMS</title>
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<body class="d-flex flex-column min-vh-100" style="background-color: #201f29;">
	
<header class="text-center mt-5 text-white display-4">
	Character Equipment
</header>

<div class="container text-white">

<h2><?php echo $charData['charName'];  ?></h2>
<h2><?php echo $check; ?></h2>

<table class="table text-white">

<thead>

<tr>

<th>Details</th>

<th>HP</th>

<th>Attack</th>

<th>Defense</th>

<th>Speed</th>

<th>Actions</th>

</tr>

</thead>

<tbody class=""> 
         
            <tr>

            <td>Base Stats</td>

            <td><?php echo $charStats['HP']; ?></td>

            <td><?php echo $charStats['ATK']; ?></td>

            <td><?php echo $charStats['DEF']; ?></td>

            <td><?php echo $charStats['SPEED']; ?></td>
            </tr> 

            <tr>
            
            <td><?php echo $wepStats['weaponName']; ?></td>

            <td><?php echo $wepStats['HP']; ?></td>

            <td><?php echo $wepStats['ATK']; ?></td>

            <td><?php echo $wepStats['DEF']; ?></td>

            <td><?php echo $wepStats['SPEED']; ?></td>

            <td>
            <a class="btn btn-info" href="charEdit.php?charID=<?php echo $row['charID']; ?>">Change</a>
            <a class="btn btn-danger" href="charDelete.php?charName=<?php echo $row['charName']; ?>">Unequip</a>  </td>
            </tr> 

            <tr>

            <td><?php echo $equipStats['equipmentName']; ?></td>

            <td><?php echo $equipStats['HP']; ?></td>

            <td><?php echo $equipStats['ATK']; ?></td>

            <td><?php echo $equipStats['DEF']; ?></td>

            <td><?php echo $equipStats['SPEED']; ?></td>

            <td>
            <a class="btn btn-info" href="charEdit.php?charID=<?php echo $row['charID']; ?>">Change</a>
            <a class="btn btn-danger" href="charDelete.php?charName=<?php echo $row['charName']; ?>">Unequip</a>  </td>
            </tr>                                    



            <!-- <tr class="text-primary">
            <td class="">Total Stats</td>

            <td><?php echo $charStats['HP']; ?></td>

            <td><?php echo $charStats['ATK']; ?></td>

            <td><?php echo $charStats['DEF']; ?></td>

            <td><?php echo $charStats['SPEED']; ?></td>
            </tr>  -->

            
</tbody>

</table>

<a href="charList.php" type="button" class="btn-primary rounded mb-3 p-2" >View Characters</a>

</div> 

	

		
</body>