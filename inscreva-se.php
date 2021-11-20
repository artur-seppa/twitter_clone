<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- style css -->
		<link rel="stylesheet" type= "text/css" href="inscreva-se.css"/>

		<!-- font-family shippori -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto&family=Shippori+Antique&family=Shippori+Antique+B1&display=swap" rel="stylesheet">

		<!-- javascript -->
		<script type="text/javascript" >

		/*const fields = document.querySelectorAll("[required]");

		function customValidation(event) {
			const field = event.target

			oninvalid="setCustomValidity(' ')";
		}

		for (field of fields){
			field.addEventListener("invalid", customValidation);
		}*/

			/*let email = document.getElementById('campo_email');
			let senha = document.getElementById('campo_senha');

			email.form.onsubmit = function(){
				email.setCustomValidity(' ');
			}

			senha.form.onsubmit = function(){
				email.setCustomValidity(' ');
			}*/

			                              
		
			function validaçao(){

				campo_vazio = false;
				
				let email = document.getElementById('campo_email').value;
				let senha = document.getElementById('campo_senha').value;
				let usuario = document.getElementById('campo_usuario').value;
				
				if(usuario == "" ){
					// altera a cor do input quando vazio
					let el = document.getElementById('campo_usuario');
					el.style.cssText = 'border: 2px solid  #F26E1D;';
					document.getElementById('erro_usuario').innerHTML = '<p>preencha o nome de Usuário</p>';
					campo_vazio = true;
  
				}

				if(email == "" ){
					// altera a cor do input quando vazio
					let el = document.getElementById('campo_email');
					el.style.cssText = 'border: 2px solid #F26E1D;';
					document.getElementById('erro_email').innerHTML = '<p>preencha o Email</p>';
					campo_vazio = true;
					
				}

				if(senha == "" ){
					// altera a cor do input quando vazio
					let el = document.getElementById('campo_senha');
					el.style.cssText = 'border: 2px solid  #F26E1D;';
					document.getElementById('erro_senha').innerHTML = '<p>preencha a Senha</p>';
					campo_vazio = true;
  
				}

				if(campo_vazio) return false;
				
			}

		</script>

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
						<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" required>
						<span id="erro_usuario"></span>
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="campo_email" name="email" placeholder="Email" required>
						<span id="erro_email"></span>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="campo_senha" name="senha" placeholder="Senha" required>
						<span id="erro_senha"></span>
					</div>
					
					<button type="submit" class="form-bottom" onclick="validaçao()">Inscreva-se</button>

				</form>
				</div>

	    </div>
	
	</body>
</html>