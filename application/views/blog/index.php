<script type="text/javascript">
  $(function() {
	    $(".index-blog-main img").lazyload({effect: "fadeIn",threshold : 200});
	});
</script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>resource/css/blog/banner_styles.css">
<script src="<?= base_url()?>resource/js/banner_main.js"></script>
<script src="<?= base_url()?>resource/js/stopExecutionOnTimeout.js?t=1"></script>
<?php if(count($banner_archives)>0):?>
<div class="slider-container" id="slider_container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <?php foreach($banner_archives as $key=>$banner_archives_item):?>
    <div class="slide slide-<?=$key?> ba_active">
      <div class="slide__bg">
      	<?=$banner_archives_item['bac_banner']?>
      </div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 49 740 405" preserveAspectRatio="xMidYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading"><a href="<?= base_url()?>blog/<?= url_title($banner_archives_item['bac_title'])."-".$this->blog_model->ntk_encrypt($banner_archives_item['bac_id'])?>"><?= $banner_archives_item['bac_title']?></a></h2>
          <div class="slide__text-desc">
            <?= $this->blog_model->show_first_part($this->typography->auto_typography($banner_archives_item['bac_content']));?>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>
<?php endif;?>

<!--
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
-->
<div class="container">
  <div class="row">

    <div class="col-lg-8 col-md-12  index-blog-main">

			<!-- blog-post-start -->
			<?php foreach($archives as $archives_item):?>
			<div class="blog-post">
			  
			  <div class="index_banner_div">
			  <?= $archives_item['bac_banner']?>
			  </div>
			  <!-- 標題 -->
			  <div class="index-blog-header">
  				<a class="h2 index-blog-title" href="<?= base_url()?>blog/<?= url_title($archives_item['bac_title'])."-".$this->blog_model->ntk_encrypt($archives_item['bac_id'])?>"><?= $archives_item['bac_title']?></a>
  				<p class="index-blog-meta"><?=  substr($archives_item['bac_created_time'], 0, 10)?></p>
  				<div class="blog-category">
  				<!-- 分類 -->
  			  <?php if (!empty($archives_item['bcg_name'])): ?>
  			    <p><?= $archives_item['bcg_name']?></p>
  			  <?php endif; ?>
  			  </div>
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
            <img style="width:120px;" src="<?= base_url()?>resource/images/blog/hd.JPG" class="img-circle">
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
          <a target="_blank" href="https://www.facebook.com/ken.yeh.5" class="btn btn-primary" title="facebook"><i class="fa fa-facebook fa-lg"></i></a>
          <a target="_blank" href="https://tw.linkedin.com/in/ken-yeh-247052117" class="btn btn-primary" title="linkedin"><i class="fa fa-linkedin fa-lg"></i></a>
          <!--<a target="_blank" href="#" class="btn btn-primary" title="instagram"><i class="fa fa-instagram fa-lg"></i></a>-->
          <a target="_blank" href="https://github.com/kenyeh/mywesite" class="btn btn-primary" title="github"><i class="fa fa-github fa-lg"></i></a>
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