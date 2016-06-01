<style type="text/css">
figure 
{
	position: relative;
	overflow: hidden;
}

figure a img
{
	margin: 0 auto;
}
figcaption 
{
	font-style: italic;
	display: inline-block;
	position: absolute;
	top:0px;
	background: rgba(0,0,0,0.5);
	color: #fff;
	padding: 0 15px 0 15px;
	
	max-width:100%;
	overflow: hidden;
	max-height: 100%;
	left: -100%;
	-webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
	
}
.show_figcaption
{
	left: 0;
}

</style>


<script type="text/javascript">
$(function(){
	$(function() {
	    $("img").lazyload({effect: "fadeIn",threshold : 200});
	    
	    //當圖片進入可視區顯示描述，移開消失
	    $(window).scroll(function(){
	    	$("figure").each(function(){
	    		var this_top=$(this).offset().top;
	    		var window_top=$(window).scrollTop();
		    	if(this_top+($(this).height()/2) >=  window_top && this_top <= window_top+($(window).height()/2))
		    	{
		    		$(this).find("figcaption").addClass("show_figcaption");
		    	}else
		    	{
		    		$(this).find("figcaption").removeClass("show_figcaption");
		    	}
		    });
	    });
	   //--
	});
});
</script>
<div class="banner_div">
	<?= $archive['bac_banner']?>
</div>
<div class="container blog-article">
	<div class="blog-header">
		<h1 class="blog-title"><?= $archive['bac_title']?></h1>
		<p class="lead blog-description"><?=  substr($archive['bac_created_time'], 0, 10)?></p>
	</div>
	<hr/>
	<div class="col-md-12 blog-content" style="margin-bottom: 100px;">
		<div class="blog-post">
			<?= $this->typography->auto_typography($archive['bac_content'])?>
			<!--two  landscape & portrait-->
			<!--
			<div class="two_img_content">
				<div class="mdg_L col-md-4">
					<figure class="middle_size_img">
						<a data-flickr-embed="true"  href="https://www.flickr.com/photos/103272983@N07/20402262850/in/dateposted/" title="DSC00628"><img src="https://farm1.staticflickr.com/707/20402262850_53dc4604a9_b.jpg" width="1024" height="683" alt="DSC00628"></a>
					</figure>
				</div>
				<div class="mdg_P col-md-2">
					<figure class="middle_size_img">
						<a data-flickr-embed="true"  href="https://www.flickr.com/photos/103272983@N07/20596826851/in/dateposted/" title="DSC00638"><img src="https://farm1.staticflickr.com/637/20596826851_9f9b8f48d4_b.jpg" width="683" height="1024" alt="DSC00638"></a>
					</figure>
				</div>
				<div class="mdg_L col-md-4">
					<figure class="middle_size_img">
						<a data-flickr-embed="true"  href="https://www.flickr.com/photos/103272983@N07/20403673139/in/dateposted/" title="DSC00471">
							<img src="https://farm6.staticflickr.com/5706/20403673139_19fd92eb24_b.jpg" width="1024" height="683" alt="DSC00471">
						</a>
					</figure>
				</div>
				<div class="mdg_P col-md-2">
					<figure class="middle_size_img">
						<a data-flickr-embed="true"  href="https://www.flickr.com/photos/103272983@N07/20590428195/in/dateposted/" title="DSC00518">
							<img src="https://farm1.staticflickr.com/700/20590428195_75b033c9da_b.jpg" width="683" height="1024" alt="DSC00518">
						</a>
					</figure>
				</div>
			</div>
			-->
			<!--
			<div class="two_img_content">
				<div class="mdg_L col-md-8">
					<figure class="middle_size_img">
						<a data-flickr-embed="true"  href="https://www.flickr.com/photos/103272983@N07/20403710189/in/dateposted/" title="DSC00490">
							<img class="img-responsive" src="https://farm1.staticflickr.com/726/20403710189_56a17b2279_b.jpg" width="1024" height="683" alt="DSC00490">
						</a>
					</figure>
				</div>
				<div class="mdg_P col-md-4">
					<figure class="middle_size_img">
						<a data-flickr-embed="true"  href="https://www.flickr.com/photos/103272983@N07/20402400198/in/dateposted/" title="DSC00478">
							<img src="https://farm1.staticflickr.com/594/20402400198_288d5e6e80_b.jpg" width="683" height="1024" alt="DSC00478">
						</a>
					</figure>
				</div>
				
			</div>
			-->
		</div>
	</div>
	<div class="col-md-12 blog-bottom text-right" style="margin-bottom: 30px;">
		<?php if (!empty($archive['bcg_name'])): ?>
		<p class="blog-bottom-category"><?= $archive['bcg_name']?></p>
		<?php endif;?>
		<!--
		<br/>
		<br/>
		<p><a href="#" class="btn btn-primary" title="facebook"><i class="fa fa-facebook fa-lg"></i></a></p>
		-->
	</div>
</div>
<div class="blog-article-back">
  <ul class="pager">
  	<?php if (isset($_SERVER['HTTP_REFERER'])): ?>
    <li><a href="<?= $_SERVER['HTTP_REFERER']?>">返回</a></li>
    <?php endif; ?>
  </ul>
</div>
<!--
<figure class="embed-responsive embed-responsive-16by9">
	<iframe width="1280" height="720" src="https://www.youtube.com/embed/ydyMRJkY2w0" frameborder="0" allowfullscreen></iframe>
</figure>
-->
<script type="text/javascript">
	$("img").each(function(){
		var src=$(this).attr("src");
		$(this).attr("src","");
		$(this).attr("data-original",src);
	});
</script>