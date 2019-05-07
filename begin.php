<div class="header">
	<div class="search">
		<div class="search-o"></div>
		<div class="search-x"></div>
	</div>
	<form action="search.php" method="get" class="form-search">
		<input type="text" name="search_keyword" value="" required="required" placeholder="请输入搜索关键字" />
		<input type="submit" value="搜索" />
	</form>
	<div class="logo">
		<?
		    $sql = "select title, pic from banner where class_id = 2 and state>0 and pic<>'' order by sortnum desc";
		    $rst = $db->query($sql);
		    if ( $row = $db->fetch_array($rst) ) {
		?>
		<a href="./"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a>
		<?
			}
		?>
	</div>
	<div class="ico"></div>
</div>
<div class="swiper-container swiper-container-1">
	<div class="swiper-wrapper">
		<?
		    $sql = "select url, title, pic from banner where class_id = 1 and state>0 and pic<>'' order by sortnum desc";
		    $rst = $db->query($sql);
		    while ( $row = $db->fetch_array($rst) ) {
	    ?>
		<div class="swiper-slide"><a href="<?=$row["url"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a></div>
		<?
			}
		?>
	</div>
	<div class="swiper-pagination swiper-pagination-1"></div>
</div>
<script>
var swiper1 = new Swiper('.swiper-container-1', {
	pagination: '.swiper-pagination-1',
	slidesPerView: 1,
	paginationClickable: true,
	spaceBetween: 0,
	loop: true
});
</script>