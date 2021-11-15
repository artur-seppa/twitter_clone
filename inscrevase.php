<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- style css -->
		<link rel="stylesheet" type= "text/css" href="inscrevase.css"/>

	</head>

	<body>

		<navbar class="navbar">
		<picture>
			<source media="(min-width:650px)" srcset="imagens/twitter_transparente.png">
			<source media="(min-width:465px)" srcset="imagens/twitter_transparente.png">
			<img src="imagens/twitter_transparente.png" style="width:60px;">
		</picture>
			<a href="index.php">Voltar</a>
		</navbar>

	    <div class="container">
				
				<h3 class="title">Acontecendo agora</h3>
	    		<br />
				
	    		<h2 class="subtitle">Inscreva-se no Twitter hoje mesmo.</h2>
	    		<br />
				<form method="post" action="" id="formCadastrarse">
					<div class="form-group">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
					</div>
					

					<button type="submit" class="form-bottom">Inscreva-se</button>


				</form>


	    </div>
	
	</body>
</html>