<div class="row" style="font-size: 12px">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">

        <!-- Display Announcements -->
        <div class="list-group">
          <div class="well well-sm" style="font-size: 16px;"><b><center>Announcements</center></b></div>
          <ul class="announcement-list">
            <?php
            // Fetch announcements from the database and display them here
            $sql = "SELECT * FROM tblannouncement";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<li class="announcement-item"><b>' . $row['title'] . '</b><br>' . $row['content'] . '</li>';
              }
            } else {
              echo '<li>No announcements available.</li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* Add CSS styles to create a border around each announcement */
  body{
    color: white;
  }
  .announcement-list {
    list-style: none;
    padding: 0;
  }

  .announcement-item {
  /*  background-color: white;*/
    border: 1px solid #ccc; /* Add a border around each announcement */
    padding: 10px; /* Add some padding for spacing */
    margin-bottom: 10px; /* Add space between announcements */
  }
</style>
