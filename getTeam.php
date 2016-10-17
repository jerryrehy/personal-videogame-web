<?php
  //$mysqli = new mysqli("localhost", "user", "Engineers1", "clashroyale");
  $mysqli = new mysqli("sql2.webzdarma.cz", "czengineers.4931", "Engineers1", "czengineers.4931");   		
	if($mysqli->connect_error){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  $mysqli->set_charset("iso-8859-2"); 
  echo "<div id=\"slide\">";          
  if(!empty($_POST)){
    $num = (int)$_POST["hid"];
  }else{
    $num = 0;
  }
  echo "<form method=\"post\">";
  echo "  <input id=\"arr_lt\">";                
  echo "</form>";
  $sql = "SELECT * FROM team LEFT OUTER JOIN deck ON team.team_deck=deck.deck_id LEFT OUTER JOIN position ON team.team_pos=position.position_id order by team.team_pos";
    $result = $mysqli->query($sql);       
    $rows = [];
    while($temp = mysqli_fetch_array($result, MYSQLI_BOTH)){
        $rows[] = $temp;
    }            
    if($num < 0){
      $num = mysqli_num_rows($result) - 1;
    }
    else if($num > (mysqli_num_rows($result) - 1)){
      $num = 0;
    }
    $row = $rows[$num];                  
    echo "<div id=\"team\">";
    echo "  <div id=\"nick\">".$row['team_nick']."</div><hr><br>";                  
    echo "  <div id=\"photo\"><img src=\"".$row['team_pict']."\"/>";
    echo "  </div>";
    echo "  <div id=\"info\">".$row['position_name']."</div>";
    echo "  <div id=\"pict\">";
    for($i = 6; $i < 14; $i++){                  
      $sql2 = "SELECT card_name, card_picture FROM card WHERE card.card_id=".$row[$i];                
      $result2 = mysqli_query($mysqli, $sql2);
      while($row2 = mysqli_fetch_assoc($result2))
      {                
        echo "  <img title=\"".$row2['card_name']."\" src=\"".$row2['card_picture']."\"/>";                                    
      }   
    }
    echo "  </div>";
    echo "</div>";
    echo "<form method=\"post\">";
    echo "  <input id=\"arr_rt\">";
    echo "  <input id=\"hid\" value=\"".$num."\">";
    echo "</form>";
    echo "</div>";
?>