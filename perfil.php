<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php
	$cod = $_GET['codigo'];
	$conn = new PDO("mysql:dbname=aula;host=localhost","root","");
	$stmt = $conn->prepare("select * from perfil where codigo = :CODIGO");
	$stmt->bindParam(":CODIGO",$cod);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Registros</title>
	<style type="text/css">
		.tit{
			font-size: 12px;
			font-weight: 700;
			text-transform: uppercase;

		}
		.dados{
			font-size: 12px;
			font-weight: 500;
			text-transform: uppercase;
		}
		.link{
			padding: 0 5px;
		}
		.foto{
			width: 270px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="ro">
	<?php
	foreach ($results as $dados) {
		foreach ($dados as $key => $value) {
			$cpf = $dados['cpf'];
			$nome = $dados['nome'];
			$arquivo = $dados['arquivo'];
			$email = $dados['email'];
			$nascimento = $dados['nascimento'];
			$naturalidade = $dados['naturalidade'];
			$estado = $dados['estado'];
			$sexo = $dados['sexo'];
			$civil = $dados['civil'];
		}
	}
	?>
		<img class="foto" src="imagens/<?php echo $cpf . '/' . $arquivo; ?>">
		Nome: <?php echo $nome?><br/>
		Cpf: <?php echo $cpf?><br/>
		E-mail: <?php echo $email?><br/>
		Data de Nascimento: <?php echo $nascimento?><br/>
		Naturalidade: <?php echo $naturalidade?> - Estado <?php echo $estado?><br/>
		Sexo: <?php echo $sexo?><br/>
		Estado Civil: <?php echo $civil?><br/>

	</div>
	<div class="text-center">
			<form action="listagem.php">
				<input class="btn btn-success" type="submit" value="Listagem de Perfis" />
			</form>
		</div>
	</div>
</body>
</html>		
</body>
