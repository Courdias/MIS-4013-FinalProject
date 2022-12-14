<?php
  include "header.php";
?>
    <h1>Genre</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
$servername = "localhost";
$username = "buidemac_finalproject";
$password = "finalmovies123";
$dbname = "buidemac_movies";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from genre";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["genre_id"]?></td>
    <td><?=$row["genre_name"]?></td>
    <td><?=$row["description"]?></td>
    <td>
      <form method="post" action="genre-movie.php">
        <input type="hidden" name="id" value="<?=$row["genre_id"]?>" />
        <input type="submit" value="Movies with this genre" />
      </form>
    </td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
