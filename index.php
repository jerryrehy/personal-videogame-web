<?php
    if(!isset($_GET['pg'])){
      header('Location: index.php?pg=0');
    }         
    //$mysqli = new mysqli("localhost", "user", "Engineers1", "clashroyale");               czengineers.4931 dbname
    $mysqli = new mysqli("sql2.webzdarma.cz", "czengineers.4931", "Engineers1", "czengineers.4931");   		
		if($mysqli->connect_error){
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    $mysqli->set_charset("iso-8859-2");
            
?>
<!DOCTYPE html> 
<html lang='cs'>   
  <head>     
    <title>CZ/SK Engineers</title>          
    <meta charset='ISO 8859-2'>     
    <meta name='description' content='Clan pages of Cz/Sk Engineers'>     
    <meta name='keywords' content='clash, royale, cz, sk, engineers, mobile, game'>     
    <meta name='author' content='Jaroslav Øehák'>     
    <meta name='robots' content='all'>     
    <link href='/icon/favicon.png' rel='shortcut icon' type='image/png'>
    <link rel="stylesheet" media="screen" href="style_desktop.css" type="text/css">     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>     
    <script src="my_jquery.js"></script>   
  </head>   
  <body>          
    <div id="headline">       
      <div id="logo">         
        <img src="graphics/logo_engineers.png" alt="ERB, 306kB" title="ERB Engineers" border="0" height="800" width="800">       
      </div>       
      <div id="nadpisy">
        <h2>CLASH ROYALE CLAN:</h2>         
        <h1>CZ/SK Engineers</h1>         
      </div>
      <div id="prince">
      </div>                         
    </div>

    <div id="undermenu">     
      <div id="menu">
        <a id="b1" href="index.php?pg=1"></a>
        <a id="b2" href="index.php?pg=2"></a> 
        <a id="b3" href="index.php?pg=3"></a> 
        <a id="b4" href="index.php?pg=4"></a> 
        <a id="b5" href="index.php?pg=5"></a>
        <a id="b6" href="index.php?pg=6"></a>
        <a id="b7" href="index.php?pg=7"></a>
        <a id="b8" href="index.php?pg=8"></a>             
      </div>
    </div>
    <div id="menu_close">
      <a id="closer"></a> 
    </div>
    <div id="underheader">
      <div id="b_open"></div>      
      <a id="btn_navi">
        <?php
          $a = $_GET['pg'];
          switch($a):
            default:
              {
                echo "Main page";
              }
              break;          
            case 1:
              {
                echo "News";
              }
              break;
            case 2:
              {
                echo "Team";
              }
            break;
            case 3:
              {
                echo "Decks";
              }
              break;
            case 4:
              {
                echo "Cards";
              }
              break;
            case 5:
              {
                echo "Terms";
              }
              break;
            case 6:
              {
                echo "Forum";
              }
              break;
            case 7:
              {
                echo "Arenas";
              }
              break;
            case 8:
              {
                echo "Chests";
              }
              break;
          endswitch;
        ?>
      </a>
        <?php
          $a = $_GET['pg'];
          switch($a):
            default:
              break;          
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
            case 8:
              {
                  echo "<a id=\"mpage\" href=\"index.php\">to main page</a>";
              }
              break;
          endswitch;
          ?>
    </div>   
    <div id="textarea">                    
      <?php 
        header('Content-type: text/html charset=default');
        $a = $_GET['pg'];
        switch($a):
          default:
            {
              echo "<h3>Welcome to our website!</h3>";
              echo "<div id=\"invitation\">";              
              echo "</div>";                            
            }
          break;
          case 1:
            {
              echo "<h3>NEWS</h3>";
                $sql = "SELECT * FROM news ORDER BY news_date DESC";
                $result = $mysqli->query($sql);       
                while($row = $result->fetch_array(MYSQLI_ASSOC))
                {
                  echo "<div id=\"news\">";
                  echo "  <div id=\"head_row\">";
                  echo "    <div id=\"title\">".$row['news_title']."</div>";                  
                  echo "    <div id=\"datum\">".$row['news_date']."</div>";
                  if($row['news_url'] != ""){
                    echo "    <div id=\"url\"><a href=\"".$row['news_url']."\">Url: ".$row['news_url']."</a></div>";
                  }
                  echo "  </div><br><hr>";
                  echo "  <div id=\"row\">".$row['news_msg']."</div>";
                  echo "</div>";
                }                
            }
          break;
          case 2:
            {
              echo "<h3>TEAM</h3>";
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
            }
          break;
          case 3:
            {
              echo "<h3>DECKS</h3>";
              echo "<div id=\"alldecks\">";
              $sql = "SELECT card_1, card_2, card_3, card_4, card_5, card_6, card_7, card_8 FROM deck";                
              $result = mysqli_query($mysqli, $sql);
              while($row = mysqli_fetch_array($result)){
                echo "<div class=\"onedeck\">";
                for($i = 0; $i < 8; $i++){                                    
                  $sql2 = "SELECT card_name, card_picture FROM card WHERE card_id = ".$row[$i];                
                  $result2 = mysqli_query($mysqli, $sql2);                                
                  while($row2 = mysqli_fetch_assoc($result2)){
                    echo "  <img title=\"".$row2['card_name']."\" src=\"".$row2['card_picture']."\"/>";    
                  }                                      
                }
                echo "</div>";    
              }
              echo "</div>";                    
            }
          break;
          case 4:
            {
              echo "<h3>CARDS</h3>";
              $sql = "SELECT * FROM card";                
              $result = mysqli_query($mysqli, $sql);
              while($row = mysqli_fetch_assoc($result)){
                echo "<div id=\"cards\">";
                  echo "<div id=\"onecard\">";
                    echo "<div id=\"cardname\">".$row['card_name'];
                    echo "</div>";
                    echo "  <img title=\"".$row['card_name']."\" src=\"".$row['card_picture']."\"/>";
                  echo "</div>";
                echo "</div>";                                         
              }    
            }
          break;
          case 5:
            {
              echo "<h3>TERMS</h3>";              
              echo "<div id=\"news\">";
              echo "  <div id=\"head_row\">";
              echo "    <div id=\"title\">Rules for clan members</div>";                                              
              echo "  </div><br><hr>";
              echo "  <div id=\"row\"><b>Minimal donation is 20 per week.</b></div><br>";
              echo "  <div id=\"row\"><b>Minimal count of trophies to join is 800.</b></div><br>";
              echo "  <div id=\"row\"><b>We appreciate good behavior.</b></div><br><br>";
              echo "</div>";
                             
            }
          break;
          case 6:
            {                          
              echo "<h3>FORUM</h3>";
              echo "<div id=\"addmsg\">post reply</div>";
              echo "<form id=\"forum_form\" name=\"formular\"method=\"post\" action=\"addmsg.php\" onsubmit=\"return dontletme(formular);\">";
              echo "  <span>Author  </span><br><input type=\"text\" name=\"author_forum\" value=\"\"><br><br>";
              echo "  <span>Message </span><br><textarea name=\"msg_forum\"></textarea><br><br>";
              echo "  <input type=\"submit\" value=\"Add message\">";
              echo "</form>";
              $sql = "SELECT * FROM forum ORDER BY forum_id DESC";
              $result = $mysqli->query($sql);       
              while($row = $result->fetch_array(MYSQLI_ASSOC))
              {
                echo "<div id=\"forum\">";                                  
                echo "    <div id=\"row_forum\">".$row['forum_msg']."</div><hr>";
                echo "  <div id=\"head_forum\">";
                echo "    <div id=\"author_forum\">Author: <b>".$row['forum_author']."</b></div>";
                echo "    <div id=\"datum_forum\">".$row['forum_date']."</div>";
                echo "  </div>";
                echo "</div>";
              }              
            }
          break;
          case 7:
            {
              echo "<h3>ARENAS</h3>";              
            }
          break;
          case 8:
            {
              echo "<h3>CHESTS</h3>";              
            }
          break;
        endswitch;
      ?>  
    </div>   
  </body>   
  <footer>
    <h4>----------     Copyright ©2016 by Jeronymo     ----------</h4>
  </footer> 
</html>