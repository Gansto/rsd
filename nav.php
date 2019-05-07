<aside class="m-nav">
	<h2>菜单</h2>
	<ul>
		<li<? if($menu == "default") echo " class='current'"?>><a href="./">网站首页</a></li>
		<?
		    $sql = "select id, name from info_class where id like '10_' order by sortnum asc";
		    $rst = $db->query($sql);
		    while ( $row = $db->fetch_array($rst) ) {
	    ?>
		<li<? if($base_id == $row["id"]) echo " class='current'"?>><a href="info.php?class_id=<?=$row["id"]?>"><?=$row["name"]?></a></li>
		<?
			}
		?>
	</ul>
</aside>