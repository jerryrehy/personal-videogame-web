// JQUERY DOCUMENT
$( document ).ready(function() {
  console.log( "document loaded" );
  var isOpen;
  var token;
  if (typeof(Storage) !== "undefined") {
    console.log( "Local storage is working..." );  
  } else {
    console.log( "Sorry, your browser does not support Web Storage..." );
  }
  
  $("#forum_form").hide(0);  
  var temp = sessionStorage.getItem("close");
  var temp2 = sessionStorage.getItem("open");
  if(temp == "close"){    
    $("#undermenu").hide(0);
    isOpen = false;
  }else if(temp2 == "open"){
    isOpen = true;
  }else{
    $("#undermenu").hide(0);
    isOpen = false;
  }
  
  var temp3 = sessionStorage.getItem("token");
  switch(temp3){
    case "1":
      token = "1";
      $("#b1").css({"background-image": "url(graphics/but_news_st.png)"});
    break;
    
    case "2":
      token = "2";
      $("#b2").css({"background-image": "url(graphics/but_team_st.png)"});
    break;
    
    case "3":
      token = "3";
      $("#b3").css({"background-image": "url(graphics/but_decks_st.png)"});
    break;
    
    case "4":
      token = "4";
      $("#b4").css({"background-image": "url(graphics/but_cards_st.png)"});
    break;
    
    case "5":
      token = "5";
      $("#b5").css({"background-image": "url(graphics/but_terms_st.png)"});
    break;
    
    case "6":
      token = "6";
      $("#b6").css({"background-image": "url(graphics/but_forum_active.png)"});
    break;
    
    case "7":
      token = "7";
      $("#b7").css({"background-image": "url(graphics/but_arenas_active.png)"});
    break;
    
    case "8":
      token = "8";
      $("#b8").css({"background-image": "url(graphics/but_chests_active.png)"});
    break;
      
    default:
      token = "main";
    break;
  }
  
  
  $("#b_open").mouseenter(function(){
    $("#b_open").css({"cursor": "hand", "cursor": "pointer"});
  });
      
  
  $("#b_open").click(function(){    
    $("#undermenu").slideToggle(700);
    if(isOpen == false){
      sessionStorage.setItem("open", "open");
      sessionStorage.removeItem("close");
      isOpen = true;
      $("#b_open").animate(
        {  borderSpacing: 90 }, {step: function(now,fx) {
          $(this).css('-webkit-transform','rotate('+now+'deg)'); 
          $(this).css('-moz-transform','rotate('+now+'deg)');
          $(this).css('transform','rotate('+now+'deg)');
          },
            duration:'slow'
          },'linear'
        );          
    }else{
      isOpen = false;
      sessionStorage.setItem("close", "close");
      sessionStorage.removeItem("open");
      $("#b_open").animate(
        {  borderSpacing: 0 }, {step: function(now,fx) {
          $(this).css('-webkit-transform','rotate('+now+'deg)'); 
          $(this).css('-moz-transform','rotate('+now+'deg)');
          $(this).css('transform','rotate('+now+'deg)');
          },
            duration:'slow'
          },'linear'
        );
    }
  });
  
  $("#b1").on("click", function(){
    token = "b1";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "1");
  });
  
  $("#b2").on("click", function(){
    token = "b2";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "2");
  });
  
  $("#b3").on("click", function(){
    token = "b3";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "3");
  });
  
  $("#b4").on("click", function(){
    token = "b4";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "4");
  });
  
  $("#b5").on("click", function(){
    token = "b5";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "5");
  });
  
  $("#b6").on("click", function(){
    token = "b6";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "6");
  });
  
  $("#b7").on("click", function(){
    token = "b7";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "7");
  });
  
  $("#b8").on("click", function(){
    token = "b8";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "8");
  });
    
  $("#mpage").on("click", function(){
    token = "main";
    sessionStorage.removeItem("token");
    sessionStorage.setItem("token", "main");
  });
  
  if(token != "1"){ 
  $("#b1").mouseenter(function(){
    $("#b1").fadeOut(220, function(){  
      $("#b1").css({"background-image": "url(graphics/but_news_act.png)"});
      $("#b1").fadeIn(220);
    });
  });  
  $("#b1").mouseleave(function(){
    $("#b1").fadeOut(220, function(){
      $("#b1").css({"background-image": "url(graphics/but_news.png)"});
      $("#b1").fadeIn(220);
    });
  });               
  }
  if(token != "2"){   
  $("#b2").mouseenter(function(){
    $("#b2").fadeOut(220, function(){  
      $("#b2").css({"background-image": "url(graphics/but_team_act.png)"});
      $("#b2").fadeIn(220);
    });
  });  
  $("#b2").mouseleave(function(){
    $("#b2").fadeOut(220, function(){
      $("#b2").css({"background-image": "url(graphics/but_team.png)"});
      $("#b2").fadeIn(220);
    });
  });
  }
  if(token != "3"){
  $("#b3").mouseenter(function(){
    $("#b3").fadeOut(220, function(){  
      $("#b3").css({"background-image": "url(graphics/but_decks_act.png)"});
      $("#b3").fadeIn(220);
    });
  });       
  $("#b3").mouseleave(function(){
    $("#b3").fadeOut(220, function(){
      $("#b3").css({"background-image": "url(graphics/but_decks.png)"});
      $("#b3").fadeIn(220);
    });
  });
  }
  if(token != "4"){
  $("#b4").mouseenter(function(){
    $("#b4").fadeOut(220, function(){  
      $("#b4").css({"background-image": "url(graphics/but_cards_act.png)"});
      $("#b4").fadeIn(220);
    });
  });       
  $("#b4").mouseleave(function(){
    $("#b4").fadeOut(220, function(){
      $("#b4").css({"background-image": "url(graphics/but_cards.png)"});
      $("#b4").fadeIn(220);
    });
  });
  }
  if(token != "5"){
  $("#b5").mouseenter(function(){
    $("#b5").fadeOut(220, function(){  
      $("#b5").css({"background-image": "url(graphics/but_terms_act.png)"});
      $("#b5").fadeIn(220);
    });
  });  
  $("#b5").mouseleave(function(){
    $("#b5").fadeOut(220, function(){
      $("#b5").css({"background-image": "url(graphics/but_terms.png)"});
      $("#b5").fadeIn(220);
    });
  });
  }
  if(token != "6"){
  $("#b6").mouseenter(function(){
    $("#b6").fadeOut(220, function(){  
      $("#b6").css({"background-image": "url(graphics/but_forum_active.png)"});
      $("#b6").fadeIn(220);
    });
  });  
  $("#b6").mouseleave(function(){
    $("#b6").fadeOut(220, function(){
      $("#b6").css({"background-image": "url(graphics/but_forum_inactive.png)"});
      $("#b6").fadeIn(220);
    });
  });
  }
  if(token != "7"){
  $("#b7").mouseenter(function(){
    $("#b7").fadeOut(220, function(){  
      $("#b7").css({"background-image": "url(graphics/but_arenas_active.png)"});
      $("#b7").fadeIn(220);
    });
  });  
  $("#b7").mouseleave(function(){
    $("#b7").fadeOut(220, function(){
      $("#b7").css({"background-image": "url(graphics/but_arenas_inactive.png)"});
      $("#b7").fadeIn(220);
    });
  });
  }
  if(token != "8"){
  $("#b8").mouseenter(function(){
    $("#b8").fadeOut(220, function(){  
      $("#b8").css({"background-image": "url(graphics/but_chests_active.png)"});
      $("#b8").fadeIn(220);
    });
  });  
  $("#b8").mouseleave(function(){
    $("#b8").fadeOut(220, function(){
      $("#b8").css({"background-image": "url(graphics/but_chests_inactive.png)"});
      $("#b8").fadeIn(220);
    });
  });
  }
    
  $(document).on("click", "#addmsg", function () {
      $("#forum_form").slideToggle(520);    
  });

  $(document).on("click", "#arr_rt", function () {
      var currentValue = $("#hid").val();
      var value = parseInt(parseFloat(currentValue)) + 1;
      $.ajax({
        url: "getTeam.php",        
        type: "POST",
        data: {hid: value},
        cache: false,
        success: function(result){
          $("#slide").replaceWith(result);
          console.log("Success");           
        }
    });
  });
  
  $(document).on("click", "#arr_lt", function() {              
      var currentValue = $("#hid").val();
      var value = parseInt(parseFloat(currentValue)) - 1;
      $.ajax({
        url: "getTeam.php",        
        type: "POST",
        data: {hid: value},
        cache: false,
        success: function(result){
          $("#slide").replaceWith(result);
          console.log("Success");                     
        }
    });
  });
            
});

function dontletme(form)
{
	if (form.author_forum.value == "" || form.msg_forum.value == "")
	{
			alert("You have to pass your name or message...");
			return false;
	}
}

$( window ).load(function() {
    console.log( "window loaded" );
});