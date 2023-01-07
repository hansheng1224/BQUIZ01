<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <!-- <form method="post" target="back" action="?do=tii"> -->
    <form method="post" target="back" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
             $all=$News->count();
             $div=4;
             $pages=ceil($all/$div);
             $now=$_GET['p']??1;
             $start=($now-1)*$div;
             $rows=$News->all(" limit $start,$div");
            foreach($rows as $row){
                $checked=($row['sh']==1?"checked":"");
        ?>
                <tr>
                    <td width="80%">
                        <input type="text" name="text[]" value="<?=$row['text'];?>" id="" style="width:96%">
                    </td>
                    <td width="10%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" id="" <?=$checked;?>>
                    </td>
                    <td width="10%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>" id="">
                    </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </tr>

                <?php
                }
                ?>

            </tbody>
        </table>

        <div style="text-align:center;">
        <?php
        if(($now-1)>0){
        ?>
        <a class="bl" style="font-size:30px;" href="?do=news&p=<?=$now-1;?>">&lt;&nbsp;</a>
        <?php
        }
        ?>

        <?php
            for($i=1;$i<=$pages;$i++){
                $size=($i==$now)?"26px":"18px";
                ?>
            <a class="bl" style="font-size:<?=$size;?>" href="?do=news&p=<?=$i;?>">&nbsp;<?=$i;?>&nbsp;</a>
        <?php
            }   
        ?>

         <?php
        if(($now+1)<=$pages){
            ?>
        <a class="bl" style="font-size:30px;" href="?do=news&p=<?=$now+1;?>">&gt;&nbsp;</a>
        <?php
        }
        ?>
    </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/news.php')" value="新增最新消息資料"></td>
                    <td class="cent">
                        <input type="hidden" name="table" value="News">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>