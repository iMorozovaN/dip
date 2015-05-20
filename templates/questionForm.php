<?php include(BASEPATH.'/news/templates/header.php');

?>

<form name="addform" action="<?=$action?>" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="6">
        <tr>
            <td><p>Автор вопроса:</p></td>
            <td class="namePage"><input type="text" name="author"  value="<?= htmlspecialchars($quest['author']); ?>"  readonly></td>
        </tr>
        <tr><td></td>    
             <td class="namePage"><input type="text" name="mail"  value="<?= htmlspecialchars($quest['mail']); ?>"  readonly></td>
        </tr>
        <tr>
            <td class=all><p >Содержание:</td>
            <td><textarea name="question" rows=10  wrap="soft"><?= htmlspecialchars($quest['question']); ?></textarea></td>
        </tr>
        <tr>
            <td class=all><p >Ответ:</td>
            <td><textarea name="answer" rows=10  wrap="soft"><?= htmlspecialchars($quest['answer']); ?></textarea></td>
        </tr>
        <tr>
            <td> Опубликовать</td> 
            <td><input type="checkbox" name="visible" <?php if ($quest['visible']==1):?>
           													     checked="checked" 
           											  <?php endif;?>
                                                                   value='on' />
            </td>   
        </tr>
		<tr>
			<td><input class="but" type="submit" value="Сохранить"></td>
		</tr>
		    <input type=hidden name="quest_id" value="<?= $quest['id']; ?>" >
		    <input type=hidden name="change" value="" >
    </table>
    <p><?=$warning?></p>
</form>



<?php include(BASEPATH.'/news/templates/footer.php');?>