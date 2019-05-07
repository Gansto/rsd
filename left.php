<div class="i-menu">
    <dl class="clearfix">
        <?
        $second_id=substr($class_id,0,6);
        $tid=substr($class_id,0,3);
        if ($menu == "contact"){
            $sql = "select id, name from dept order by sortnum asc";
            $rst = $db->query($sql);
            while ($row = $db->fetch_array($rst)){
        ?>
        <dt><a href="<?=$menu?>.php?dept_id=<?=$row["id"]?>"<?if ($dept_id == $row["id"]) echo " class='current'"?>><?=$row["name"]?></a></dt>
        <?
            }
        }elseif ($menu == "search"){
        ?>
        <dt><a href="<?=$menu?>.php" class="current"><?=$base_name?></a></dt>
        <?
        }else{
        ?>
        <?
            $db2    = new onlyDB($config["db_host"], $config["db_user"], $config["db_pass"], $config["db_name"]);
            $sql = "select * from info_class where id like '" . $base_id . "___'  order by sortnum asc";
            $rst = $db->query($sql);
            while ($row = $db->fetch_array($rst)){
        ?>
            <dt><a href="info.php?class_id=<?=$row["id"]?>"<? if($row["id"]==$second_id) echo " class='current'"?>><?=$row["name"]?></a></dt>
        <?
            }
        }
        ?>
    </dl>
</div>