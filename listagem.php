<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php
	$conn = new PDO("mysql:dbname=aula;host=localhost","root","");
	$stmt = $conn->prepare("select * from perfil order by 1");
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
			font-size: 25px;
			font-weight: 700;
			text-transform: uppercase;
			text-align: center;
			padding: 50px 0;

		}
		.text-center{
			margin-top: 80px;
		}
		.dados{
			font-size: 14px;
			font-weight: 500;
			text-transform: uppercase;
		}
		th{
			color: green;
			font-weight: 900;
		}
		th, td { 
			text-align: center;
			text-decoration: none;
		}
		.link{
			padding: 0 5px;
		}
		.detalhes{
			display: block;
			/* background-color: gray;*/
		}
		.link{
			padding: 0 5px;
			font-weight: 700;
		}
		a, a:hover, a:active{
			text-decoration: none;
			color: black;
		}
		img {
			vertical-align: top;
			max-width: 120px;
			max-height:150px;
			width: auto;
			height: auto;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class='tit col-12'>Perfis cadastrados</div>
	<?php
	echo "<table border='0' class='table'><thead><tr>";
		echo "<span class='dados'><th scope='col'>Codigo</th>";
		echo "<span class='dados'><th scope='col'>Cpf</th>";
		echo "<span class='dados'><th scope='col'>Nome</th>";
		echo "<span class='dados'><th scope='col'>DtNasc</th>";
		echo "<span class='dados'><th scope='col'>Natural</th>";
		echo "<span class='dados'><th scope='col'>Estado</th>";
		echo "<span class='dados'><th scope='col'>E-mail</th>";
		echo "<span class='dados'><th scope='col'>Sexo</th>";
		echo "<span class='dados'><th scope='col'>EstadoCivil</th>";
		echo "<span class='dados'><th scope='col'>Foto</th>";
		echo "<span class='dados'><th scope='col'>Ações</th>";
	echo "</tr></thead>";
	
	foreach ($results as $dados) {
		echo "<tbody> <tr>";
		foreach ($dados as $key => $value) {
			echo "<td>";
			if ($key == 'codigo') {
				$cod = $value; // variável cod utilizada para montar o link de Visualizar Alterar ou Excluir o registro atual
			}
			if ($key == 'nascimento'){
				$value = date("d/m/Y", strtotime($value));
			}
			if ($key != 'arquivo') {				
			?>
				<span class="dados"><?php echo $value?></span>
				</td>
			<?php
			}else{ ?>
				<img class="foto" src="imagens/<?php echo $dados['cpf'] .'/'. $dados['arquivo']; ?>">
				</td>
			<?php	
			}	
		}
		echo "<td>";
		echo "<a class='link' href='perfil?codigo=$cod'>Perfil</a>";
		echo "<a class='link' href='editar?codigo=$cod'>Editar</a>";
		echo "<a class='link' href='excluir?codigo=$cod'>Excluir</a>";
		echo "</td></tr></tbody>";
	}
	echo "</table>";?>
		
	</div>
	<div class="text-center">
			<form action="cadastro.php">
				<input class="btn btn-success" type="submit" value="Criar Novo Perfil" />
			</form>
		</div>
	</div>
</body>
</html>		
</body>
