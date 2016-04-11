<!--css Simditor  -->
<link rel="stylesheet" type="text/css" href="<?= base_url()?>resource/css/simditor.css" />
<!--js Simditor  -->
<script type="text/javascript" src="<?= base_url()?>resource/js/Simditor/module.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>resource/js/Simditor/hotkeys.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>resource/js/Simditor/simditor.js"></script>

<script type="text/javascript">
$(function(){
	var editor = new Simditor({
	  textarea: $('#Article_Content'),
	  upload: false,
	  toolbar: 
		[
		  'title',//          # 标题文字
		  'bold',//           # 加粗文字
		  'italic',//         # 斜体文字
		  'underline',//      # 下划线文字
		  'strikethrough',//  # 删除线文字
		  'color',//          # 修改文字颜色
		  'ol',//             # 有序列表
		  'ul',//             # 无序列表
		  'blockquote',//     # 引用
		  'code',//           # 代码
		  'table',//          # 表格
		  'link',//           # 插入链接
		  'hr',//             # 分割线
		  'indent',//         # 向右缩进
		  'outdent',//        # 向左缩进
		  'figure',//     # flickr
		  'source',//         # HTML源代码
		]
	});
	
	var banner_html_type;
	
	$("#toggle_banner_img_btn").click(function(){
		banner_html_type="img";
		$("#banner_html").toggle();
	});
	
	$("#toggle_banner_video_btn").click(function(){
		banner_html_type="video";
		$("#banner_html").toggle();
	});
	
	$("#banner_html").blur(function(){
		
			
		
		if($("#banner_html").val().length == 0)
		{
			$("#toggle_banner_img_btn,#toggle_banner_video_btn").removeClass("btn-primary").addClass("btn-default");
		}else
		{
			if(banner_html_type=='img')
			{
				$("#toggle_banner_video_btn").removeClass("btn-primary").addClass("btn-default");
				$("#toggle_banner_img_btn").removeClass("btn-default").addClass("btn-primary");
			}else if(banner_html_type=='video')
			{
				var video_html="<div class='embed-responsive embed-responsive-16by9'>"+$("#banner_html").val()+"</div>";
				
				$("#banner_html").val(video_html);
				
				$("#toggle_banner_img_btn").removeClass("btn-primary").addClass("btn-default");
				$("#toggle_banner_video_btn").removeClass("btn-default").addClass("btn-primary");
			}
		}
		
		$("#banner_div").html($("#banner_html").val());
		$("#banner_html").hide();
	});
	

	
	if($("#banner_html").val().length > 0)
	{
		$("#banner_div").html($("#banner_html").val());
	}
	
	//--顯示文章
	if($("#Article_show").val()==1)
	{
		show_set(1,'blog_post_show_set','Article_show','fa-eye','fa-eye-slash','已顯示')
	}else
	{
		show_set(0,'blog_post_show_set','Article_show','fa-eye-slash','fa-eye','已隱藏')
	}
	
	$("#blog_post_show_set").click(function(){
		if($("#Article_show").val()==1)
		{
			show_set(0,'blog_post_show_set','Article_show','fa-eye-slash','fa-eye','已隱藏');
			$("#blog_post_show_set").children("i").tooltip('show');
		}else
		{
			show_set(1,'blog_post_show_set','Article_show','fa-eye','fa-eye-slash','已顯示');
			$("#blog_post_show_set").children("i").tooltip('show');
		}
	});
	
	//--顯示於首頁
	if($("#ShowOnIndex").val()==1)
	{
		show_set(1,'blog_post_ShowOnIndex','ShowOnIndex','fa-bookmark','fa-bookmark-o','取消顯示於首頁');
	}else
	{
		show_set(0,'blog_post_ShowOnIndex','ShowOnIndex','fa-bookmark-o','fa-bookmark','顯示於首頁');
	}
	
	$("#blog_post_ShowOnIndex").click(function(){
		if($("#ShowOnIndex").val()==1)
		{
			show_set(0,'blog_post_ShowOnIndex','ShowOnIndex','fa-bookmark-o','fa-bookmark','顯示於首頁');
			$("#blog_post_ShowOnIndex").children("i").tooltip('show');
		}else
		{
			show_set(1,'blog_post_ShowOnIndex','ShowOnIndex','fa-bookmark','fa-bookmark-o','取消顯示於首頁');
			$("#blog_post_ShowOnIndex").children("i").tooltip('show');
		}
	});
});
function show_set(set_val,a_id,input_id,icon_show,icon_remove,icon_text)
{
	var this_icon=$("#"+a_id).children("i");
	
	$("#"+input_id).val(set_val);
	this_icon.removeClass(icon_remove);
	this_icon.addClass(icon_show);
	this_icon.tooltip('hide').attr('data-original-title', icon_text).tooltip('fixTitle');
	
}
</script>
<style type="text/css">
form
{
	min-height: 80%;
}

figure 
{
	position: relative;
	padding-left: 10px;
}


figure a img
{
	position: relative;
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
	
}
</style>
<?= form_open('blog/post')?>
<input type="hidden" name="id" id="Article_Id" value="<?= $edit_id?>">
<div class="banner_div" id="banner_div">
</div>
<div class="container blog-post-banner" id="blog-post-banner">
	<textarea style="display:none;" class="form-control input-lg" name="banner" id="banner_html" rows="3" placeholder="banner html"><?= $archive_data['bac_banner']?></textarea>
	<button type="button" class="btn btn-default btn-sm tip" id="toggle_banner_img_btn" data-toggle="tooltip" data-placement="bottom" title="新增標題圖片"><i class="fa fa-picture-o fa-lg"></i></button>
	<button type="button" class="btn btn-default btn-sm tip" id="toggle_banner_video_btn" data-toggle="tooltip" data-placement="bottom" title="新增標題影片"><i class="fa fa-youtube-play fa-lg"></i></button>
</div>
<div class="container blog-article">
	<div class="blog-header">
		<h1 class="blog-title">
			<label class="sr-only" for="Article_Title">Article Title</label>
			<input type="text" name="title" class="form-control input-lg" id="Article_Title" placeholder="Article Title" value="<?= $archive_data['bac_title']?>">
		</h1>
		<p class="lead blog-description">
			<?=  date("Y-m-d")?><br/>
			<a id="blog_post_show_set" href="javascript:">
	      		<i class="fa fa-eye tip" data-toggle="tooltip" data-placement="bottom" title="顯示"></i>
	      	</a>
	      	<input type="hidden" name="show" id="Article_show" value="<?= $archive_data['bac_show']?>">
	      	&nbsp;
	      	<a id="blog_post_ShowOnIndex" href="javascript:">
	      		<i class="fa fa-bookmark-o tip" data-toggle="tooltip" data-placement="bottom" title="顯示於首頁"></i>
	      	</a>
	      	<input type="hidden" name="ShowOnIndex" id="ShowOnIndex" value="<?= $archive_data['bac_ShowOnIndex']?>">
		</p>
	</div>
	<hr/>
	<div class="col-md-12 blog-content" style=" margin-bottom: 100px;">
		<div class="blog-post">
			<p class="blog-p">
			<label class="sr-only" for="Article_Content">Article Content</label>
				<textarea class="form-control input-lg" name="text" id="Article_Content" rows="10" placeholder="Article Content"><?= $archive_data['bac_content']?></textarea>
			</p>
			<p class="blog-p">
				<?php echo validation_errors(); ?>
			</p>
		</div>
	</div>
	<div class="col-md-12 blog-bottom text-right" style="margin-bottom: 30px;">
		<p class="blog-bottom-category col-md-2 pull-right">
			<select name="category" class="form-control">
				<option value="">選擇分類</option>
	  			<?php foreach($category as $category_row):?>
	  				<option value="<?= $category_row['bcg_id']?>" <?php if ($archive_data['bac_f_blog_category']==$category_row['bcg_id']): ?>selected="selected"<?php endif; ?>><?= $category_row['bcg_name']?></option>
	  			<?php endforeach ?>
			</select>
		</p>
		
	</div>
</div>
<div class="blog-post-submit container">	
	<button type="submit" name="submit" class="btn btn-primary btn-lg">送出</button>
</div>
</form>