<?php
  if (isset($_GET['id'])) {
  	include('../../db/PdoConexao.class.php');
  	include('../../db/InterfaceCRUD.class.php');
  	include('../../db/acervo.class.php');
  	include('../../db/AcervoCRUD.class.php');
  	
    //criando objeto da classe crud
  	$acervoCRUD = new AcervoCRUD();
  	if ($acervoCRUD->apagar($_GET['id'])){
  		//echo 'Excluido com Sucesso';
  		header('Location: ../../acervo/frmbusca.php?mess=exc');
  	}else{
  		//echo 'Erro ao Excluir';
  		header('Location: ../../acervo/frmbusca.php?mess=delerro');
  	}
  }
?>