<?php 
	require ('ligacao.php');
	if (isset($_POST['insert'])) {
		$querry=$con->prepare("INSERT INTO `recursos_humanos`(`nome`, `sexo`, `dt_nasc`, `morada`, `localidade`, `freguesia`, `concelho`, `CP`, `email`, `telemovel`, `CC`, `NIF`, `registo_criminal`, `certificado_academico`, `certificado_sbv_dae`, `certificado_direcao`, `salario`, `foto`) 
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

		//ficheiros
			//foto
				if (!isset($_FILES["foto"]["name"])){
					if ($sexo=="Masculino") {
						$foto="Male_user.png";
					}else{
						$foto="Female_user.png";
					}
				}else{
					$foto_original=$_FILES["foto"]["name"];
					$extencao = explode(".", $foto_original);
					$foto=$_POST['cc'].".".end($extencao);
					move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/" . $foto);
				}

			//registo criminal
				if (!isset($_FILES["registo_criminal"]["name"])) {
					$registo_criminal="";
				}else{
					$ficheiro=$_FILES["registo_criminal"]["name"];
					$extencao=explode(".", $ficheiro);
					$registo_criminal=$_POST['cc'].".".end($extencao);

					$targetfolder = "ficheiros/registos_criminais/".basename($registo_criminal);

					if(move_uploaded_file($_FILES['registo_criminal']['tmp_name'], $targetfolder)){
						echo "The file ". basename( $_FILES['registo_criminal']['name']). " is uploaded";
					}else{
						echo "Problem uploading file";
					}
				}

			//certificado academico
				if (!isset($_FILES["certificado_academico"]["name"])) {
					$certificado_academico="";
				}else{
					$ficheiro=$_FILES["certificado_academico"]["name"];
					$extencao=explode(".", $ficheiro);
					$certificado_academico=$_POST['cc'].".".end($extencao);

					$targetfolder = "ficheiros/certificados_academicos/".basename($certificados_academico) ;

					if(move_uploaded_file($_FILES['certificado_academico']['tmp_name'], $targetfolder)){
						echo "The file ". basename( $_FILES['certificado_academico']['name']). " is uploaded";
					}else{
						echo "Problem uploading file";
					}
				}

			//certificado sbv e dae
				if (!isset($_FILES["certificado_sbv_dae"]["name"])) {
					$certificado_sbv_dae="";
				}else{
					$ficheiro=$_FILES["certificado_sbv_dae"]["name"];
					$extencao=explode(".", $ficheiro);
					$certificado_sbv_dae=$_POST['cc'].".".end($extencao);

					$targetfolder = "ficheiros/certificado_sbv_dae/".basename($certificado_sbv_dae) ;

					if(move_uploaded_file($_FILES['certificados_sbv_dae']['tmp_name'], $targetfolder)){
						echo "The file ". basename( $_FILES['certificado_sbv_dae']['name']). " is uploaded";
					}else{
						echo "Problem uploading file";
					}
				}	

			//certificado desportivo
				if (!isset($_FILES["certificado_desportivo"]["name"])) {
					$certificado_desportivo="";
				}else{
					$ficheiro=$_FILES["certificado_desportivo"]["name"];
					$extencao=explode(".", $ficheiro);
					$certificado_desportivo=$_POST['cc'].".".end($extencao);

					$targetfolder = "ficheiros/certificado_desportivo/".basename($certificado_desportivo) ;

					if(move_uploaded_file($_FILES['certificado_desportivo']['tmp_name'], $targetfolder)){
						echo "The file ". basename( $_FILES['certificado_desportivo']['name']). " is uploaded";
					}else{
						echo "Problem uploading file";
					}
				}

		$querry->bind_param("issssssisiiissssis",$_POST['nome'],$_POST['sexo'],$_POST['dt_nasc'],$_POST['morada'],$_POST['localidade'],$_POST['freguesia'],$_POST['concelho'],$_POST['cp'],$_POST['email'],$_POST['telemovel'],$_POST['cc'],$_POST['nif'],$registo_criminal,$certificado_academicot,$certificado_sbv_dae,$certificado_direcao,$_POST['salario'],$foto);

		$querry->execute();

		if ($querry->affected_rows===0) {
			?>
				<script type="text/javascript">
					alert("Ocurreu algo não esperado.");
				</script>
			<?php
		}else{
			?>
				<script type="text/javascript">
					alert($_POST['nome']" inserido com sucesso.");
				</script>
			<?php	
		}
	}

	if (isset($_POST['update'])) {
		$querry=$con->prepare("UPDATE `recursos_humanos` SET `nome`=?`sexo`=?`dt_nasc`=?`morada`=?`localidade`=?`freguesia`=?`concelho`=?`CP`=?,`email`=?,`telemovel`=?,`CC`=?,`NIF`=?,`registo_criminal`=?,`certificado_academico`=?,`certificado_sbv_dae`=?,`certificado_direcao`=?,`salario`=?,`foto`=? WHERE `id_recurso_humano`=?");

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="//code.jquery.com/jquery.min.js"></script>
		<script src="toastr/toastr.js"></script>
		<title>Recursos humanos</title>
	</head>
	<body>
		<?php require ('nav.php'); ?>
		<div>
			<?php 
				if (isset($_GET['id_recurso_humano'])) {
					$recursos_humanos=$con->prepare("SELECT * FROM recursos_humanos WHERE id_recurso_humano=?");
					$recursos_humanos->bind_param("i",$_GET['id_recurso_humano']);
					$recursos_humanos->execute();
					$resultado=$recursos_humanos->get_result();
					$linha=$resultado->fetch_assoc();
				}
			?>
			<form method="POST" enctype="multipart/form-data">
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
				<label>Escolher a foto</label>
	    			<input type="file" id="foto" name="foto" accept="image/png, image/jpeg"><br>
				<label>Cargos:</label><br>
					<?php 
						$cargos = $con->prepare("SELECT * FROM cargos");
						$cargos->execute();
						$resultado=$cargos->get_result();
						if($resultado->num_rows === 0){ 
							echo "Não existem cargos disponiveis.";
						}else{
							while ($linha_cargo=$resultado->fetch_assoc()) { ?>
								<label>
									<?php 
										echo($linha_cargo['cargo']);
										if (strpos($linha_cargo['cargo'],'Treinador')!==false) {
											?>
												<input onclick="alert('função que faz aparecer os campos do treinador.');" type="checkbox" id="<?php echo($linha_cargo['id_cargo']); ?>" name="cargo[]">
											<?php
										}else{
											?>
												<input type="checkbox" id="<?php echo($linha_cargo['id_cargo']); ?>" name="cargo[]">

											<?php
										}
									?>
								</label>
								<br>
							<?php
							}	
						}
					?>
				<label>Salario:</label>
					<input name="salario">€<br>
				<label>Nome:</label>
					<input name="nome"><br>
				<label>CC:</label>
					<input name="cc"><br>
				<label>NIF:</label>
					<input name="nif"><br>
				<label>Localidade:</label>
					<input name="localidade"><br>
				<label>Freguesia:</label>
					<input name="freguesia"><br>
				<label>Concelho:</label>
					<input name="concelho"><br>
				<label>CP:</label>
					<input name="CP"><br>
				<label>Email:</label>
					<input name="email"><br>
				<label>Telemovel:</label>
					<input name="telemovel"><br>
				<label>Sexo:</label>
					<select id="sexo" name="sexo" onchange="mudar_imagem()">
						<option value="Masculino">Masculino</option>
						<option value="Feminino">Feminino</option>
					</select><br>
				<label>Data de nascimento:</label>
					<input type="date" name="dt_nasc"><br>
				<label>Registo criminal:</label>
					<input type="file" name="registo_criminal" accept=".pdf,.doc"><br>
				<label>Certificado academico:</label>
					<input type="file" name="certificado_academico" accept=".pdf,.doc"><br>
				<label>Certificado sbv/dae:</label>
					<input type="file" name="certificado_sbv_dae" accept=".pdf,.doc"><br>
				<input type="submit" name="insert" value="Inserir">
			</form>
		</div>
	</body>
</html>


<!--Faz upload da foto para mostrar no site-->
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#foto_place').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto").change(function() {
		readURL(this);
	});
</script>

<?php
	if (!isset($_GET['id_recurso_humano'])) {
		?>
		<script>
			//Função de escolher a imagem consuante o sexo
			function mudar_imagem(){
				if ((document.getElementById("foto").value=='')) {
					if (document.getElementById('sexo').value=="Masculino") {
						document.getElementById('foto_place').src="fotos/Male_user.png"
					}else{
						document.getElementById('foto_place').src="fotos/Female_user.png"
					}
				}
			}
		</script>
		<?php
	}
?>
<script type="text/javascript">

</script>