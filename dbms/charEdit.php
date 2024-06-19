<?php

include("dbCon.php");

$check="";

if (isset($_GET['charID'])) {

    $charID = $_GET['charID'];

    $sql = "SELECT * FROM `characterinfo` WHERE charID='$charID'";

     $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $charData = mysqli_fetch_assoc($result);
    }else{
        $check = "Error!";
    }

} 

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
	Character Creation
</header>

    <div class="text-center py-5">  

	<form action="" method="post">

                <input class="rounded" type="text" name="charName" id="" value="<?php echo $charData['charName'] ?>" placeholder="Character Name"required>
                <br>
                <textarea class="rounded mt-3" name="charDesc" id="" style="resize: none; height: 20vh; width: 50vh" placeholder="Description" required><?php echo $charData['charDesc'] ?></textarea>
                <br>
                <input class="mt-3 btn-primary rounded" type="submit" value="Add">

            </form>
			<a href="charList.php" type="button" class="btn-primary rounded mt-3 p-1">View Characters</a>
			<div class="text-white mt-4">
				<?php
					echo $check;
				?>
			</div>
	</div>

	

		
</body>