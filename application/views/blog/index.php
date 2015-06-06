<script type="text/javascript">
  $(function() {
	    $(".index-blog-main img").lazyload({effect: "fadeIn",threshold : 200});
	});
</script>
<div class="jum-bg">
<div class="jum-filter">
  <div class="container">
      <div class="blog-header">
        <h1 class="blog-index-title"><?= $blog_index_title?></h1>
        <p class="lead blog-index-description"><?= $blog_index_description?></p>
      </div>
  </div>
</div>
</div>
<div class="container">
  <div class="row">

    <div class="col-lg-8 col-md-12  index-blog-main">

			<!-- blog-post-start -->
			<?php foreach($archives as $archives_item):?>
			<div class="blog-post">
			  
			  <div class="index_banner_div">
			  <?= $archives_item['bac_banner']?>
			  </div>
			  <div class="index-blog-header">
  				<a class="h2 index-blog-title" href="<?= base_url()?>blog/<?= url_title($archives_item['bac_title'])."-".$this->blog_model->ntk_encrypt($archives_item['bac_id'])?>"><?= $archives_item['bac_title']?></a>
  				<p class="index-blog-meta"><?=  substr($archives_item['bac_created_time'], 0, 10)?></p>
        </div>
        <div class="index-blog-fp">
			    <?= $this->blog_model->show_first_part($this->typography->auto_typography($archives_item['bac_content']));?>
				</div>
				<hr/>
				<div class="index-blog-link">
				  <a href="<?= base_url()?>blog/<?= url_title($archives_item['bac_title'])."-".$this->blog_model->ntk_encrypt($archives_item['bac_id'])?>">Continue reading</a>
				</div>
				
			</div>
			<?php endforeach ?>
			<!-- blog-post-end -->
      <div class="index-blog-pagination">
  			<nav>
  			  <?=$this->pagination->create_links();?>
  			</nav>
			</div>

    </div><!-- /. index-blog-main -->

    <div class="col-lg-3 col-lg-offset-1 col-md-12 blog-sidebar">
      
      <div class="sidebar-module sidebar-module-inset">
        <h3 class="widget-title">
          <span>關於我</span>
        </h3>
        <div class="sidebar-module-img">
          <a href="<?= base_url()?>">
            <img style="width:120px;" src="<?= base_url()?>resource/images/blog/avatar.png" class="img-circle">
          </a>
        </div>
        <div class="sidebar-module-description">
          <h3 class="text-primary"><?=$author_name?></h3>
          <p>我隨便寫寫，你隨便看看。</p>
        </div>
      </div>
      <div class="sidebar-module">
        <h3 class="widget-title">
          <span>近期文章</span>
        </h3>
        
        <?php foreach($recent_archives as $recent_archives_item):?>
        <div class="sidebar_list">
          <div class="sidebar_list_img">
          <!--if empty banner img --> 
          <?php if (empty($recent_archives_item['bac_banner'])): ?>
            <div class="well well-sm text-center">
              <i class="fa fa-pencil-square-o fa-lg"></i>
            </div>
          <?php else: ?>
          <!--else -->
            <!--if isset banner iframe --> 
            <?php if (false !== ($rst = strpos($recent_archives_item['bac_banner'], "iframe"))): ?>
              <div class="well well-sm text-center">
                <i class="fa fa-film fa-lg"></i>
              </div>
            <!--else -->
            <?php else: ?>
              <?= $recent_archives_item['bac_banner']?>
            <?php endif; ?>
            <!--endif -->
          <?php endif; ?>
          <!--endif -->
          </div>
          <div class="sidebar_list_content">
            <a href="<?= base_url()?>blog/<?= url_title($recent_archives_item['bac_title'])."-".$this->blog_model->ntk_encrypt($recent_archives_item['bac_id'])?>"><?=  substr($recent_archives_item['bac_created_time'], 0, 10)?></a><br/>
            <p><?= $recent_archives_item['bac_title']?></p>
          </div>
        </div>
        <?php endforeach ?>
        
      </div>
      <div class="sidebar-module">
        <h3 class="widget-title">
          <span>連結</span>
        </h3>
        <div class="sidebar-module-description">
          <a href="#" class="btn btn-primary" title="facebook"><i class="fa fa-facebook fa-lg"></i></a>
          <a href="#" class="btn btn-primary" title="linkedin"><i class="fa fa-linkedin fa-lg"></i></a>
          <a href="#" class="btn btn-primary" title="instagram"><i class="fa fa-instagram fa-lg"></i></a>
          <a href="#" class="btn btn-primary" title="github"><i class="fa fa-github fa-lg"></i></a>
        </div>
      </div>
      
    </div><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</div><!-- /.container -->
<!--lazyload-->
<script type="text/javascript">
	$(".index-blog-main img").each(function(){
		var src=$(this).attr("src");
		$(this).attr("src","");
		$(this).attr("data-original",src);
	});
</script>