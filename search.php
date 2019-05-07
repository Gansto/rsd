<?
require("init.php");

$menu			= "search";
$base_name		= "信息搜索";
$second_name	= "信息搜索";

$search		= htmlspecialchars(trim($_GET["search_keyword"]));

function dowith_sql($str)
{
    $str = str_replace("and","",$str);
    $str = str_replace("execute","",$str);
    $str = str_replace("update","",$str);
    $str = str_replace("count","",$str);
    $str = str_replace("chr","",$str);
    $str = str_replace("mid","",$str);
    $str = str_replace("master","",$str);
    $str = str_replace("truncate","",$str);
    $str = str_replace("char","",$str);
    $str = str_replace("declare","",$str);
    $str = str_replace("select","",$str);
    $str = str_replace("create","",$str);
    $str = str_replace("delete","",$str);
    $str = str_replace("insert","",$str);
    $str = str_replace("'","",$str);
    $str = str_replace("","",$str);
    $str = str_replace(" ","",$str);
    $str = str_replace("or","",$str);
    $str = str_replace("=","",$str);
    $str = str_replace("%20","",$str);
    return $str;
}

$search = dowith_sql($search);

if(empty($search)){
    echo "<script>alert('搜索关键词含有敏感词汇，请重新输入！');history.back(-1);</script>";
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?=$base_name?> - <?=$config_name?></title>
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
require_once("nav.php");
?>
<div id="g-wp" class="g-wp">
	<?
    require_once("begin.php");
    ?>
	<div class="container isd">
		<?
		require_once("left.php");
		?>
		<div class="bd">
           <ul class="m-list">
                <?
				$sql = "select count(*) as cnt from info where title like '%$search%' and state>0  ";
				$rst = $db->query($sql);
				if ($row = $db->fetch_array($rst)) {
					$recordCount = $row["cnt"];
				} else {
					$recordCount = 0;
				}

				$page		= (int)$_GET["page"];
				$page		= $page > 0 ? $page : 1;
				$pageSize	= 10;
				$pageCount	= ceil($recordCount / $pageSize);
				if ($page > $pageCount) $page = $pageCount;

				$sql = "select id, title, pic, create_time, content from info where title like '%$search%' and state>0  order by sortnum desc";
				$sql .= " limit " . ($page - 1) * $pageSize . ", " . $pageSize;
				$rst = $db->query($sql);
				while ($row = $db->fetch_array($rst)) {
					$publishdate = explode(' ', $row['create_time']);
				?>
				<li><a href="display.php?id=<?=$row['id']?>"><?=$row['title']?></a></li>
				<?
					}
				?>
            </ul>
            <p class="page"><?=page2($page, $pageCount, "search.php")?></p>
		</div>
	</div>
	<?
    require_once("end.php");
    ?>
</div>
</body>
</html>