<?php

// Connect to the database
$conn = new mysqli('localhost', 'root', 'mysql', 'aptitude_test');

if($conn->connect_error) {
	exit('Couldn\'t connect to the Db');
}

$sql = "SELECT * from subjects";

$result = $conn->query($sql);
if (!$result) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$subjects = [];
while($row = $result->fetch_assoc()) {
	$subjects[] = $row;
}

?>



      <div class="row">
        <div class="col">

          <form class="form-wrapper" action="start_exam.php" method="post">
<h1 class="text-info mt-4 mb-5">Take an Exam</h1>
          <?php if(!empty($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
          <?php endif ?>
          
  <div class="form-group">
    <select name="exam_id" class="form-control">
    	<option value="">Please select a subject</option>
    	<?php

    	foreach($subjects as $subject) {
    		echo '<option value="' . $subject['id'] . '">' . $subject['name'] . '</option>';
    	}

    	?>
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-outline-info">Start exam</button>
  </div>

  </form>
      </div>
</div>