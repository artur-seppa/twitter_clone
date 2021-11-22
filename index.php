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

				if(email == "" ){
					// altera a cor do input quando vazio
					let el = document.getElementById('campo_email');
					el.style.cssText = 'border: 2px solid #F26E1D;';
					document.getElementById('erro_email').innerHTML = '<p>Preencha o email</p>';
					campo_vazio = true;
					
				}

				if(senha == "" ){
					// altera a cor do input quando vazio
					let el = document.getElementById('campo_senha');
					el.style.cssText = 'border: 2px solid  #F26E1D;';
					document.getElementById('erro_senha').innerHTML = '<p>Preencha a senha</p>';
					campo_vazio = true;
  
				}

				if(campo_vazio) return false;
				
			}

		</script>
	</head>

	<body>

		<?php 

			//capta a variável erro passada pelo htttps do browser
			//se a variável for iniciada passa o valor 1 a variável, caso não, passa o valor 0
			$erro = isset($_GET['erro'])? $_GET['erro'] : 0;

		?>

		<div class="container">

		<div class="logo">
			<picture>
				<source media="(max-width:650px)" srcset="imagens/twitter_icon_bigger.png">
				<source media="(max-width:465px)" srcset="imagens/twitter_icon_bigger.png">
				<img src="imagens/twitter_icon_bigger.png" style="width:500px;">
			</picture>
		</div>

		<div class="conteudo">
		<h1 class="title">Bem vindo ao twitter clone</h1>
		<p class="subtitle">Veja o que está acontecendo agora...</p>
	
	            
		<form method="post" action="valida_usuario.php" id="formLogin">

			<div class="links_forms">

			<label for="campo_email" 
				style = 'text-decoration: none;
    			font-size: 1.3rem;
    			font-weight: 600;
				padding-right: 3%'>
				<p>Login</p>
			</label>

			<a href="inscreva-se.php">Inscrever-se</a>

			</div>

			<div class="form-group">
				<input type="email" required  class="form-control" id="campo_email" name="email" placeholder="Email"/> <!-- retira a mensagem default do required -->
				<span id="erro_email"></span>
			</div>
								
			<div class="form-group">
				<input type="password" required  class="form-control red" id="campo_senha" name="senha" placeholder="Senha"/> <!-- retira a mensagem default do required --> 
				<span id="erro_senha"></span>
			</div>
								
			<button type="buttom" class="form-bottom" id="btn_login" onclick="validaçao()">Entrar</button>

			<br /><br />
								
			<?php 

			if($erro == 1){
				echo "<p class='comunicado_erro'>Usuário e ou senha inválido(s)</p>"; 
			}

			?>

		</form>

		</div><!--conteudo-->
		</div><!--container-->

	</body>
</html>