<?php
  include "header.php";
?>
<div>This is the home page for Final. 
  <p>Welcome new users! Feel free to explore around and add, edit, or delete any entries from the database.</p>
  <p>For Dr. Bellah,</p>
  <p>Here is a checksheet of things that should earn all my points, and where they are:</p>
  <p>Functionality ("The Back" side)</p>
  <p>HW 1: Bootstrap & # of Webpages</p>
  <p>HW 2: Get and Post</p>
  <p>HW 3: Database Tables, Related Tables, Hyperlink & Post</p>
  <p>Hw 4: Add, Edit, Delete Functionalities</p>
  <p>HW 5: Javascript Functions (here, below)</p>
  <p>Hw 6: Javascript Libraries</p>
  <p>Appearance(The "front" side)</p>
     
      <div class="container">
      <p id="date"></p>
      <button class="btn" onclick='giveDate()'>Show the Time</button>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
<script>

  function giveDate() {
      const d = new Date();
      document.getElementById('date').innerHTML = d;
      }
        </script>
  </body>
</html>
