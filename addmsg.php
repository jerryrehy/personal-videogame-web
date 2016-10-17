<?php
  //$mysqli = new mysqli("localhost", "root", "root", "clashroyale");
  $mysqli = new mysqli("sql2.webzdarma.cz", "czengineers.4931", "Engineers1", "czengineers.4931");   		
	if($mysqli->connect_error){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  $mysqli->set_charset("iso-8859-2");
  $datum = date("Y-m-d");
  $sql = "INSERT INTO forum(forum_id, forum_author, forum_msg, forum_date) VALUES (null,'$_POST[author_forum]','$_POST[msg_forum]','$datum') ";
  mysqli_query($mysqli,$sql);
  header('Location: index.php?pg=6');
  //confirm("Message has been added!");
  mysqli_close($mysqli);
?>