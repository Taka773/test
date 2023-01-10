<?php	session_start();
	$_SESSION['token'] = "f7=Rd98$0!asf" ;
	// ホントは関数でランダムなのを出す 
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>お問い合わせ - FITTED</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,700" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<header>
		<div class="">
			<a href="index.html">FITTED</a>
			<nav>
				<ul>
					<li><a href="index.html">トップ</a></li>
					<li><a href="about.html">サイトについて</a></li>
					<li><a href="contact.html">お問い合わせ</a></li>
				</ul>
			</nav>
		</div>
	</header>


	<article class="contents">
		<!-- 送信画面 -->
		<section id="input" class="">
			<h1>お問い合わせ</h1>
			<p>ご意見、ご感想などがありましたら、以下の欄にご記入の上、送信してください。記事に関するご質問などもお気軽にお寄せください。</p>
			
			<form id="fm" method="post" action="soshin.php">
				<input type="hidden" name="token" value="<?=$_SESSION['token']?>"> 
				<p>
					<label>	名前：	</label>
					<input type="text" id="name" name="name" class="abcd" required value="test">
				</p>
				
				<p>
					<label>	メールアドレス：</label>
					<input type="email" id="mail" name="mail" class="abcd" required value="test@asdf.ff">
				</p>
				
				<p>
					<label>	コメント：</label>
					<textarea id="comment" name="comment" class="abcd" required >TEST TEST</textarea>
				</p>
				
				<p><input id="btn_confirm" type="button" value="確認へ"></p>
			</form>
		</section>


		<!-- 確認画面  -->
		<h2>確認してください</h2>
		<ul id="confirm" class=" hidden">
			<li>
				<label>	名前：</label>
				<p class="efgh"></p>
			</li>
			
			<li>
				<label>	メールアドレス：</label>
				<p class="efgh"></p>
			</li>
			
			<li>
				<label>	コメント：</label>
				<p class="efgh"></p>
			</li>
			
			<li>
					<input id="btn_return" type="button" value="戻る">
				  <input id="btn_submit" type="button" value="送信">
			</li>
		<ul>
	</article>


	<footer>© FITTED</footer>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>

//確認ボタンクリック
		$("#btn_confirm").click(function(){
			$('.abcd').each(function(i,e){
				$('.efgh').eq(i).text($(e).val());
			});

				$('#confirm').removeClass('hidden');
				$('#input').addClass('hidden');
		});

//戻るクリック
		$("#btn_return").click(function(){
				$('#confirm').addClass('hidden');
				$('#input').removeClass('hidden');
		});

//送信クリック
		$("#btn_submit").click(function(){
			$('#fm').submit();
		});
</script>


</body>

</html>