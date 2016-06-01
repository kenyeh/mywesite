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

/*full img*/
.full_img
{
	overflow: visible;
	margin-bottom: 10px;
	margin-top: 10px;
}


/*middle_size_img*/
.middle_size_img
{
	position: static;
	overflow: visible;
	margin:10px 0px 10px 0px !important;
	
}

@media screen and (min-width:1024px){
    .mdg_P.col-md-4
	{
		padding-left: 38px;
	}
	
	.mdg_P.col-md-2
	{
		padding-left: 18px;
	}
}


</style>

<script type="text/javascript">
$(function(){
	$(function() {
	    $("img").lazyload({effect: "fadeIn",threshold : 200});
	    
	    
	   
	   //--full img
	   var leftpadding=(($(window).width()-($(".blog-article").width()+30))/2);
	   $(".full_img").css("left",0-leftpadding);
	   $(".full_img").css("width",$(window).width());
	   
	   
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
			
			
			
		</div>
	</div>
	<div class="col-xs-12 blog-bottom text-right" style="margin-bottom: 30px;">
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