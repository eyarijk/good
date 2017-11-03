<? 
include "db.php";


$rows = mysqli_query($db, "SELECT * FROM `categories`");

while ($row = mysqli_fetch_assoc($rows)) {
		$ro = mysqli_query($db, "SELECT * FROM `goods` WHERE `cid` = $row[id] AND `action` = 1");
		$coun= 0;
		while (mysqli_fetch_assoc($ro)) {
				$coun++;
		}
		if(isset($count))
			$coun = $count;
 		$total .= $coun.";";
}
$fname= fopen("count_cat.txt", "w+");
fwrite($fname, $total);
fclose($fname);

?>

