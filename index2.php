<?php
  include "header.php";
?>
<div>This is the home page for Final. 
  <p>Welcome new users! Feel free to explore around and add, edit, or delete any entries from the database.</p>

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
