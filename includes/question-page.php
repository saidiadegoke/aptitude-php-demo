
<div class="row">
        <div class="col">

          <form class="form-wrapper my-5" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<h1 class="text-info mt-4 mb-5"><?php echo $exam['name']; ?></h1>
          <?php if(!empty($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
          <?php endif ?>
          
  <div class="form-group">
    <p class="lead">
    	<?php echo $question['question']; ?>
    </p>
  </div>
  <div class="form-group">
    <p>
    	<?php

    	foreach($options as $option) {
    		echo '<div class="form-check">
  <input class="form-check-input" type="radio" name="question' . $option['question_id'] . '" id="question' . $option['id'] . '" value="' . $option['id'] . '">
  <label class="form-check-label" for="exampleRadios1">
    ' . $option['option'] . '
  </label>
</div>';
    	}

    	?>
    </p>
  </div>
  <div class="form-group">
  	<input type="hidden" name="question_id" value="<?= $question['id'] ?>">
  	<input type="hidden" name="option_id" value="<?= $option['id'] ?>">
  	<input type="hidden" name="user_id" value="<?= $user['id'] ?>">
    <button type="submit" class="btn btn-outline-info"><?= $label ?></button>
  </div>

  </form>
      </div>
</div>