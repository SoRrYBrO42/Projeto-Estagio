<?php 
	require ('ligacao.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Recursos humanos</title>
</head>
<body>
	<?php require ('nav.php'); ?>
	<div>
		<form method="POST">
			<img id="foto_place" src="fotos/
				<?php 
					if (isset($_GET['id_treinador'])){
						echo $linha['foto'];
					}elseif (isset($_POST['insert']) or isset($_POST['update'])){
						if (!isset($_POST['foto'])){
							if($_POST['sexo']=='Masculino'){
								echo("Male_user.png");
							}else{
								echo("Female_user.png");
							}
						}else{
							echo $_POST['foto'];
						}
					}else{
						echo"Male_user.png";
					} 
				?>" alt="Foto do treinador" height="200" width="200"><br>
			<label>Escolher a foto</label><br>
    			<input type="file" name="foto" accept="image/png, image/jpeg"><br>
			<label>Número de treinador:</label>
				<input name="letra" value="T"><input name="num_treinador">
			<label>Nivel:</label>
				<input name="nivel"><br>
			<label>Palavra-Passe:</label>
				<input type="password" name="password"><br>
			<label>Nome:</label>
				<input name="nome"><br>
			<label>Morada:</label>
				<input name="morada"><br>
			<label>Email:</label>
				<input name="email"><br>
			<label>Telemovel:</label>
				<input name="telemovel"><br>
			<label>Sexo:</label>
				<select>
					<option value="Masculino">Masculino</option>
					<option value="Feminino">Feminino</option>
				</select><br>
			<label>Data de nascimento:</label>
				<input type="date" name="dt_nasc"><br>
			<input type="submit" name="insert" value="Inserir">
		</form>
	</div>
</body>
</html>
<script type="text/javascript">

</script>