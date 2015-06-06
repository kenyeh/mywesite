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
	<div class="col-md-12 blog-content" style=" margin-bottom: 100px;">
		<div class="blog-post">
			<?= $this->typography->auto_typography($archive['bac_content'])?>
		</div>
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