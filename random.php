<?

if($_POST['id']){
	$ro = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `goods` WHERE `id` > $_POST[id]  AND `action` = 1"));
	go("service.php?id=$ro[id]");
}
?>
