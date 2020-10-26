
<div class="row">
        <div class="col">


<h1 class="text-info mt-4 mb-5">Exams attempted</h1>

<ul class="list-group">
<?php
	if(count($attempts) > 0) {
		foreach($attempts as $attempt) {
			$attemptId = $attempt['id'];
			echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="view-result-details.php?attempt_id=' . $attemptId . '">' . $attempt['name'] . '</a><span class="badge badge-primary badge-pill">' . date('Y-m-d') . '</span></li>';
		}
	} else {
		echo '<li>You\'ve not attempted any exams.</li>';
	}
?>
</ul>

      </div>
</div>