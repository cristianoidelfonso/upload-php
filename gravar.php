<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php
			// Nas versões do PHP anteriores a 4.1.0, $HTTP_POST_FILES deve ser utilizado ao invés
			// de $_FILES.
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	
	// $uploaddir = 'imagens/';
	// $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


	$codigo = $_POST['codigo'];
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome'];
	$nascimento = $_POST['nascimento'];
	$naturalidade = $_POST['naturalidade'];
	$estado = $_POST['estado'];
	$email = $_POST['email'];
	$sexo = $_POST['sexo'];
	$civil = $_POST['civil'];
	// $arquivo = basename($_FILES['userfile']['name']);
	?>

	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Cadastro de Perfil</title>
	<style type="text/css">
		.cabecalho{
			background-color: gray;
			font-size: 30px;
			text-align: center;
			padding: 10px;
			margin-bottom: 30px;
			color: white;
			font-weight: 900;
		}
		.formularios{
			padding: 10px 10px;
			background-color: #E0E0E0 ;
			font-weight: 700;
		}


	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="cabecalho col-lg-12 align-content-center">
				PERFIL DO USUÁRIO
			</div>
		</div>

		<div class="row">
			<?php
				$conn = new PDO("mysql:dbname=aula;host=localhost","root","");
				
				$sql = "UPDATE perfil 
						SET  cpf = :CPF, nome = :NOME, nascimento = :NASCIMENTO, naturalidade = :NATURALIDADE, 
								email = :EMAIL, estado = :ESTADO, sexo = :SEXO, civil = :CIVIL
						WHERE codigo = :CODIGO ";

				$stmt = $conn->prepare($sql);

				$stmt->bindParam(":CPF",$cpf);
				$stmt->bindParam(":NOME",$nome);
				$stmt->bindParam(":NASCIMENTO",$nascimento);
				$stmt->bindParam(":NATURALIDADE",$naturalidade);
				$stmt->bindParam(":EMAIL",$email);
				$stmt->bindParam(":ESTADO",$estado);
				$stmt->bindParam(":SEXO",$sexo);
				$stmt->bindParam(":CIVIL",$civil);
				// $stmt->bindParam(":ARQUIVO",$arquivo);
				
				$stmt->bindParam(":CODIGO",$codigo);

				$stmt->execute() or die(print_r($stmt->errorInfo(), true));
				echo "REGISTRO ALTERADO COM SUCESSO!!";
				header("Refresh: 3;url=listagem.php");  // AGUARDA 3 SEGUNDOS E REDIRECIONA PARA A PÁGINA DE LISTAGEM DE PERFIS
				
			
			?>
		</div>
	</div>
	<!-- JavaScript (Opcional) -->
	<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
