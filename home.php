<? top("Головна",2);
?>


<section class="main wrapper">
		<div class="menu">
		<ul class="cat-list">

<? 
$fname = fopen("moduls/count_cat.txt", "r+");
$count_cat = stream_get_contents($fname);
$count = explode(";", $count_cat);
fclose($fname); 

$rows = mysqli_query($db, "SELECT * FROM `categories`");
	for ($i = 0; $row = mysqli_fetch_assoc($rows);$i++) {
 		echo '<li class="cat-item">
 			<a href="categories.php?cat='.$row['id'].'&page=1" class="cat-link" id="link">'.$row['style'].''.$row['name_ru'].'</a>
			<br>
			<span>('.$count[$i].')</span>
			</li>';
				
	}



?>

		</ul>
	</div>
	</section><!-- Main End -->

<? bottom(); ?>