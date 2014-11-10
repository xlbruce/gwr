<?php
  /*Faz a conexão com o DB, deve-se ajustar o caminho do servidor em sua maquina.
   * - Não se esquecer de criar um Banco de Dados chamado "usuarios", e uma 
   * tabela chamada "usuarios" dentro deste, caso não haja em sua maquina.
   */
  $link = mysql_connect("localhost:3306","root","");
  $db = mysql_select_db("usuarios");
  
  // tratamento de erros
  if (mysql_errno())
  {
      echo "Não foi possível conectar: " . mysql_error();
  }
?>