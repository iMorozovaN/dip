<div class="pageWithForm">
<h1>Вопрос к администрации</h1>
<p>Здесь вы можете задать вопрос администрации школы. Он будет опубликован после рассмотрения.</p><br>

    <div id="container">
      
      <div id="mainContent">

       <?=(!empty($message))? '<div class="errors">'.$message.'</div>': ''?>
       <form action="" method="post" class="form">
        <div <?=(!empty($errors['user_name']))? 'class="error_field"': '';?>>
        	<label>Ваше имя:</label>
        	<input type="text" class = "text" name="user_name" value="<?=$validator->postdata('user_name');?>" />
        </div> 
        
        <div <?=(!empty($errors['user_email']))? 'class="error_field"': '';?>>
        	<label>Ваш e-mail адрес:</label>
        	<input type="text" class = "text" name="user_email" value="<?=$validator->postdata('user_email');?>" />
        </div> 
        
        <!--<div //(!empty($errors['user_url']))? 'class="error_field"': '';?>>
        	<label>URL адрес сайта:</label>
        	<input type="text" class = "text" name="user_url" value="//$validator->postdata('user_url');?>" />
        </div> -->
        
        <div <?=(!empty($errors['subject']))? 'class="error_field"': '';?>>
        	<label>Тема письма:</label>
        	<input type="text" class = "text" name="subject" value="<?=$validator->postdata('subject');?>"/>
        </div> 
        
        <div class="area<?=(!empty($errors['text']))? ' error_field': '';?>">
        	<label>Текст сообщения:</label>
        	<textarea cols="40" class = "textarea" rows="5" name="text"><?=$validator->postdata('text');?></textarea>
        </div> 
        
        <div <?=(!empty($errors['keystring']))? 'class="error_field"': '';?>>
        	<label class="captcha">Введите цифры, изображенные на картинке:</label>
        	<div class="capth_images"> <?php require 'captcha.php';?>
            </div>
        	<input type="text" class = "kaptch" name="keystring" value=""/>   
        </div> 

        <div>
        	<label>&nbsp;</label>
        	<input type="submit" class="btn" value="Отправить сообщение" />
        </div>

    	
     </form> 
     
     </div>

    </div>
<br>

<?php  if (!isset($data)) : ?>

    <p>Пока нет ни одного вопроса.</p>

<?php endif;?>

<?php  if (isset($data)) : 
        foreach ($data as $item ) :
         if ($item["visible"]==1):
?>

    <div class="qestion-answer">
        
        <p><b>Спрашивает </b><?=$item["author"]?>:</p>
        <p><?= $item["question"]?></p>
        <p class="answeradmin"><b>Ответ администрации: </b><?= $item["answer"]?></p>
    </div>
    <?php endif;?>
  <?php endforeach;?>
<?php endif;?>

</div>