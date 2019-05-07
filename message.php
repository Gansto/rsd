<?
require("init.php");

$class_id	= 104104;

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


//提交表单
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name		=	trim($_POST['name']);
	$phone		=	trim($_POST['phone']);
	$content	=	trim($_POST['content']);

	$create_time=	date("Y:m:d H:s");
	$sortnum 	= 	$db->getMax("message", "sortnum") + 10;
	$id			=	$db->getMax("message", "id") + 1;
	
	if (empty($name) || empty($phone)) {
		$db->close();
		echo "<script>alert('请输入必填项！');history.back(-1);</script>";
		exit;
	}

	if(preg_match('/[A-Za-z]+/',$name)){
		$db->close();
		echo "<script>alert('姓名不能含有英文！');history.back(-1);</script>";
		exit;
	}

	if(preg_match('/\d/is',$name)){
		$db->close();
		echo "<script>alert('姓名不能含有数字！');history.back(-1);</script>";
		exit;
	}

	$sql = "insert into message(id, sortnum, name, phone, content, create_time, state) values($id, $sortnum, '$name', '$phone', '$content', '$create_time', 0)";
	if($rst = $db->query($sql))
	{
		$db->close();
		echo "<script>alert('提交成功，我们将第一时间与您取得联系！');self.location=document.referrer;</script>";
		exit;
	}
	else
	{
		$db->close();
		echo "<script>alert('提交失败，请稍后重试！');history.back(-1);</script>";
		exit;
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?=$base_name?> - <?=$config_name?></title>
<meta name="keywords" content="<?=$config_keyword?>" />
<meta name="description" content="<?=$config_description?>" />
<link href="images/base.css" rel="stylesheet" />
<link href="images/inside.css" rel="stylesheet" />
<link href="images/swiper.min.css" rel="stylesheet" />
<script src="js/jquery.min.js"></script>
<script src="js/jquery.SuperSlide.2.1.2.js"></script>
<script src="js/swiper.min.js"></script>
<script type="text/javascript">
	function check(form)
	{
		var phone = document.getElementById('phone').value;
		if (form.name.value == "")
		{
			alert("请输入姓名！");
			form.name.focus();
			return false;
		}
		if(form.phone.value == "")
		{
			alert("请输入您的手机号码!");
			form.phone.focus();
			return false;
		}
		if(!(/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/.test(phone))){
	        alert("请输入正确的手机号码！");
	        form.phone.focus();
	        return false;
	    }
	}
</script>
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
	<div class="bd">
		<div class="form-panel">
			<form method="post" onSubmit="return check(this);">
				<ul>
					<li class="field">
						<div class="input">
							<label for="name">姓名：</label>
							<input name="name" type="text" size="20" maxlength="4" class="text" value="" placeholder="必填" required="required" />
						</div>
					</li>
					<li class="field">
						<div class="input">
							<label for="phone">电话：</label>
							<input id="phone" name="phone" type="text" size="20" maxlength="11" class="text" value="" placeholder="必填" required="required" />
						</div>
					</li>
					<li class="field">
						<div class="input">
							<label for="content">需求：</label>
							<textarea name="content" cols="30" rows="6" class="textarea" maxlength="100"><?=$content?></textarea>
						</div>
					</li>
					<li class="submit-field">
						<div class="input clearfix"><input type="submit" value="提交" class="btn-submit" /></div>
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>

<?
require_once("end.php");
?>
</div>
</body>
</html>