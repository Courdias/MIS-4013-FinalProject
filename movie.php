<?php
  include "header.php";
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

    case 'Edit':
      $sqlEdit = "update movie set movie_rating=?, number=?, description=? where course_id=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("i", $_POST['mr']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Movie Rating edited.</div>';
      break;
  }

$sql = "select movie_id, movie_name, d.director_name, g.genre_name from movie m join director d on d.director_id = m.director_id join genre g on g.genre_id = m.genre_id";
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
                      <h1 class="modal-title fs-5" id="editRating<?=$row["movie_id"]?>Label">Edit Rating</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editRating<?=$row["movie_id"]?>Name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="editRating<?=$row["movie_id"]?>Name" aria-describedby="editRating<?=$row["movie_id"]?>Help" name="iName" value="<?=$row['movie_name']?>">
                          <div id="editRating<?=$row["movie_id"]?>Help" class="form-text">Enter new rating for this movie.</div>
                        </div>
                        <input type="hidden" name="iid" value="<?=$row['movie_id']?>">
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
          
        </tbody>
      </table>
      <br />
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInstructor">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addInstructor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addInstructorLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addInstructorLabel">Add Instructor</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="instructorName" class="form-label">Name</label>
                  <input type="text" class="form-control" id="instructorName" aria-describedby="nameHelp" name="iName">
                  <div id="nameHelp" class="form-text">Enter the instructor's name.</div>
                </div>
                <input type="hidden" name="saveType" value="Add">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
