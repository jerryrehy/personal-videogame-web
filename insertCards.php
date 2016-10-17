// <?php
//   $mysqli = new mysqli("localhost", "root", "root", "clashroyale");   		
//   $mysqli->set_charset("iso-8859-2");
// 
//   $html = file_get_contents("http://www.clashapi.xyz/api/cards"); 
//   
//   $array = array();
//   $entities = array();
//   $cardNames = array();
//   
//   $array = explode("{", $html);
//   foreach($array as $a){
//     if($a != null && $a != "["){
//       $entities = explode("\"name\":\"", $a);
//       $offset = 0;
//       foreach($entities as $b){        
//         if($b != null && $offset == 1){
//           $cardNames = explode("\"", $b);
//             $name = $cardNames[0];
//             if($name != null){
//               $name = strtolower($name);              
//               $name = str_ireplace(' ', '_', $name);
//               $name = str_ireplace('.', '', $name);              
//               $name2 = ucfirst($name);
//               echo $name2;              
//               $path = "/cards/".$name.".png";
//               echo $path;
//               $sql = "INSERT INTO card (card_name, card_picture) VALUES (\"".$name2."\",\"".$path."\")";                              
//               if (mysqli_query($mysqli, $sql)) {
//                 echo "New record created successfully";
//               } else {
//                   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//               }                                                                   
//             }          
//           $offset = 0; 
//         }
//         $offset++;
//       }            
//     }
//   }  
// ?>