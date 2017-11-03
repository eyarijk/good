<? 
include "index.php";
top("Каталог");
if(isset($_GET['page']))
	$page = (integer)($_GET['page']);
else 
	$page = 1;

$nums_articles = 10;
$count_articles_to = ($page-1)*$nums_articles;

?>

<section class="main wrapper" style="margin-bottom: 40px;">


<? if(isset($_GET['cat'])){
 	$rows = mysqli_query($db, 'SELECT * FROM `goods` WHERE `cid` = '.$_GET['cat'].' AND `action` = 1');
 	$page_num=mysqli_num_rows($rows);
 	$rows = mysqli_query($db, 'SELECT * FROM `goods` WHERE `cid` = '.$_GET['cat'].' AND `action` = 1 ORDER BY `id` DESC LIMIT '.$count_articles_to.','.$nums_articles.' ');
 	$num_row=mysqli_num_rows($rows);
 	for ($i = 0; $row = mysqli_fetch_assoc($rows);$i++) {
 		$user_name = mysqli_fetch_assoc(mysqli_query($db,'SELECT `name` FROM `users` WHERE `id` = '.$row['uid'].' '));
 		if($i === ($num_row-1)) $styls = ' ';
 		else $styls = '<hr style="margin-top: 40px;">';		
 		echo '<article style="margin-top: 40px;margin-bottom: 0;"><div class="article_image"><a href="#">
 		<img class="image" src="img/shop/'.$row['uid'].'/'.substr($row['img'], 0, strpos($row['img'], ';' )).'" id="images"></a></div>
		<div class="post" style="margin-right: 30px;">
				<h2 style="font-size: 22px;" class="title">
				<a href="/service.php?id='.$row['id'].'" style="font-size:25px;">'.$row['name'].'</a>
				</h2>
				<p><h3 style="font-size: 20px;"><img src="img/price.png" class="icon"> '.$row['price'].' '.$row['currency'].'</h3></p>
				<p><img src="img/time.png" class="icon"> '.real_date($row['date']).'</p>
				<p><img src="img/here.png" class="icon"> '.$row['city'].'</p>
				<p><img src="img/profile.png" class="icon"> <a class="link_shop infor" href="/categories.php?uid='.$row['uid'].'&page=1">'.$user_name['name'].'</a></p>
				<a class="read_more" href="/service.php?id='.$row['id'].'">Переглянути більше <i class="read_more_arrow"></i> </a>
			</div>
		</article >'.$styls.'';

				
	}
}

elseif(isset($_GET['search'])){
		$rows = mysqli_query($db, 'SELECT * FROM `goods` WHERE `name` LIKE "%'.$_GET['search'].'%" ');
 	$page_num=mysqli_num_rows($rows);
 	$rows = mysqli_query($db, 'SELECT * FROM `goods` WHERE `name` LIKE "%'.$_GET['search'].'%" AND `action` = 1 ORDER BY `id` DESC LIMIT '.$count_articles_to.','.$nums_articles.' ');
 	$num_row=mysqli_num_rows($rows);
 	for ($i = 0; $row = mysqli_fetch_assoc($rows);$i++) {
 		$user_name = mysqli_fetch_assoc(mysqli_query($db,'SELECT `name` FROM `users` WHERE `id` = '.$row['uid'].' '));
 		if($i === ($num_row-1)) $styls = ' ';
 		else $styls = '<hr style="margin-top: 40px;">';		
 		echo '<article style="margin-top: 40px;margin-bottom: 0;"><div class="article_image"><a href="#">
 		<img class="image" src="img/shop/'.$row['uid'].'/'.substr($row['img'], 0, strpos($row['img'], ';' )).'" id="images"></a></div>
		<div class="post" style="margin-right: 30px;">
				<h2 style="font-size: 22px;" class="title">
				<a href="/service.php?id='.$row['id'].'" style="font-size:25px;">'.$row['name'].'</a>
				</h2>
				<p><h3 style="font-size: 20px;"><img src="img/price.png" class="icon"> '.$row['price'].' '.$row['currency'].'</h3></p>
				<p><img src="img/time.png" class="icon"> '.real_date($row['date']).'</p>
				<p><img src="img/here.png" class="icon"> '.$row['city'].'</p>
				<p><img src="img/profile.png" class="icon"> <a class="link_shop infor" href="/categories.php?uid='.$row['uid'].'&page=1">'.$user_name['name'].'</a></p>
				<a class="read_more" href="/service.php?id='.$row['id'].'">Переглянути більше <i class="read_more_arrow"></i> </a>
			</div>
		</article >'.$styls.'';

				
	}
}


elseif(isset($_GET['uid'])){
 	$rows = mysqli_query($db, 'SELECT * FROM `goods` WHERE `uid` = '.$_GET['uid'].' AND `action` = 1');
 	$page_num=mysqli_num_rows($rows);
 	$rows = mysqli_query($db, 'SELECT * FROM `goods` WHERE `uid` = '.$_GET['uid'].' AND `action` = 1 ORDER BY `id` DESC LIMIT '.$count_articles_to.','.$nums_articles.' ');
 	$num_row=mysqli_num_rows($rows);
 	for ($i = 0; $row = mysqli_fetch_assoc($rows);$i++) {
 		$user_name = mysqli_fetch_assoc(mysqli_query($db,'SELECT `name` FROM `users` WHERE `id` = '.$_GET['uid'].' '));
 		if($i === ($num_row-1)) $styls = ' ';
 		else $styls = '<hr style="margin-top: 40px;">';		
 		echo '<article style="margin-top: 40px;margin-bottom: 0;"><div class="article_image"><a href="#">
 		<img class="image" src="img/shop/'.$row['uid'].'/'.substr($row['img'], 0, strpos($row['img'], ';' )).'" id="images"></a></div>
		<div class="post" style="margin-right: 30px;">
				<h2 style="font-size: 22px;" class="title">
				<a href="/service.php?id='.$row['id'].'" style="font-size:25px;">'.$row['name'].'</a>
				</h2>
				<p><h3 style="font-size: 20px;"><img src="img/price.png" class="icon"> '.$row['price'].' '.$row['currency'].'</h3></p>
				<p><img src="img/time.png" class="icon"> '.real_date($row['date']).'</p>
				<p><img src="img/here.png" class="icon"> '.$row['city'].'</p>
				<p><img src="img/profile.png" class="icon"> <a class="link_shop infor" href="/categories.php?uid='.$row['uid'].'&page=1">'.$user_name['name'].'</a></p>
				<a class="read_more" href="/service.php?id='.$row['id'].'">Переглянути більше <i class="read_more_arrow"></i> </a>
			</div>
		</article >'.$styls.'';

				
	}
}elseif($_GET['favorite']){
	$favorite_count = explode(';', $_SESSION['favorite']);
	array_pop($favorite_count);
	$page_num = count($favorite_count);
	foreach ($favorite_count as $key => $value) {
		if($value == end($favorite_count)) $styls = ' ';
 		else $styls = '<hr style="margin-top: 40px;">';	
		$row = mysqli_fetch_assoc(mysqli_query($db,'SELECT * FROM `goods` WHERE `id` = '.$value.' '));
		$user_name = mysqli_fetch_assoc(mysqli_query($db,'SELECT `name` FROM `users` WHERE `id` = '.$row['uid'].' '));
		echo '<article style="margin-top: 40px;margin-bottom: 0;"><div class="article_image"><a href="#">
 		<img class="image" src="img/shop/'.$row['uid'].'/'.substr($row['img'], 0, strpos($row['img'], ';' )).'" id="images"></a></div>
		<div class="post" style="margin-right: 30px;">
				<h2 style="font-size: 22px;" class="title">
				<a href="/service.php?id='.$row['id'].'" style="font-size:25px;">'.$row['name'].'</a>
				</h2>
				<p><h3 style="font-size: 20px;"><img src="img/price.png" class="icon"> '.$row['price'].' '.$row['currency'].'</h3></p>
				<p><img src="img/time.png" class="icon"> '.real_date($row['date']).'</p>
				<p><img src="img/here.png" class="icon"> '.$row['city'].'</p>
				<p><img src="img/profile.png" class="icon"> <a class="link_shop infor" href="/categories.php?uid='.$row['uid'].'&page=1">'.$user_name['name'].'</a></p>
				<a class="read_more" href="/service.php?id='.$row['id'].'">Переглянути більше <i class="read_more_arrow"></i> </a>
			</div>
		</article >'.$styls.'';
	}
}



$next = $_GET;
$next['page']++;
$urls_next = '?';
foreach ($next as $key => $value) {
	$count_get = count($next);
	$urls_next .= $key.'='.$value;
	if($count_get > 0) {
		$urls_next .= "&";
		$count_get--;
	}
}
$previous = $_GET;
$previous['page']--;
$urls_previous = '?';
foreach ($previous as $key => $value) {
	$count_get = count($_GET);
	$urls_previous .= $key.'='.$value;
	if($count_get > 0) {
		$urls_previous .= "&";
		$count_get--;
	}
}
$total = $page_num - $page * $nums_articles;
$nums_on_query = '<h1 style="color: #818181;margin-left: 350px; position: absolute;padding-bottom:10px;"><span>Всього оголошень по цьому запиту: '.$page_num.'</span></h1>';
?>
<nav class="pagination" style="margin-top: 30px;">
	<?if($_GET['page'] > 1){ 
		if ($total > 0){?>
			<a href="categories.php<?=$urls_previous?>" class="previous"><i></i>Попереднє</a>
			<?=$nums_on_query?>
			<a href="categories.php<?=$urls_next?>" class="next">Наступне<i></i></a>
	<?	}else{?> 
			<?=$nums_on_query?>
			<a href="categories.php<?=$urls_previous?>" class="previous"><i></i>Попереднє</a>
 			<?} 
	} elseif($_GET['page'] == 1 and $total < 10){ ?>
		<?=$nums_on_query?>
		<? }
		else{ ?>
			<a href="categories.php<?=$urls_next?>"  class="next">Наступне<i></i></a>
			<?=$nums_on_query?>
		<? }?>



</nav>
<?  bottom();?>