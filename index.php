<?php
	require ('ligacao.php');

	if(isset($_POST['Login'])){
		if (strpos($_POST['username'], 'T') !== false) {
			//Define a SESSION['permissao']
			$_SESSION['permissao']=2;
			//prepara a query para o login do treinador
			$stmt = $con->prepare("SELECT * FROM treinadores WHERE num_treinador = ? AND password = ?");
			//define a procura
			$stmt -> bind_param("ss",$_POST['username'],$_POST['password']);
		}else{
			//Define a SESSION['permissao']
			$_SESSION['permissao']=1;
			//prepara a query para o login do admin
			$stmt = $con->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
			//define a procura
			$stmt -> bind_param("ss",$_POST['username'],$_POST['password']);
		}
		//executa a query
		$stmt->execute();

		//Busca o resultado do select
		$resultado=$stmt->get_result();
		//Verifica se tem alguma linha com os valores
		if($resultado->num_rows === 0){
			//Não: Sai e dá erro
			?>
				<script>
					window.alert("Dados de Login Incorretos!");
					window.location.href = "index.php";
				</script>
			<?php 
		}else{
			//Sim: Busca o conteudo da linha e coloca na var global $_SESSION
			$row = $resultado->fetch_row();
			$_SESSION['id']=$row[0];
			$_SESSION['nome']=$row[1];
			//fecha a query
			$stmt->close();
			//redireciona para a home
			header("Location: home.php");
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clube estrela azul</title>
</head>
<body>
	<div>
		<h3>Login</h3>
		<form method="POST">
			<label>Username:</label>
				<input name="username"><br>
			<label>Password:</label>
				<input type="Password" name="password"><br>
			<input type="submit" name="Login">
		</form>
	</div>
</body>
</html>