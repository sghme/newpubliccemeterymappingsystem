<?php
  include "map1Func.php";
?>

<style type="text/css">
  body {
      background-color:#2a6496;
      color: #ffffff;
      font-family: 'Arial', 'Helvetica', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  #stretchmap {
    width: 100px;
    height: 100px;
    margin: -100px 0px 0px 0px;
  }

  #stretchmap img {
    width: 100%;
    height: 100%;
  }

  .bg {
    width: auto;
    height: auto;
  }

  .bg img {
    width: 100%;
    height: 100%;
  }

  #container {
    background-image: url('img/cemap6.jpg');
    background-repeat: no-repeat;
    width: 100000px;
    height: 2000px;
    background-color:#98FF98;
    display: block;
    background-color:#759E6D;
  }

  .style1 {
    background-image: url('img/cemap4.jpg');
    -webkit-background-size: contain;
    -moz-background-size: contain;
    background-position: bottom;
    width:1750px;
    padding: 100px;
    background-repeat: no-repeat;
    background-size: cover;
    -o-background-size: contain;
    background-size: contain;
    
  
    
  }
  .legend {
  
  
  color: white;
background-color:#759E6D;
text-align: center;
}

legend b {
color: white;
background-color:pink;
}

img {
max-width: 150px; /* Adjust the width as needed */
height: auto;
position:relative;
display:flex;


}

  
</style>

<div id="container">
  <table class="style1">
  
    <tr>
      <td>
        <div style="margin: 0px 0px 0px 30px; width: 1100px">
          <?php include 'puntaAB.php'; ?>
         
        </div>
      </td>
    </tr>
  </table>
  <div>
     <div class="legend ">
    <p>Legend</p>
    <img src="img/legend.png">
</div>
