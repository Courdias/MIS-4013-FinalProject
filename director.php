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
    case 'Add':
      $sqlAdd = "insert into director (director_name) value (?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("s", $_POST['dName']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New Director added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update director set director_name=? where director_id=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['dName'], $_POST['did']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Director edited.</div>';
      break;
    case 'Delete':
      $sqlDelete = "delete from director where director_id=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['did']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Director deleted.</div>';
      break;
  }
}
?>
<div>Feel free to add directors whose movies you want to get featured!</div>
<div>Click on their names to see which movies that they directed that have been added on this site.</div>
</hr>
      <h1>Directors</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
          
<?php
$sql = "SELECT director_id, director_name from director";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["director_id"]?></td>
            <td><a href="director-movie.php?id=<?=$row["director_id"]?>"><?=$row["director_name"]?></a></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editDirector<?=$row["director_id"]?>">
                Edit
              </button>
              <div class="modal fade" id="editDirector<?=$row["director_id"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDirector<?=$row["director_id"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editDirector<?=$row["director_id"]?>Label">Edit Director</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editDirector<?=$row["director_id"]?>Name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="editDirector<?=$row["director_id"]?>Name" aria-describedby="editDirector<?=$row["director_id"]?>Help" name="dName" value="<?=$row['director_name']?>">
                          <div id="editDirector<?=$row["director_id"]?>Help" class="form-text">Enter the director's name.</div>
                        </div>
                        <input type="hidden" name="did" value="<?=$row['director_id']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="did" value="<?=$row["director_id"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <input type="submit" class="btn" onclick="return confirm('Are you sure?')" value="Delete">
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
      <br />
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDirector">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addDirector" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDirectorLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addDirectorLabel">Add Director</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="directorName" class="form-label">Name</label>
                  <input type="text" class="form-control" id="directorName" aria-describedby="nameHelp" name="dName">
                  <div id="nameHelp" class="form-text">Enter the director's name.</div>
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
