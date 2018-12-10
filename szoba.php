
  <style>
* {
  box-sizing:border-box;
}
body {background-color: lavender;
		background-image: url("");}

.left {
  background-color:#2196F3;
  padding:10px;
  float:left;
  height:50px;
  width:20%; /* The width is 20%, by default */
}
.left4 {
  background-color:white;
  padding:1%;
  float:left;
  height:50px;
  width:8%; /* The width is 20%, by default */
}

.main {
  background-color:#f1f1f1;
  padding:10px;
  height:50px;
  float:left;
  width:60%; /* The width is 60%, by default */
}
.main4 {
  background-color:#f1f1f1;
  padding:10px;
  height:50px;
  float:left;
  width:92%; /* The width is 60%, by default */
}



.main2 {
  background-color:#f1f1f1;

  float:left;
  width:100%; /* The width is 60%, by default */
  
}
#main3 {
  visibility:hidden;
}

.right {
  background-color:#4CAF50;
  padding:10px;
  height:50px;
  float:left;
  width:20%; /* The width is 20%, by default */
}

/* Use a media query to add a break point at 800px: */
@media screen and (max-width:1200px) {
  #cat {
  visibility:hidden;
  }
  #kaja {
  visibility:hidden;
  }
  #main3 { 
  visibility: visible;
  
  }
}


@media screen and (max-width:800px) {
  .left, .main, .right {
    width:100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
  #cat {
  visibility:hidden;
  }
  #kaja {
  visibility:hidden;
  }
}


</style>
  
</head>
<body>

<div class="container-fluid" >
 <div class="row">
<div class="col-1" style="background-color:lavender;"></div>
<div class="col" style="background-color:#7F3700;height:3px;max-width:950px;"></div>
<div class="col-1" style="background-color:lavender;"></div>
</div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-1" style="background-color:lavender;"></div>
    <div class="col" style="background-color:#7F3700;width:100%;max-width:950px;max-height:720px;">
	<div class="main2">
	
	


  <div class="w3-display-container w3-text-white">
    <img src="image/szoba1.png" alt="Lights" style="width:100%;max-width:950px;max-height:720px; filter: brightness(80%);">
	<div class="w3-display-topmiddle w3-container" style="margin:5px;background-color:white;opacity:0.9;
	 border-radius: 20px;border: 2px solid #f8f9fa;color :black" >Szobám</div>
    <div class="w3-display-topright w3-container" style="margin:5px;background-color:white;opacity:0.9;margin-right:5px;
	 border-radius: 25px;border: 2px solid #f8f9fa;" id="kaja">
	

	
	
	</div>
	<div class="w3-display-topleft w3-container" style="margin:5px;background-color:white;opacity:0.9;margin-right:5px;
	 border-radius: 25px;border: 2px solid #f8f9fa;" id="kaja">

	
	
	</div>
    <div class="w3-display-bottomleft w3-container">

	</div>
    <div class="w3-display-bottomright w3-container"></div>
    <div class="w3-display-left w3-container"></div>
    <div class="w3-display-right w3-container"></div>
    <div class="w3-display-middle w3-large"></div>
    
    <div class="w3-display-bottommiddle w3-container">
	 <img src="<?php echo $row["profkep"]; echo $row["profkieg"]; ?>" alt="Lights" class="w3-image" width="250" height="250">
	</div>
  </div>

	</div>

	</div>
    <div class="col-1" style="background-color:lavender;"> 
	
	
	
	
	
	</div>
  </div>
  
  

</div>
<div class="container-fluid" > 
 <div class="row">
<div class="col-1" style="background-color:lavender;"></div>
<div class="col" style="background-color:#7F3700;height:3px;max-width:950px;"></div>
<div class="col-1" style="background-color:lavender;"></div>
</div>
</div>


</body>
</html>