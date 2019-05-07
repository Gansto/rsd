<?
require("init.php");

$id	= (int)$_GET["id"];
if ($id < 1) {
	$db->close();
	header("location: index.php");
	exit;
}

$sql = "select id, class_id, title, pic, annex, source, author, views, content, webcontent, create_time from info where id=$id and state>0 limit 1";
$rst = $db->query($sql);
if ($row = $db->fetch_array($rst)) {
	$title			= $row["title"];
	$source			= $row["source"];
	$class_id		= $row["class_id"];
	$_three 		= substr($row["class_id"],0,3);//pierce add
	$content		= $row["content"];
	$webcontent		= $row["webcontent"];
	$create_time	= $row["create_time"];
	$publishdate	= explode(' ', $create_time);
	$views			= $row['views'];
	$author			= $row['author'];
	$pic			= $row['pic'];
	$annex			= $row['annex'];

	$sql = "update info set views=views+1 where id=$id";
	$db->query($sql);
} else {
	$db->close();
	header("location: index.php");
	exit;
}

$base_id	 = substr($class_id, 0, 3);

if ( strlen($class_id) == 3 ) {  // 只有base_id，默认第一个子栏目ID
	$base_id	= substr($class_id, 0, 3);
	$second_id	= '';
	$third_id	= '';
	$base_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $base_id . '\' limit 1');

	$cont = $db->getTableFieldValue('info_class', 'content', 'where id=\'' . $second_id . '\' limit 1');
	$second_name = '';
	$third_name = '';

} elseif ( strlen($class_id) == 6 ) {
	$base_id	= substr($class_id, 0, 3);
	$second_id	= substr($class_id, 0, 6);
	$third_id	= '';
	$base_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $base_id . '\' limit 1');
	$cont = $db->getTableFieldValue('info_class', 'content', 'where id=\'' . $second_id . '\' limit 1');
	$second_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $second_id . '\' limit 1');
	$third_name = '';
} elseif ( strlen($class_id) == 9 ) {
	$base_id	= substr($class_id, 0, 3);
	$second_id	= substr($class_id, 0, 6);
	$third_id	= substr($class_id, 0, 9);
	$base_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $base_id . '\' limit 1');
	$cont = $db->getTableFieldValue('info_class', 'content', 'where id=\'' . $second_id . '\' limit 1');
	$second_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $second_id . '\' limit 1');
	$third_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $third_id . '\' limit 1');
}

//获取上下文信息
$sql = "select id, title from info where class_id like ".$class_id." and state>0 order by create_time desc";
$rst = $db->query($sql);
while ($row = $db->fetch_array($rst)) {
	$infoArray[]	= $row;
}

$infoArrayCnt = count($infoArray);
if ($infoArrayCnt < 1) {
	$infoArrayCnt = -1;
}

for ($k = 0; $k < $infoArrayCnt; $k++) {
	if ($infoArray[$k]['id'] == $id){
		if ($k < $infoArrayCnt) {
			$next_id	= $infoArray[$k + 1]['id'];
			$next_title	= $infoArray[$k + 1]['title'];
		} else {
			$next_id	= 0;
		}

		if ($k > 0) {
			$pre_id		= $infoArray[$k - 1]['id'];
			$pre_title	= $infoArray[$k - 1]['title'];
		} else {
			$pre_id		= 0;
		}
	}
}

$first_id	= $infoArray[0]['id'];
$last_id	= $infoArray[$k -1]['id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?=$config_name?> - <?=$base_name?> - <?=$second_name?><?=!empty($third_id) ? " - ".$third_name : ''?></title>
<meta name="keywords" content="<?=$config_keyword?>" />
<meta name="description" content="<?=$config_description?>" />
<link href="images/base.css" rel="stylesheet" />
<link href="images/inside.css" rel="stylesheet" />
<link href="images/swiper.min.css" rel="stylesheet" />
<script src="js/jquery.min.js"></script>
<script src="js/jquery.SuperSlide.2.1.2.js"></script>
<script src="js/swiper.min.js"></script>
<? echo $config_webJavascriptHead;?>
</head>
<body>
<?
	require("nav.php");
?>
<div id="g-wp" class="g-wp">
<?
require_once("begin.php");
?>
<div class="container isd">
	<?
	require_once("left.php");
	?>
	<div class="article">
		<div class="mt">
			<h1><?=$title?></h1>
			<p class="titBar"><?=$publishdate[0]?></p>
		</div>
		<div class="mc">
            <?= $content;?>
		</div>
		<div class="pager-next-pre">
			<?
				if($pre_id==0){
			?>
			<a href="javascript:;">无</a>
			<?
				}else{
			?>
			<a href="display.php?id=<?=$pre_id?>">上一篇</a>
			<?
				}
			?>
			<?
				if($next_id==0){
			?>
			<a class="btn_next" href="javascript:;">无</a>
			<?
				}else{
			?>
			<a class="btn_next" href="display.php?id=<?=$next_id?>">下一篇</a>
			<?
				}
			?>
		</div>
	</div>
	<script>
        $('.article .mc img').each(function(){
            $(this).parents('p').css('text-indent','0px');
        });
    </script>
</div>
<?
require_once("end.php");
?>
</div>
</body>
</html>