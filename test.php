	<<?php
	$con = mysqli_connect("localhost", "root", "", "q2a");
	$user_query="SELECT `userid` FROM `qa_users` order by `userid` DESC limit 1";
	$res = mysqli_query($con, $user_query);
	while($row = $res -> fetch_assoc())
	{
		$user_id=$row['userid']+1;
	}
  $health = $_POST['health'];
  $health_eating = $_POST['health_eating'];
  $medicine = $_POST['medicine'];
  $exercise = $_POST['exercise'];
  $history = $_POST['history'];
  $World_history = $_POST['World_history'];
  $World_War = $_POST['World_War'];
  $Philosophy = $_POST['Philosophy'];
  $Technology = $_POST['Technology'];
  $Science = $_POST['Science'];
  $Phisics = $_POST['Phisics'];
  $Computer_science = $_POST['Computer_science'];
  $Design = $_POST['Design'];
  $Photography = $_POST['Photography'];
  $Fine_art = $_POST['Fine_art'];
  $Web_design = $_POST['Web_design'];
	$con = mysqli_connect("localhost", "root", "", "q2a");
	$query = "INSERT INTO  `q2a`.`qa_interesting` (
	`users_id`,
	`health`,
	`health_eating`,
	`medicine`,
	`exercise`,
	`history`,
	`World_history`,
	`World_War`,
	`Philosophy`,
	`Technology`,
	`Science`,
	`Phisics`,
	`Computer_science`,
	`Design`,
	`Photography`,
	`Fine_art`,
	`Web_design`
	)
	VALUES (
				{$user_id},
				{$health},
				{$health_eating},
				{$medicine},
				{$exercise},
				{$history},
				{$World_history},
				{$World_War},
				{$Philosophy},
				{$Technology},
				{$Science},
				{$Phisics},
				{$Computer_science},
				{$Design},
				{$Photography},
				{$Fine_art},
				{$Web_design}
						)";
	$result = mysqli_query($con, $query);
  ?>
