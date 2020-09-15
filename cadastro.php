
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Olá, mundo!</title>
	<style type="text/css">
		.cabecalho{
			background-color: #379d5b78;;
			font-size: 30px;
			text-align: center;
			padding: 10px;
			margin-bottom: 30px;
			color: white;
			font-weight: 900;
			border-radius: .5rem;
			margin-top: 10px;
		}
		.formularios{
			padding: 5px 5px;
			/* background-color: #E0E0E0 ;*/
			font-weight: 700;
			margin: 0 10px;

		}
		.botao{
			text-align: center;
			margin: 5px 0;
		}
		.background{
			background-color: #379d5b78;
			padding: 05px 15px ;
			border-radius: .5rem;
		}

		.btn-primary, .btn-primary:hover, .btn-secondary, .btn-secondary:hover {
		    color: #fff;
			background-color: #379d5b;
			border-color:#379d5b;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="cabecalho col align-content-center">
				PERFIL DO USUÁRIO
			</div>
		</div>
		<div class="container background">
			<div class="row form-group">
				<form enctype="multipart/form-data" action="enviar.php" method="POST">
				<!-- MAX_FILE_SIZE deve preceder o campo input -->
				<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
				<!-- O Nome do elemento input determina o nome da array $_FILES -->
				<div class="col-12 formularios ">
					Selecione uma foto <input name="userfile" type="file"  class="btn btn-secondary" />
				</div>
			</div>
			<div class="row form-group">
				<div class="col formularios">
					CPF: <input class="form-control" type="text" name="cpf">
				</div>
			</div>
			<div class="row form-group">
				<div class="col formularios">
					Nome: <input type="text" name="nome" class="form-control">
				</div>
				<div class="col formularios">
					E-mail: <input type="email" name="email" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-5 formularios">
					Nascimento: <input type="date" name="nascimento" class="form-control">
				</div>
				<div class="col-5 formularios">
					Naturalidade: <input type="text" name="naturalidade" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col formularios">
					Estado: <input type="text" name="estado" class="form-control">
				</div>
				<div class="col formularios">
					Sexo: <!-- <input type="text" name="sexo" class="form-control"> -->
					<select name="sexo" class="form-control">
						<option value="M">Masculino</option> 
						<option value="F">Feminino</option>
					</select>
				</div>
				<div class="col formularios">
					Estado Civil: <input type="text" name="civil" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col botao ">
					<input class="btn btn-primary" type="submit" value="Enviar arquivo" />
					<input class="btn btn-primary" type="button" value="Listar Perfis" onclick="listagem()" />
				</div>	
			</form>	
			</div>
		</div>
	</div>

	<!-- JavaScript (Opcional) -->
	<script type="text/javascript">
	function listagem(){
		window.location.href = "listagem.php";
	}
	</script>
	<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>