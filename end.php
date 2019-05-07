	<div class="footer">
		<div class="copyright">
			<?=$config_copyright?>
		</div>
	</div>
	<div class="fixed-list">
		<ul class="clearfix">
			<li><a href="./"><em></em>首页</a></li>
			<li><a href="tel:<?=$config_hotline?>"><em></em>电话</a></li>
			<li><a href="message.php"><em></em>开店</a></li>
			<li><a href="info.php?class_id=107"><em></em>联系</a></li>
		</ul>
	</div>
	<div class="u-mask hide"></div>
<script>
$(function(){
	$('.search-o').bind('click', function () {
		$(this).css({"left":-50,"opacity":0}).next('.search-x').css({"left":0,"opacity":1});
		$('.form-search').css({"top":84,"opacity":1});
	})

	$('.search-x').bind('click', function () {
		$(this).css({"left":-50,"opacity":0}).prev('.search-o').css({"left":0,"opacity":1});
		$('.form-search').css({"top":-150,"opacity":0});
	})

	// $('.col').bind('click', function () {
	// 	$('.u-mask').removeClass('hide');
	// 	$('.m-menu').stop().animate({right:0,opacity:1});
	// })

	$('.ico').bind('click', function () {
		$('body').addClass('z-open');
		$('.u-mask').removeClass('hide');
	})

	$('.u-mask').bind('click', function () {
		$('body').removeClass('z-open');
		$('.u-mask').addClass('hide');
		$('.m-menu').stop().animate({right:'-50%',opacity:0});
	})
})
</script>
<script>
	$.ajax({ url: 'hit_counter.php', data: { page: document.location.pathname } }) 
</script>
<?
$db->close();
echo $config_webJavascriptFoot;
?>