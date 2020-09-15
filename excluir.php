<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php
			// Força a exibição de erros na tela. Meu computador não está configurado para mostrar.
				error_reporting(E_ALL);
				ini_set('display_errors',1);
				ini_set('display_startup_erros',1);
	


	// $uploaddir = 'imagens/';
	// $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	$codigo = $_GET['codigo'];
	
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
				EXCLUSÃO DE PERFIL DO USUÁRIO
			</div>
		</div>

		<div class="row">
			<?php
				$conn = new PDO("mysql:dbname=aula;host=localhost","root","");

				// /************************** 
				$stmt = $conn->prepare("SELECT cpf, arquivo FROM perfil WHERE codigo = :CODIGO");
				$stmt->bindParam(":CODIGO", $codigo);
				
				$stmt->execute() or die(print_r($stmt->errorInfo(), true));

				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$imagens = "imagens/";
				$filename = null;
				$dir = null;
				
				foreach ($results as &$value) {
					$dir = $value['cpf'];
					$filename = $value['arquivo'];
					// echo "Nome do arquivo : " . $filename . '<br>';			
				}

				if (is_dir($imagens)) {
					if (chdir($imagens)){
						if (is_dir($dir)) {
							echo (unlink($filename)) ? "Sucesso<br>" : "Falhou<br>";
							echo (rmdir($dir)) ? 'Sucesso<br>': 'Falhou<br>' ;
						}
					}
				}
				
				// */
			

				$stmt = $conn->prepare("DELETE FROM perfil WHERE codigo = :CODIGO ");
				// $stmt->bindParam(":ARQUIVO",$arquivo);
				$stmt->bindParam(":CODIGO",$codigo);

				$stmt->execute() or die(print_r($stmt->errorInfo(), true));
				echo "SERIA BOM COLOCAR UMA CONFIRMAÇÃO ANTES DE APAGAR.<br> FICA COMO DEVER DE CASA!!<br>";
				echo "REGISTRO EXCLUÍDO COM SUCESSO!!";
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
