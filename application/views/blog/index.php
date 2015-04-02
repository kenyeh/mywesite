<script type="text/javascript">
$(function(){
	$(".blog-nav-item").removeClass("active");
	$("#Blog_index_link").addClass("active");
});
</script>
	<div class="container">

      <div class="blog-header">
        <h1 class="blog-title"><?= $author_name?> <?= $title?></h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
			
			<!-- blog-post-start -->
			<?php foreach($archives as $archives_item):?>
			<hr>
			<div class="blog-post">
				<h2 class="blog-post-title"><?= $archives_item['bac_title']?></h2>
				<p class="blog-post-meta"><?=  substr($archives_item['bac_created_time'], 0, 10)?> by <a href="#"><?= $archives_item['bac_created_user']?></a></p>

				<p><?= $this->blog_model->show_first_part($this->typography->auto_typography($archives_item['bac_content']));?></p>
				
				<a href="blog/<?= url_title($archives_item['bac_title'])."-".$this->blog_model->ntk_encrypt($archives_item['bac_id'])?>">read more...</a>
			</div>
			<?php endforeach ?>
			<!-- blog-post-end -->

			<nav>
				<ul class="pager">
				<li><a href="#">Previous</a></li>
				<li><a href="#">Next</a></li>
				</ul>
			</nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About <?= $author_name?></h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->
