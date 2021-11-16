<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- css externo -->
		<link rel="stylesheet" type= "text/css" href="index.css"/>

		<!-- font-family shippori -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto&family=Shippori+Antique&family=Shippori+Antique+B1&display=swap" rel="stylesheet">

	</head>

	<body>

		<?php 

			//capta a variável erro passada pelo htttps do browser
			//se a variável for iniciada passa o valor 1 a variável, caso não, passa o valor 0
			$erro = isset($_GET['erro'])? $_GET['erro'] : 0;

		?>

		<div class="container">

		<div>
		<h1 class="title">Bem vindo ao twitter clone</h1>
		<p class="subtitle">Veja o que está acontecendo agora...</p>
		</div>

		</div>

	    <a href="inscreva-se.php">Inscrever-se</a>
	            
		<form method="post" action="valida_usuario.php" id="formLogin">
			<div class="form-group">
				<input type="email" class="form-control" id="campo_usuario" name="email" placeholder="Email" />
			</div>
								
			<div class="form-group">
				<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
			</div>
								
			<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

			<br /><br />
								
			<?php 


			?>

		</form>
	
	</body>
</html>