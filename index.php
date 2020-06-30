<!DOCTYPE html>
<html>
<script>
 var sum=0;
 var sum2=0;
 var sum3=0;
 var dest1=0;
 var dest2=0;
 var dest3=0;


 function myFunction() {
  var dright = document.getElementById("myInput").value;
  var x = document.createElement("TABLE");
  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "Right";
  cell2.innerHTML =  dright;

  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.strokeStyle = "#b24dff";
  ctx.beginPath();
  dest1=parseFloat(dright);
  //ctx.strokeRect((150+sum2),(400-sum),20, 0);
  ctx.strokeRect(95+sum2,(150-sum),dest1, 0);
  sum2=sum2+dest1;
  ctx.stroke();


}

  var sum=0;
function myFunction2() {
  var dForward = document.getElementById("myInput2").value;
  var x = document.createElement("TABLE");
  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "Forward";
  cell2.innerHTML = dForward;
  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.strokeStyle = "#00cccc";
  ctx.beginPath();
  dest2=parseFloat(dForward);
  sum=sum + dest2;
  //document.getElementById("my").innerHTML=sum+"/" +(400-sum);
  ctx.strokeRect((95+sum2),(150-sum),0, dest2);
  //ctx.moveTo(20, 20);
  //ctx.lineTo(20, dForward);
  ctx.stroke();
}


function myFunction3() {
  var dLeft = document.getElementById("myInput3").value;
  var x = document.createElement("TABLE");
  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "Left";
  cell2.innerHTML = dLeft;

  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.strokeStyle = "#ff389c";
  ctx.beginPath();
  dest3=parseFloat(dLeft);
  sum2=sum2-dest3;
  ctx.strokeRect(95+sum2,(150-sum),dest3, 0);
  sum3=sum3+dest3;
  ctx.stroke();
}
</script>

<head>
  <meta charset="UTF-8">
  <title>Control Panel</title>
  <link rel = "stylesheet" type = "text/css" href="CP2.css">
  <script type="text/javascript"></script>
</head>
<body>
  <h2 class="t1"> Control Panel </h2>

  <canvas id="myCanvas" width="300" height="150" style="border:1px solid #D9DBE2;"></canvas>

  <br>


      <?php


          if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            // Create connection
            $conn3 = new mysqli("localhost","root","","remote2");
            // Check connection
            if ($conn3->connect_error) {
              die("Connection failed: " . $conn3->connect_error);
            }

          if(isset($_POST['rightBttt']) ) {
             $des = $_POST['right1'];
            $sql3 = "INSERT INTO remote3 (id,direction,distance)
            VALUES ('', 'Right',$des)";
            if ($conn3->query($sql3) === TRUE) {
                 echo "New record created successfully";
               } else {
                 echo "Error: " . $sql3 . "<br>" . $conn3->error;
               }
            $conn3->close();


          }

          if(isset($_POST['forwardBtt'])) {
             $des2 = $_POST['forwads2'];
            $sql3 = "INSERT INTO remote3 (id,direction,distance)
            VALUES ('', 'Forward',$des2)";
            if ($conn3->query($sql3) === TRUE) {
                 echo "New record created successfully";
               } else {
                 echo "Error: " . $sql3 . "<br>" . $conn3->error;
               }
            $conn3->close();

          }
          if(isset($_POST['leftBtt']) ) {
             $des3 = $_POST['left3'];
            $sql3 = "INSERT INTO remote3 (id,direction,distance)
            VALUES ('', 'Left',$des3)";
            if ($conn3->query($sql3) === TRUE) {
                 echo "New record created successfully";
               } else {
                 echo "Error: " . $sql3 . "<br>" . $conn3->error;
               }
            $conn3->close();

          }

      }

    ?>


   <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
  <table border="0" width="100%"> <tbody>
   <form id="myForm1" method="post" target="dummyframe" $_SERVER['REQUEST_METHOD']=='post'>
    <tr><td> <input type="text" id="myInput" name="right1" placeholder=""> <button type="submit" name="rightBttt" id="rightBtt" class="Rbtt" onclick="myFunction()" >Right</button> </td></tr>
    <tr><td> <input type="text"  id="myInput2" name="forwads2" placeholder="">  <button type="submit" name="forwardBtt" class="button1" onclick="myFunction2()">Forwards</button> </td></tr>
  <tr><td> <input type="text" id="myInput3" name="left3" placeholder="">  <button type="submit" name="leftBtt" class="Lbtt" onclick="myFunction3()"> Left  </button> </td></tr>



    <tr><td> <br>
      <button  class="Deletbtt" onclick="location.reload();"> Delete  </button>
    </td></tr>

    </tbody>
  </table></form>

  <br> <br>

  <table border="1" id="myTable" class="table2">

    <tr>
      <th>Direction</th>
      <th>Distance</th>
    </tr>

</table>

<br><br>



</body>


</html>
