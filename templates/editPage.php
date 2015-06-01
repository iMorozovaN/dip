<?php include(BASEPATH.'/news/templates/header.php');?>

<form name="addform" action="<?=$action?>" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="6">
        <tr><br>
            <td><p>Название:</p></td>
            <td class="namePage"><input type="text" name="title"  value="<?= htmlspecialchars($news['title']); ?>"></td>
        </tr>
        <tr>
            <td class=all><p >Содержание:</td>
            <td><textarea id="ckeditor" name="text" rows=10  wrap="soft"><?= htmlspecialchars($news['text']); ?></textarea></td>
        </tr>

        <tr>
            <td><p>Родительская<br>страница:</p></td>
            <td><select name='parents' size = 1  >
            <?php if($news['static']=='0' || empty($news["id"])) :?>
                <?php  foreach ($parents as $p): ?>
                <?php if ($news['title'] == $p['title'])
                    $flag = true;
                    ?>
                    <?php if ($parent_title == $p['title']):?>
                        <option selected value="<?=$p['id']?>"><?=$p['title']?></option>
                    <?php else:?>
                        <option value="<?=$p['id']?>"><?=$p['title']?></option>
                    <?php endif; ?>
                <?php endforeach;?>
             <?php endif; ?>  
                    <?php if (!$flag) :?>
                    <option value="0">сделать самостоятельной</option>
                    <?php endif; ?>

            </select>
            </td>
        </tr>
        <tr>
            <td><input class="but" type="submit" value="Сохранить"></td>
            <td></td>
        </tr>
        <input type=hidden name="page_id" value="<?= $news['id']; ?>" >
        <input type=hidden name="change" value="" >
    </table>
</form>

<div>
<p class="warning"><?=$warning;?></p>
</div>

<?php include(BASEPATH.'/news/templates/footer.php');?>
