<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<meta name="author" content="Mr Evrey">
	<link rel="icon" href="img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/css/reset.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/sweetalert.js"></script>
	<script type="text/javascript" src="/js/form.js"></script>
	<script type="text/javascript" src="/js/jquery.glide.min.js"></script>

</head>
<body >
	<header>
	<a href="/"><img src="img/logo.png" class="h_logo" alt="Blogin" title="" style="margin-left: 5%;"></a>
		<form action="categories.php" method="get" style="padding: 0;margin: 0;" class="noplay">
		<div class="wrapper">
			<input type="text" name="search" class="search search-inp" placeholder="Що шукаємо? ">
			<input type="hidden" name="page" value="1">
			<input type="submit" name="search_btn" value="Знайти" class="search search-btn">
			<nav>
				<ul class="main_nav">
					<li <? if($what_is == 2) echo 'class="current"'; ?>><a href="/">Головна</a></li>
					<? if(isset($_SESSION['id'])){
						if($what_is == 1)
							echo '<li><a style="color:#FA483E;" class="out" >Вихід</a></li>';
						else{
					 ?> <li><a href="/profile">Профіль</a></li>
					 <?}}else{?>
					 <li <? if($what_is == 3) echo 'class="current"'; ?>><a href="/login">Вхід</a></li>
					<?}?>
				</ul>
			</nav>
		</div>
		</form>
	</header>