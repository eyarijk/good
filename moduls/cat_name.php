<? 
include "db.php";


$rows = mysqli_query($db, "SELECT * FROM `categories`");

			while ($row = mysqli_fetch_assoc($rows)) {
				$coun = $row['name_ru'];
 				$total .= $coun.";";
 				$count_id = $row['id'];
 				$total_id .= $count_id.";";
}
$fname= fopen("cat_name.txt", "w+");
fwrite($fname, $total);
fclose($fname);
$fname_id = fopen("cat_id.txt", "w+");
fwrite($fname_id, $total_id);
fclose($fname_id);
message ('Успіх','Оновлено','success');


			?>

