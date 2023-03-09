<?php	session_start();
	$_SESSION['token'] = "f7=Rd98$0!asf" ;
    ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>お問い合わせ - FITTED</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@1,500&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="container">
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

    <div class="contents">
        <div class="container">
            <article>
            <section id="input" class="">
                <h1>お問い合わせ</h1>
                <p>ご意見、ご感想などがありましたら、以下の欄にご記入の上、送信してください。記事に関するご質問などもお気軽にお寄せください。
                </p>

                <form id="fm" method="post" action="soshin.php">
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>"> 
                    <p>
                        <label>名前：</label>
                        <input type="text" id="name" name="name" class="abcd" required value="test">
                    </p>

                    <p><label>メールアドレス：</label>
                       <input type="email" id="mail" name="mail" class="abcd" required value="test@asdf.ff">
</p>
                    <p><label>コメント：</label>
					<textarea id="comment" name="comment" class="abcd" required >TEST TEST</textarea>
                        </p>
                        <p><input id="btn_confirm" type="button" value="確認へ"></p>
                        </form>
              </section>       
            </article>

            <h2>確認してください</h2>
		<ul id="confirm" class="hidden">
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
			</li>			<li>
					<input id="btn_return" type="button" value="戻る">
				  <input id="btn_submit" type="button" value="送信">
			</li>
		<ul>
        </article>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$("#btn_confirm").click(function(){
			$('.abcd').each(function(i,e){
				$('.efgh').eq(i).text($(e).val());
			});

				$('#confirm').removeClass('hidden');
				$('#input').addClass('hidden');
		});
		$("#btn_return").click(function(){
				$('#confirm').addClass('hidden');
				$('#input').removeClass('hidden');
		});
		$("#btn_submit").click(function(){
			$('#fm').submit();
		});
</script>

            <div class="sub">
                <aside class="profile">
                    <h2>PROFILE</h2>
                    <figure>
                        <img src="img/foot.svg" alt="FITTEDの管理人">
                    </figure>
                    <p>街歩き＆食べ歩きがライフスタイル。天気がいい日はあちこちに出没しています。</p>
                </aside>

                <aside class="topics">
                    <h2>TOPICS</h2>
                    <ul>
                        <a href="#">
                            <figure><img src="img/tomato.jpg" alt=""></figure>
                            <h3>甘いトマトとすっぱいトマト</h3>
                        </a>
                        <li>

                        </li>
                        <li>
                            <a href="#">
                                <figure><img src="img/cycle.jpg" alt=""></figure>
                                <h3>自転車で行けるところまで行ってみる</h3>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <figure><img src="img/green.jpg" alt=""></figure>
                                <h3>緑のワンポイント</h3>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <figure><img src="img/time.jpg" alt=""></figure>
                                <h3>タイムアタックでやる気を出してみる</h3>
                        </li>
                    </ul>
                    </a>
                </aside>
            </div>

        </div>
    </div>

    <footer>
        © FITTED
    </footer>

</body>

</html>