<?php
$servername='localhost';
$username='Saraom';
$password='sa123456';
$dbname = "panel";
$conn=mysqli_connect($servername,$username,$password,"$dbname");


#insert
  if(isset($_GET['save'])){
   $right=$_GET['right'];
   $forward=$_GET['forward'];
   $left=$_GET['left'];
	 $sql = "INSERT INTO map (rside , fside , lside)
	 VALUES ('$right' , '$forward' , '$left')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}




#Show
 elseif(isset($_GET['show'])){#ei
$conn= new mysqli('localhost', 'Saraom', 'sa123456' ,'panel');
$sql=   "SELECT rside , fside, lside From map";
$result = $conn->query($sql);


if (mysqli_num_rows($result)) {
while($row = mysqli_fetch_assoc($result)){
// output data of each row

echo "Right: " . $row["rside"]; 
echo "\n";
echo "<br>";
echo "Forward: " . $row["fside"];
echo "\n";
echo "<br>";
echo "Left: " . $row["lside"];
echo "<br>";
}
}

else {
echo "0 results";
}


 }#ei


elseif(isset($_GET['delete'])){
    $sql = "DELETE FROM map ";

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
}


     
  ?>      





<html>
    <head>

   <style>
    form{
position: absolute;
margin: 10%; 
left: 400px;
top: 20px;
    }

    h1{
position: absolute;
margin: 5%; 
left: 450px;
top: 5px;  
color:burlywood; 
    }

canvas{
position: absolute;
margin: 10%; 
left: 100px;
top: 90px;  
}

.div1{
    position: absolute;
    right: 300px; 
    width: 300px;
    height: 400px;
    border: 1px solid gray;
    padding: 50px;
    box-sizing: border-box;
}

.button1{
border: none ;
color: white;
background-color: rgb(186, 205, 240);
height: 50px;
width: 75px;  
}

.button2{
    border: none ;
color: white;
background-color: gray;
height: 50px;
width: 75px; 
}

.button3{
border: none ;
color: white;
background-color: rgb(186, 205, 240);
height: 50px;
width: 75px;  
}

.save{
border: none ;
color: black;
background-color:burlywood;
height: 70px;
width: 70px;
border-radius: 50%; 
}

.show{
border: none ;
color: black;
background-color:burlywood;
height: 70px;
width: 70px;
border-radius: 50%;
}
.delete{
border: none ;
color: black;
background-color:burlywood;
height: 70px;
width: 70px;
border-radius: 50%;
}

img{
   
position: absolute;
margin: 10%; 
left: 50px;
top: -40px;

}

    </style>

        <script>
            
         function draw(){
            
             
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        var x1 = document.getElementById("right").value;
        var x2 = document.getElementById("forward").value;
        var y1 = document.getElementById("left").value;
       
        context.beginPath();
        context.moveTo(0,0);
        context.lineTo(x1,0);
        context.strokeStyle="red";
        context.stroke();
        
        
    }

    function draw1(){
        
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        var x1 = document.getElementById("right").value;
        var x2 = document.getElementById("forward").value;
        var y1 = document.getElementById("left").value;
        
        context.beginPath();
        context.moveTo(x1,0);
        context.lineTo(x1,x2);
        context.strokeStyle="blue";
        context.stroke();


    }

    function draw2(){
        
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        var x1 = document.getElementById("right").value;
        var x2 = document.getElementById("forward").value;
        var y1 = document.getElementById("left").value;

        context.beginPath();
        context.moveTo(x1,x2);
        context.lineTo(y1,x2);
        context.strokeStyle="green";
        context.stroke();
        context.closePath();

       
        
    }






  
            </script>
    </head>
    <body>

    <img src="https://image.freepik.com/vecteurs-libre/robot-souriant-mignon-chat-bot-signes-communication-illustration-personnage-dessin-anime-plat-moderne-isole-blanc-bulle-parlee-service-support-vocal-communication-bot-discussion_92289-518.jpg"
    alt="robot" width="300"/>

    <div class="div1" >
      <br><br>
    <canvas id="myCanvas" width="200" height="300" >
    
</canvas>
    </div>
<h1>Manual Control Panel</h1>
<div class="div2" >
<form method="$_GET" id="fmm">
    <input type="text" name="right" id="right">
    <input class="button1" type="button" value="Right" onclick="draw()"><br><br>
    
   <input type="text" name="forward" id="forward">
   <input class="button2" type="button" value="Forward" onclick="draw1()"><br><br>

    <input type="text" name="left" id="left">
    <input class="button3" type="button" value="Left" onclick="draw2()"><br><br>


    <input class="save"    type="submit" value="submit"  name="save" id="save">
    <input class="show"    type="submit" value="show"  name="show" id="show" >
    <input class="delete"  type="submit" value="delete"  name="delete" id="delete">


    


 </form>
</div>
     
    </body>
</html>