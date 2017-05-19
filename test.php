<?php


$con = mysqli_connect("localhost", "root", "", "q2a");

$user_query="SELECT `userid` FROM `qa_users` order by `userid` DESC limit 1";
$res = mysqli_query($con, $user_query);
$num_rows=$res->num_rows;
if( $num_rows == 0)
{
$user_id=1;
}
else{
while($row = $res -> fetch_assoc())
{
	$user_id=$row['userid'];
	$user_id=$user_id+1;
}}
// $user_query="SELECT `userid` FROM `qa_users`";
// $res = mysqli_query($con, $user_query);
// $flag=0;
// while($row = $res -> fetch_assoc())
// {
// 	if($user_id==$row['users_id'];){
// 		$flag=1;
// 	}
// }
// if($flag==0){
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
$Physics = $_POST['Physics'];
$Computer_science = $_POST['Computer_science'];
$Design = $_POST['Design'];
$Photography = $_POST['Photography'];
// $query = "INSERT INTO  `q2a`.`qa_interesting` (`users_id`,`health`)VALUES({$Photography},{$Photography})";
// $res = mysqli_query($con, $query);
$Fine_art = $_POST['Fine_art'];
$Web_design = $_POST['Web_design'];
// $con = mysqli_connect("localhost", "root", "", "q2a");
// $query = "INSERT INTO  `q2a`.`qa_interesting` (`users_id`,`health`)VALUES({$Photography},{$Photography})";
// $res = mysqli_query($con, $query);
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
`Physics`,
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
			{$Physics},
			{$Computer_science},
			{$Design},
			{$Photography},
			{$Fine_art},
			{$Web_design}
					)";
$res= mysqli_query($con, $query);
$query="SELECT `userid` FROM `qa_users` order by `userid` DESC limit 1";
$res = mysqli_query($con, $query);
while($row = $res -> fetch_assoc())
{
	$user_id_users=$row['userid'];
}
$query="SELECT `users_id` FROM `qa_interesting` order by `users_id` DESC limit 1";
$res = mysqli_query($con, $query);
while($row = $res -> fetch_assoc())
{
	$user_id_inter=$row['userid'];
}
if($user_id_users==$user_id_inter)
{
	//do no thing
}
else {
	$query="delete * FROM `qa_interesting` where `users_id`={$user_id_inter}";
	$res = mysqli_query($con, $query);
}

// }

?>
