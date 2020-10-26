
<div class="row">
        <div class="col">


<h1 class="text-info mt-4 mb-5">Exams attempted</h1>

<?php
	if(count($results) > 0) {
		echo '<table class="table table-bordered">';
		echo '<thead><th>&nbsp;</th><th>Question</th><th>Your Answer</th><th>&nbsp;</th></thead>';
		echo '<tbody>';
		$index = 1;
		foreach($results as $result) {
			echo '<tr>';
			echo '<td>';
			echo $index;
			echo '</td>';
			echo '<td>';
			echo $result['question'];
			echo '</td>';
			echo '<td>';
			echo $result['option'];
			echo '</td>';
			echo '<td>';
			echo $result['answer'] == 1? "Correct": "Wrong";
			echo '</td>';
			echo '</tr>';
			$index++;
		}
		echo '</tbody></table>';
	} else {
		echo '<div class="alert alert-info">Result details not found!</div>';
	}
?>

      </div>
</div>