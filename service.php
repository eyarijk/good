<? 
include "index.php";


$query = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM `goods` WHERE `id` = '.$_GET['id'].' '));
$categorie = mysqli_fetch_assoc(mysqli_query($db,'SELECT `name_ru` FROM `categories` WHERE `id` = '.$query['cid'].' '));
$about_id = mysqli_fetch_assoc(mysqli_query($db,'SELECT * FROM `users` WHERE `id` = '.$query['uid'].' '));
$next_service = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `goods` WHERE `id` < $_GET[id]  AND `action` = 1"));
$previous_service = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `goods` WHERE `id` > $_GET[id]  AND `action` = 1"));

if ($query['date'] === date("Y-m-d")) $query['date'] = "Сьогодні";

$query['img'] = explode(";", $query['img']);

if($query['status'] == 1) $query['status'] = "Новий";
  else $query['status'] = "Б/у";

if($query['export'] == 1) $query['export'] = "Так";
  else $query['export'] = "Ні";


$files_count = count($query['img'])-1;

top($query['name']);

$arr = explode(';', $_SESSION['favorite']);
foreach ($arr as $value) {
	if($value == $query['id']){
		$favorite_on = "favorite_on.png";
		break;
	}else{
		$favorite_on = "favorite_off.png";
	}
}
 ?>

<section class="main wrapper">
	<article>
		<div class="article_image">
			<div class="slider">
		      <ul class="slides">
		        <? for ($i=0; $i < $files_count; $i++) { 
		          echo '<li class="slide">
		          <figure>
		            <img src="img/shop/'.$query['uid'].'/'.$query['img'][$i].'" class="image">
		          </figure>';
		        } ?>
		        
		      </ul>
    		</div>
			<script type="text/javascript">
					$(function(){
					  $('.slider').glide({
					    autoplay: 3000,
					    hoverpause: false, 
					    arrowRightText: '&rarr;',
					    arrowLeftText: '&larr;'
					  });
					});
			</script>
			<div class="information">
				<p><img src="img/profile.png" class="icon"> <a  style="font-size: 20px; text-decoration: none; color: #4CDA64;" href="categories.php?uid=<?=$query['uid']?>&page=1 " class="infor"><?=$about_id['name']?></a></p>
				<p><img src="img/telephone.png" class="icon"> +<?=$about_id['telephone']?></p>
          <?if($about_id['email_action'] == 1){?>
				<p><img src="img/email.png" class="icon"> <?=$about_id['email']?></p>
          <?}?>
				<p><img src="img/here.png" class="icon">Місто: <?=$about_id['city']?></p>
				<p><img src="img/category.png" class="icon">Категорія: <a class="infor" style="font-size: 20px; text-decoration: none; color: #4CDA64;" href="categories.php?cat=<?=$query['cid']?>&page=1"><?=$categorie['name_ru']?></a></p>
				<p><img src="img/export.png" class="icon"> Експорт: <?=$query['export'];?></p>
				<?if($_SESSION['id'] == $query['uid']) {?>
					<hr>
					<p><img src="img/pause.png" class="icon"> <span class="edit">Призупинити оголошення</span> </p>
					<p><img src="img/edit.png" class="icon"> <span class="edit">Редагувати оголошення</p>
					<p><img src="img/delete.png" class="icon"> <span class="edit">Видалити оголошення</span> </p>
				<?}?>
			</div>
		</div>
			<div class="post">
				<h1 class="title" style="margin-bottom: 25px;">
					<a href="#"><?=$query['name']?></a>
				</h1>
				<h1 style="font-size: 30px; color: #4E4D4D; margin-bottom: 22px;"><img src="img/price.png" class="icon"> <?=$query['price']?> <?=$query['currency']?> <? if($query['short'] == 1) { ?> <span style="font-size: 18px; color: #4CDA64;">Можливий торг</span><?}?>
				<? if(!$_SESSION['id'] or ($_SESSION['id'] == $query['uid'])) { $i=1; 
				}else{?>
					<img src="img/<?=$favorite_on?>" id="favorite" style="cursor: pointer;float: right;margin-right: 10px;" onclick="openbox('favorite');" width="32" height="32" >
					<input type="hidden" name="favorite_value" value="<?=$query['id']?>" id="favorite_value"><?}?></h1>
				<p><?=$query['chars']?></p>
			</div>
	</article>
	<nav class="pagination">
		<?if(isset($next_service['id'])){?>
			<a href="service.php?id=<?=$next_service[id]?>" class="previous"><i></i>Попереднє</a>
		<?} ?>
		<?if(isset($previous_service['id'])){?>
			<a href="service.php?id=<?=$previous_service[id]?>" class="next">Наступне<i></i></a>
		<?} ?>
	</nav><!-- Pagination End -->
</section><!-- Main End -->

<script src="js/favorite.js"></script>



<? bottom();?>