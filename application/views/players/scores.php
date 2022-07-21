<h2><center>Добави Резултат</center></h2>


<?php echo form_open('players/result_update',['method'=>'POST']); ?>
<label for="result">
	Scores
</label>
<input type="number" class="form-control required" id="result" name="result" min="0" max="3" placeholder="Insert score here">
:
<input type="number" class="form-control required" id="result2" name="result2" min="0" max="3" placeholder="Insert score here">
<input type="hidden" name ="scores_id" value = "<?php echo $id;?>">

<br>
<br>
<button id="submit-button" type="submit" class="btn btn-success btn-lg btn-block">
	<i class="icon-check2"></i> Save
</button>
</form>
