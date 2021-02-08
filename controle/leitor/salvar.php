<?php
  if (isset($_POST['id'])) {
  	include('../../db/InterfaceCRUD.class.php');
    include('../../db/PdoConexao.class.php');
    include('../../db/Leitor.class.php');
    include('../../db/LeitorCRUD.class.php');
  	//criando objeto chamado leitor
    $leitor = new Leitor($_POST['nome'], $_POST['nascimento'], $_POST['cpf'], $_POST['sexo'], $_POST['fone'], $_POST['rua'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['email']);
  	//criando objeto da classe crud
  	$leitorCRUD = new LeitorCRUD();
  	if ($leitorCRUD->salvar($leitor)){
  		//echo 'Salvo';
  		header('Location: ../../leitor/frmcad.php?mess=ok');
  	}else{
  		//echo 'Erro';
  		header('Location: ../../leitor/frmcad.php?mess=erro');
  	}
  }
?>