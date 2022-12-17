<?php
  include "header.php";
?>

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {

    case 'Edit':
      $sqlEdit = "update movie set movie_rating=? where movie_id=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("d", $_POST['mRating']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Movie Rating edited.</div>';
      break;
  }
}
?>
    <h1>Movies</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Movie Name</th>
      <th>Director</th>
      <th>Genre</th>
      <th>Latest User's Rating</th>
    </tr>
  </thead>
  <tbody>
          
<?php
$sql = "select movie_id, movie_name, movie_rating d.director_name, g.genre_name from movie m join director d on d.director_id = m.director_id join genre g on g.genre_id = m.genre_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
           <td><?=$row["movie_id"]?></td>
                <td><?=$row["movie_name"]?></td>
                <td><?=$row["director_name"]?></td>
                <td><?=$row["genre_name"]?></td>
                <td><?=$row["movie_rating"]?></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editRating<?=$row["movie_id"]?>">
                Edit
              </button>
              <div class="modal fade" id="editRating<?=$row["movie_id"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editRating<?=$row["movie_id"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editRating<?=$row["movie_id"]?>Label">Edit Movie Rating</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editRating<?=$row["movie_id"]?>Rating" class="form-label">Movie Rating</label>
                          <input type="text" class="form-control" id="editRating<?=$row["movie_id"]?>Rating" aria-describedby="editRating<?=$row["movie_id"]?>Help" name="mRating" value="<?=$row['movie_rating']?>">
                          <div id="editRating<?=$row["movie_id"]?>Help" class="form-text">Enter your new movie rating.</div>
                        </div>
                        <input type="hidden" name="mRating" value="<?=$row['movie_id']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
   
