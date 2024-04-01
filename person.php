<style type="text/css">
 .stretch {
  width: auto;
  height: auto;
 }
  .stretch img {
    width: 100%;
    height: 100%;
  }
</style>

<!---SEARCH AREA --> 
<div class="row" style="font-size: 12px">
  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-body">
     <form action="index.php?q=person" method="post">
       <div class="input-group custom-search-form">
            <input type="search" class="form-control" name="search" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" id="btnsearch" name="btnsearch" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
      </form> 
      <small>ex : Firstname / Lastname  </small>
    </div> 
</div> 

<!-- LIST OF DECEASED PERSON-->
<?php
$search = isset($_POST['search']) ? $_POST['search'] : "";
$location = isset($_GET['location']) ? $_GET['location'] : '';

function calculateAge($birthDate, $diedDate) {
    // Check if the dates are valid
    $birthTimestamp = strtotime($birthDate);
    $diedTimestamp = strtotime($diedDate);
    
    if ($birthTimestamp === false || $diedTimestamp === false) {
        return 'Invalid Date';
    }

    $age = date('Y', $diedTimestamp) - date('Y', $birthTimestamp);

    // Check if the birthday has occurred this year
    if (date('md', $diedTimestamp) < date('md', $birthTimestamp)) {
        $age--;
    }

    return $age;
}
?>

<style type="text/css">
    .scrollxy {
        width: auto;
        height: 65vh;
        overflow:scroll;

    }
body{
    color: white;
}
a{
    color: white;
   
}
a :hover{
    color: black;
    text-decoration: none;
}
</style>

<div class="scrollxy">
    <table id="" class="table">
        <thead>
            <tr>
              
                <th>Name of the Deceased</th>
                <th>Born</th>
                <th>Died</th>
               <!-- <th>Location</th>-->
                <th>Years Buried</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['location'])) {
                if (isset($_GET['name'])) {
                    $sql = "SELECT * FROM tblpeople WHERE LOCATION='" . $location . "' AND FNAME ='" . $_GET['name'] . "'";
                } else {
                    $sql = "SELECT * FROM tblpeople WHERE LOCATION='" . $location . "'";
                }
            } elseif (isset($_POST['search'])) {
                $sql = "SELECT * FROM tblpeople WHERE FNAME LIKE '%" . $search . "%'";
            } else {
                $sql = "SELECT * FROM tblpeople";
            }

            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();
            $numrows = $mydb->num_rows($cur);

            if ($numrows > 0) {
                $cur = $mydb->loadResultList();

                foreach ($cur as $res) {
                    $age = calculateAge($res->BORNDATE, $res->DIEDDATE);

                    echo '<tr>';
                    
                    echo '<td><a href="index.php?q=person&graveno=' . $res->GRAVENO . '&name=' . $res->FNAME . '&location=' . $res->LOCATION . '&section=' . $res->CATEGORIES . '">' . $res->FNAME . '</a></td>';
                    echo '<td>' . $res->BORNDATE . '</td>';
                    echo '<td>' . $res->DIEDDATE . '</td>';
                
                    echo '<td>' . $age . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="5" style="text-align:center">No Record Found!</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    
</div>
</div> 

<!-- MAPA NI
<div class="panel panel-default stretch"> 
    <div class="panel-body">
    <div class="list-group">
     <div class="well well-sm "><b> Map </b> </div>
        
              <img src="img/ormocmap.png">
            
      </div> 
   </div> 
</div>
-->