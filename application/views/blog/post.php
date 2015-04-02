<script type="text/javascript">
$(function(){
	$(".blog-nav-item").removeClass("active");
	$("#Blog_post_link").addClass("active");
});
</script>
<div class="container blog-archive">
	<?= form_open('blog/post')?>
	<div class="blog-header">
		<h1 class="blog-title">
			<label class="sr-only" for="Archive_Title">Archive Title</label>
			<input type="text" name="title" class="form-control input-lg" id="Archive_Title" placeholder="Archive Title">
		</h1>
		<p class="lead blog-description">
			<?=  date("Y-m-d")?> by <a href="#"> User </a>
		</p>
	</div>
	<p>
		<label class="sr-only" for="Archive_Content">Archive Content</label>
		<textarea class="form-control input-lg" name="text" id="Archive_Content" rows="10" placeholder="Archive Content"></textarea>
	</p>
	<p>
		<?php echo validation_errors(); ?>
	</p>
	<button type="submit" name="submit" class="btn btn-primary btn-lg">POST</button>
	</form>
</div>