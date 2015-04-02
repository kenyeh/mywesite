
<div class="container blog-archive">
	<div class="blog-header">
		<h1 class="blog-title"><?= $archive['bac_title']?></h1>
		<p class="lead blog-description"><?=  substr($archive['bac_created_time'], 0, 10)?> by <a href="#"><?= $archive['bac_created_user']?></a></p>
	</div>
	<div class="col-sm-12 blog-main">
		<div class="blog-post">
			<p><?= $this->typography->auto_typography($archive['bac_content'])?></p>
		</div>
	</div>
</div>

