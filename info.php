<?
require("init.php");

$class_id	= trim($_GET["class_id"]);

if ( empty($class_id) || strlen($class_id) < 3 || (int)$db->getCount('info_class', "id='".$class_id."' limit 1") < 1 ) {
	$db->close();
	header("location: index.php");
	exit;
}

$base_id	 = substr($class_id, 0, 3);

$default_class_id = '';

if ( strlen($class_id) == 3 ) {  // 只有base_id，默认第一个子栏目ID
	if ( (int)$db->getTableFieldValue('info_class', 'has_sub', 'where id=\'' . $class_id . '\' limit 1') > 0 ) {
		$sql = "select id, name, has_sub,content from info_class where id like '".$class_id."___' order by sortnum asc limit 1";
		$rst = $db->query($sql);
		$row = $db->fetch_array($rst);

		$class_id	 = $row['id'];
		$base_id	 = substr($class_id, 0, 3);
		$cont		 = $row['content'];
		$base_name	 = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $base_id . '\' limit 1');

		$second_id	 = $row['id'];
		$second_name = $row['name'];

		$third_id	 = '';
		$third_name	 = '';
		$default_class_id = $row['id'];
	} else {
		$db->close();
		header("location: index.php");
		exit;
	}

} elseif ( strlen($class_id) == 6 ) {
	if ( (int)$db->getTableFieldValue('info_class', 'has_sub', 'where id=\'' . $class_id . '\' limit 1') > 0 ) {
		$sql = "select id, name, has_sub,content from info_class where id like '".$class_id."___' order by sortnum asc limit 1";
		$rst = $db->query($sql);
		$row = $db->fetch_array($rst);

		$class_id	 = $row['id'];
		$cont		 = $row['content'];
		$base_id	 = substr($class_id, 0, 3);
		$base_name	 = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $base_id . '\' limit 1');

		$second_id	 = substr($class_id, 0, 6);;
		$second_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $second_id . '\' limit 1');

		$third_id	 = $row['id'];
		$third_name	 = $row['name'];
		$default_class_id = $row['id'];
	} else {
		$sql = "select id, name, has_sub,content from info_class where id like '".$class_id."' order by sortnum asc limit 1";
		$rst = $db->query($sql);
		$row = $db->fetch_array($rst);

		$class_id	 = $row['id'];
		$cont		 = $row['content'];
		$base_id	 = substr($class_id, 0, 3);
		$base_name	 = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $base_id . '\' limit 1');

		$second_id	 = substr($class_id, 0, 6);;
		$second_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $second_id . '\' limit 1');

		$third_id	 = '';
		$third_name	 = '';
		$default_class_id = $second_id;
	}
} elseif ( strlen($class_id) == 9 ) {
	$base_id	= substr($class_id, 0, 3);
	$second_id	= substr($class_id, 0, 6);
	$third_id	= substr($class_id, 0, 9);
	$base_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $base_id . '\' limit 1');
	$second_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $second_id . '\' limit 1');
	$third_name = $db->getTableFieldValue('info_class', 'name', 'where id=\'' . $third_id . '\' limit 1');
	$default_class_id = $third_id;
}
$info_state  = $db->getTableFieldValue('info_class', 'info_state', 'where id=\'' . $default_class_id . '\' limit 1');

if($class_id=='104104'){
    $db->close();
    header("location: message.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?=$second_name?><?=!empty($third_id) ? " - ".$third_name : ''?> - <?=$base_name?> - <?=$config_name?></title>
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
        <?
        if ($info_state == 'content')
        {   // 内容模式
            $sql = "select id, title, content, webcontent from info where class_id like '" . $default_class_id . "%' and state>0 order by state desc, sortnum desc limit 1";
            $rst = $db->query($sql);
            if ($row = $db->fetch_array($rst)) {
                $id         = $row['id'];
                $title      = $row['title'];
                $content    = $row['content'];
                $webcontent = $row['webcontent'];

                $sql = "update info set views=views+1 where id=" . $id;
                $db->query($sql);
            }
        ?>
            <div class="article">
                <div class="mc">
                    <?
                        if($webcontent!=""){
                    ?>
                    <?= $webcontent;?>
                    <?
                        }else{
                    ?>
                    <?= $content;?>
                    <?
                        }
                    ?>
                </div>
                <?
                	if($class_id=='107101'){
                ?>
                <iframe src="map.html" width="100%" height="300" frameborder="0"></iframe>
                <?
                	}
                ?>
            </div>
        <?
        }
        elseif ($info_state == 'list')
        {   // 新闻列表
        ?>
            <div class="hot clearfix">
                <?
                    $sql = "select id, title, pic, content from info where class_id like '105___' and state>0 and pic<>'' order by state desc, sortnum desc";
                    $rst = $db->query($sql);
                    if ( $row = $db->fetch_array($rst) ) {
                ?>
                <div class="p">
                    <a href="display.php?id=<?=$row["id"]?>"><img src="<?=UPLOAD_PATH . $row["pic"]?>" alt="<?=$row["title"]?>" /></a>
                </div>
                <div class="t">
                    <h3><a href="display.php?id=<?=$row["id"]?>"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["title"])),20)?></a></h3>
                    <div class="i"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["content"])),28)?><a href="display.php?id=<?=$row["id"]?>">[详情]</a></div>
                </div>
                <?
                    }
                ?>
            </div>
            <ul class="news">
                <?
                $sql = "select count(*) as cnt from info where class_id like '" . $default_class_id . "%' and state>0";
                $rst = $db->query($sql);
                if ($row = $db->fetch_array($rst)) {
                    $recordCount = $row["cnt"];
                } else {
                    $recordCount = 0;
                }

                $page       = (int)$_GET["page"];
                $page       = $page > 0 ? $page : 1;
                $pageSize   = 10;
                $pageCount  = ceil($recordCount / $pageSize);
                if ($page > $pageCount) $page = $pageCount;

                $sql = "select id, title, pic, create_time, content from info where class_id like '" . $default_class_id . "%'  and state>0 order by state desc, sortnum desc";
                $sql .= " limit " . ($page - 1) * $pageSize . ", " . $pageSize;
                $rst = $db->query($sql);
                while ($row = $db->fetch_array($rst)) {
                    $publishdate = explode(' ', $row['create_time']);
                ?>
                    <li><a href="display.php?id=<?=$row['id']?>"><em></em><?=utf8substr(strip_tags(str_replace("&nbsp;","",$row["title"])),20)?></a></li>
                <?
                }
                ?>
            </ul>
            <p class="page"><?=page2($page, $pageCount, "info.php?class_id=$class_id&")?></p>
        <?
        }
        elseif ($info_state == 'pic')
        {   // 图片列表
        ?>
        <ul class="m-pList clearfix">
            <?
            $sql = "select count(*) as cnt from info where  class_id like '" . $default_class_id . "%' and state>0";
            $rst = $db->query($sql);
            if ($row = $db->fetch_array($rst)) {
                $recordCount = $row["cnt"];
            } else {
                $recordCount = 0;
            }

            $page       = (int)$_GET["page"];
            $page       = $page > 0 ? $page : 1;
            $pageSize   = 8;
            $pageCount  = ceil($recordCount / $pageSize);
            if ($page > $pageCount) $page = $pageCount;

            $sql = "select id, title, pic, website, content from info where class_id like '" . $default_class_id . "%' and state>0 order by sortnum desc";
            $sql .= " limit " . ($page - 1) * $pageSize . ", " . $pageSize;
            $rst = $db->query($sql);
            $i = 0;
            while ($row = $db->fetch_array($rst)) {
                if(!empty($row['website']))
                {
                    $website = $row['website'];
                }
                else
                {
                    $website = 'display.php?id=' . $row['id'];
                }
            ?>
                <li>
                    <p class="p"><a href="display.php?id=<?=$row['id']?>"><img src="<?=UPLOAD_PATH . $row['pic']?>" alt="<?=$row['title']?>" /></a></p>
                    <p class="t"><a href="display.php?id=<?=$row['id']?>"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["title"])),14)?></a></p>
                </li>
             <?
                $i += 1;
                if ($i % 2 == 0) echo '<li class="clear"></li>';
            }
            ?>
         </ul>
        <p class="page"><?=page2($page, $pageCount, "info.php?class_id=$class_id&")?></p>
        <?
        } elseif ($info_state == 'pictxt') {  // 图文列表
        ?>
            <div class="p-list">
                <ul>
                    <?
                    $sql = "select count(*) as cnt from info where class_id like '" . $default_class_id . "%'  and state>0";
                    $rst = $db->query($sql);
                    if ($row = $db->fetch_array($rst)) {
                        $recordCount = $row["cnt"];
                    } else {
                        $recordCount = 0;
                    }

                    $page       = (int)$_GET["page"];
                    $page       = $page > 0 ? $page : 1;
                    $pageSize   = 8;
                    $pageCount  = ceil($recordCount / $pageSize);
                    if ($page > $pageCount) $page = $pageCount;

                    $sql = "select id, title, pic, website, content, create_time from info where  class_id like '" . $default_class_id . "%'  and state>0 order by sortnum desc";
                    $sql .= " limit " . ($page - 1) * $pageSize . ", " . $pageSize;
                    $rst = $db->query($sql);
                    while ($row = $db->fetch_array($rst)) {
                        $publishdate = explode(' ', $row['create_time']);
                        if(!empty($row['website']))
                        {
                            $website = $row['website'];
                        }
                        else
                        {
                            $website = 'display.php?id=' . $row['id'];
                        }
                    ?>
                        <li class="clearfix">
                            <div class="p"><a href="display.php?id=<?=$row['id']?>"><img src="<?=UPLOAD_PATH . $row['pic']?>" alt="<?=$row['title']?>" /></a></div>
                            <div class="t">
                                <h2><a href="display.php?id=<?=$row['id']?>"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["title"])),20)?></a></h2>
                                <div class="i"><?=utf8substr(strip_tags(str_replace("&emsp;","",$row["content"])),28)?></div>
                            </div>
                        </li>
                    <?
                        }
                    ?>
                </ul>
            </div>
            <p class="page"><?=page2($page, $pageCount, "info.php?class_id=$class_id&")?></p>
        <?
        }
        ?>
    </div>
	<?
    require_once("end.php");
    ?>
</div>
</body>
</html>