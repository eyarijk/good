<?
top("Вхід",3);
valid_new();
?>
 <section class="main wrapper">
		<article>
<center style="margin-bottom: 200px;">
<h1 class="title" style="margin-bottom:25px;font-size: 35px;"><a href="#">Вхід</a></h1>
<div>
 <form method="post" action="/glogin">
	<p><input type="text" name="emaill" placeholder="Електронна адреса" required class="input-login"></p>
	<p><input class="input-login" type="password" name="password" placeholder="Пароль" required ></p>
	<p style="margin-top: 10px;margin-bottom: 10px;">Не зареєстровані? <a href="/register" style="text-decoration: none; color:#4CDA64; margin-left: 10px; font-size: 16px;">Регистрация</a></p>
	<input type="submit" name="login" value="Вхід" class="input-button" style=" width: 100px;">  
 </form>	
 </div>
</center >
</article>
</section><!-- Main End -->

<? bottom();?>