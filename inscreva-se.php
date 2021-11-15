<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- style css -->
		<link rel="stylesheet" type= "text/css" href="inscreva-se.css"/>

		<!-- font shippori -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto&family=Shippori+Antique&family=Shippori+Antique+B1&display=swap" rel="stylesheet">
	</head>

	<body>

		<navbar class="navbar">
		<picture>
			<source media="(min-width:650px)" srcset="imagens/twitter_transparente.png">
			<source media="(min-width:465px)" srcset="imagens/twitter_transparente.png">
			<img src="imagens/twitter_transparente.png" style="width:80px;">
		</picture>
			<a href="index.php">Voltar</a>
		</navbar>

	    <div class="container">
				
				<h3 class="title">Acontecendo agora</h3>
	    		<br />
				
	    		<h2 class="subtitle">Inscreva-se no Twitter hoje mesmo.</h2>
	    		<br />

				<div class="container_forms">
				<form method="post" action="registra_usuario.php" id="formCadastrarse">
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

	    </div>
	
	</body>
</html>