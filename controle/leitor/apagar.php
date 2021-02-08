<?php
  if (isset($_GET['id'])) {
  	include('../../db/InterfaceCRUD.class.php');
    include('../../db/PdoConexao.class.php');
    include('../../db/Leitor.class.php');
    include('../../db/LeitorCRUD.class.php');
  	
    //criando objeto da classe crud
  	$leitorCRUD = new AcervoCRUD();
  	if ($acervoCRUD->apagar($_GET['id'])){
  		//echo 'Excluido com Sucesso';
  		header('Location: ../../leitor/frmbusca.php?mess=exc');
  	}else{
  		//echo 'Erro ao Excluir';
  		header('Location: ../../leitor/frmbusca.php?mess=delerro');
  	}
  }
?>