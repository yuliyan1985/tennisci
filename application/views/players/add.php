<h1><center><?php echo $title; ?></center></h1>

<?php echo form_open('players/create',['method'=>'POST']); ?>
<label>Добави играч</label>
<div class="form-group">
	<input type="text" class="form-control" name="player" placeholder="Add player">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>










