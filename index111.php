<?
require("init.php");
$menu = "default";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?=$config_title?></title>
<meta name="keywords" content="<?=$config_keywords?>" />
<meta name="description" content="<?=$config_description?>" />
<link href="images/base.css" rel="stylesheet" />
<link href="images/home.css" rel="stylesheet" />
<link href="images/swiper.min.css" rel="stylesheet" />
<script src="js/jquery.min.js"></script>
<script src="js/jquery.SuperSlide.2.1.2.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/common.js"></script>
<? echo $config_webJavascriptHead;?>
</head>
<body>
<?
	require("nav.php");
?>
<div id="g-wp" class="g-wp">
 	<?
	require("begin.php");
	?>
	<div class="container">
		<div class="hp-1">
			<ul class="clearfix">
				<li><a href="info.php?class_id=101"><em></em>公司介绍</a></li>
				<li><a href="info.php?class_id=102"><em></em>产品中心</a></li>
				<li><a href="info.php?class_id=103"><em></em>资讯动态</a></li>
				<li><a href="info.php?class_id=104"><em></em>开店合作</a></li>
				<li><a href="info.php?class_id=105"><em></em>开店优势</a></li>
				<li><a href="info.php?class_id=106"><em></em>开店案例</a></li>
			</ul>
		</div>
		<div class="hp-2">
			<h2 class="h2">荣事达地板<em></em></h2>
			<div class="hd">
				<ul class="clearfix">
					<li>智能地板</li>
					<li>强化地板</li>
					<li>实木地板</li>
					<li>实木复合</li>
				</ul>
			</div>
			<div class="bd">
				<ul class="clearfix">
					<?
					    $sql = "select id, title, pic from info where class_id = '102101' and state>0 and pic<>'' order by state desc, sortnum desc limit 6";
					    $rst = $db->query($sql);
					    while ( $row = $db->fetch_array($rst) ) {
				    ?>
					<li><a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /><p><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),7)?></p></a></li>
					<?
						}
					?>
				</ul>
				<ul class="clearfix">
					<?
					    $sql = "select id, title, pic from info where class_id = '102102' and state>0 and pic<>'' order by state desc, sortnum desc limit 6";
					    $rst = $db->query($sql);
					    while ( $row = $db->fetch_array($rst) ) {
				    ?>
					<li><a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /><p><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),7)?></p></a></li>
					<?
						}
					?>
				</ul>
				<ul class="clearfix">
					<?
					    $sql = "select id, title, pic from info where class_id = '102103' and state>0 and pic<>'' order by state desc, sortnum desc limit 6";
					    $rst = $db->query($sql);
					    while ( $row = $db->fetch_array($rst) ) {
				    ?>
					<li><a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /><p><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),7)?></p></a></li>
					<?
						}
					?>
				</ul>
				<ul class="clearfix">
					<?
					    $sql = "select id, title, pic from info where class_id = '102104' and state>0 and pic<>'' order by state desc, sortnum desc limit 6";
					    $rst = $db->query($sql);
					    while ( $row = $db->fetch_array($rst) ) {
				    ?>
					<li><a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /><p><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),7)?></p></a></li>
					<?
						}
					?>
				</ul>
			</div>
		</div>
		<script>
			jQuery(".hp-2").slide({titCell:".hd li",mainCell:".bd",effect:"fade",trigger:"click"});
		</script>
		<div class="hp-3">
			<h2 class="h2">代理4大理由 让开店更简单<em></em></h2>
			<?
			    $sql = "select title, pic from banner where class_id = 3 and state>0 and pic<>'' order by sortnum desc";
			    $rst = $db->query($sql);
			    if ( $row = $db->fetch_array($rst) ) {
			?>
			<img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" />
			<?
				}
			?>
		</div>
		<div class="hp-4">
			<h2 class="h2">成功案例<em></em></h2>
			<ul class="clearfix">
				<?
				    $sql = "select id, title, pic from info where class_id = '106101' and state>0 and pic<>'' order by state desc, sortnum desc limit 6";
				    $rst = $db->query($sql);
				    while ( $row = $db->fetch_array($rst) ) {
			    ?>
				<li><a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /><p><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),7)?></p></a></li>
				<?
					}
				?>
			</ul>
		</div>
		<div class="hp-5">
			<h2 class="h2">八大加盟政策支持 让开店更简单<em></em></h2>
			<ul>
				<li class="clearfix">
					<p class="p1">合作送车</p>
					<p class="p2">首次合作经销商车辆支持（东风小康服务车）</p>
				</li>
				<li class="clearfix">
					<p class="p1">品牌支持</p>
					<p class="p2">品牌logo、统一物料支持等</p>
				</li>
				<li class="clearfix">
					<p class="p1">建店支持</p>
					<p class="p2">免费设计、装修、规划等，提供运用所需证件等</p>
				</li>
				<li class="clearfix">
					<p class="p1">培训支持</p>
					<p class="p2">开业全方位买了房系统培训，全年度各项定期培训</p>
				</li>
				<li class="clearfix">
					<p class="p1">开业支持</p>
					<p class="p2">协助组织开业活动、免费宣传物品提供、开业销售辅导</p>
				</li>
				<li class="clearfix">
					<p class="p1">宣传支持</p>
					<p class="p2">多方渠道对品牌产品宣传，特殊地区市场广告费用支持</p>
				</li>
				<li class="clearfix">
					<p class="p1">服务支持</p>
					<p class="p2">“红地毯服务”给予完善的流程和技术指导、人员培训</p>
				</li>
				<li class="clearfix">
					<p class="p1">人员支持</p>
					<p class="p2">驻外营销人员到各地给予全方位指导和协助市场开发</p>
				</li>
			</ul>
			<div class="bd">
				<?
				    $sql = "select url, title, pic from banner where class_id = 4 and state>0 and pic<>'' order by sortnum desc";
				    $rst = $db->query($sql);
				    if ( $row = $db->fetch_array($rst) ) {
				?>
				<a href="<?=$row["url"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a>
				<?
					}
				?>
			</div>
		</div>
		<div class="hp-6">
			<h2 class="h2">权威见证 荣誉展示<em></em></h2>
			<div class="swiper-container swiper-container-2">
				<div class="swiper-wrapper">
					<?
					    $sql = "select id, title, pic from info where class_id = '101103' and state>0 and pic<>'' order by state desc, sortnum desc limit 6";
					    $rst = $db->query($sql);
					    while ( $row = $db->fetch_array($rst) ) {
				    ?>
					<div class="swiper-slide"><a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a></div>
					<?
						}
					?>
				</div>
				<div class="swiper-pagination swiper-pagination-2"></div>
			</div>
			<script>
			var swiper1 = new Swiper('.swiper-container-2', {
				pagination: '.swiper-pagination-2',
				slidesPerView: 3,
				paginationClickable: true,
				spaceBetween: 6,
				loop: true
			});
			</script>
		</div>
		<div class="hp-7">
			<h2 class="h2">荣事达地板<em></em></h2>
			<?
			    $sql = "select content from info where class_id = '101101' and state>0 order by state desc, sortnum desc";
			    $rst = $db->query($sql);
			    if ( $row = $db->fetch_array($rst) ) {
		    ?>
			<div class="i"><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["content"])),150)?></div>
			<?
				}
			?>
			<ul class="clearfix">
				<li><a href="info.php?class_id=101102"><em></em>企业文化</a></li>
				<li><a href="info.php?class_id=101103"><em></em>企业荣誉</a></li>
				<li><a href="info.php?class_id=101104"><em></em>服务理念</a></li>
			</ul>
		</div>
		<div class="hp-8">
			<h2 class="h2">新闻中心<em></em></h2>
			<div class="hd">
				<ul class="clearfix">
					<li>公司新闻</li>
					<li>行业资讯</li>
					<li>常见问题</li>
				</ul>
			</div>
			<div class="bd">
				<div class="news-list">
					<div class="hot clearfix">
						<?
						    $sql = "select id, title, pic, content from info where class_id = '103101' and state>0 and pic<>'' order by state desc, sortnum desc";
						    $rst = $db->query($sql);
						    if ( $row = $db->fetch_array($rst) ) {
					    ?>
						<div class="p">
							<a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a>
						</div>
						<div class="t">
							<h3><a href="display.php?id=<?=$row["id"]?>"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["title"])),20)?></a></h3>
							<div class="i"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["content"])),28)?></div>
						</div>
						<?
							}
						?>
					</div>
					<ul>
						<?
						    $sql = "select id, title from info where class_id = '103101' and state>0 order by state desc, sortnum desc limit 6";
						    $rst = $db->query($sql);
						    while ( $row = $db->fetch_array($rst) ) {
					    ?>
						<li><a href="display.php?id=<?=$row["id"]?>"><em></em><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),20)?></a></li>
						<?
							}
						?>
					</ul>
				</div>
				<div class="news-list">
					<div class="hot clearfix">
						<?
						    $sql = "select id, title, pic, content from info where class_id = '103101' and state>0 and pic<>'' order by state desc, sortnum desc";
						    $rst = $db->query($sql);
						    if ( $row = $db->fetch_array($rst) ) {
					    ?>
						<div class="p">
							<a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a>
						</div>
						<div class="t">
							<h3><a href="display.php?id=<?=$row["id"]?>"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["title"])),20)?></a></h3>
							<div class="i"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["content"])),28)?></div>
						</div>
						<?
							}
						?>
					</div>
					<ul>
						<?
						    $sql = "select id, title from info where class_id = '103101' and state>0 order by state desc, sortnum desc limit 6";
						    $rst = $db->query($sql);
						    while ( $row = $db->fetch_array($rst) ) {
					    ?>
						<li><a href="display.php?id=<?=$row["id"]?>"><em></em><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),20)?></a></li>
						<?
							}
						?>
					</ul>
				</div>
				<div class="news-list">
					<div class="hot clearfix">
						<?
						    $sql = "select id, title, pic, content from info where class_id = '103101' and state>0 and pic<>'' order by state desc, sortnum desc";
						    $rst = $db->query($sql);
						    if ( $row = $db->fetch_array($rst) ) {
					    ?>
						<div class="p">
							<a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a>
						</div>
						<div class="t">
							<h3><a href="display.php?id=<?=$row["id"]?>"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["title"])),20)?></a></h3>
							<div class="i"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["content"])),28)?></div>
						</div>
						<?
							}
						?>
					</div>
					<ul>
						<?
						    $sql = "select id, title from info where class_id = '103101' and state>0 order by state desc, sortnum desc limit 6";
						    $rst = $db->query($sql);
						    while ( $row = $db->fetch_array($rst) ) {
					    ?>
						<li><a href="display.php?id=<?=$row["id"]?>"><em></em><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),20)?></a></li>
						<?
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<script>
			jQuery(".hp-8").slide({titCell:".hd li",mainCell:".bd",effect:"fade",trigger:"click"});
		</script>
	</div>
    <?
	require("end.php");
	?>
</div>
</body>
</html>