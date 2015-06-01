$(document).ready(function() {

$(function() {
 
$(window).scroll(function() {
 
if($(this).scrollTop() > 400) {
 
$('#toTop').fadeIn();
 
} else {
 
$('#toTop').fadeOut();
 
}
 
});
 
$('#toTop').click(function() {
 
$('body,html').animate({scrollTop:0},400);
 
});
 
});
/*
   $('.nav li a').on('click', function(){

        var parent = $(this).parents('li');

     
            $(parent).addClass('active');
        
    });*/

	$("form").submit(function() {// обрабатываем отправку формы    
		var noError = true; // индекс ошибки
		
		$("form input[type=text]").each(function() {// проверяем каждое поле в форме	
			if(!$(this).val()){// если в поле пустое
				$(this).css('border', 'red 1px solid');// устанавливаем рамку красного цвета
				noError=false;
				return;	//noError=false;// определяем индекс ошибки  				
			}
		});
		
		if(!noError) alert('Не все поля заполнены!');
		
		//-----перекрасить рамки в серый при заполнении-----------
		$(this).on('keyup', 'input[type=text],textarea', function() {
			$(this).css('border', 'grey 1px solid');		
		});
		//---------------------------------------------------------
		return noError; //$(this).submit(); //console.log('/',noError);		
	});
	
	//-------заблокировать ссыль, если данные формы изменялись-----
	var changed=false;
	$("form input[type=text],textarea,select").change(function() {
		changed=true;
	});

			

	$('#header').on('click', '.link', function(event) {

		if ( CKEDITOR.instances.ckeditor.checkDirty() ) 
			changed=true;

	    if (changed)
			var result = confirm('Есть несохраненные данные!Вы уверены, что хотите покинуть страницу?');
	return result;	
	});
	//-----------------------------------------------------------------


    //---------форма редактирования страниц----------------------------
    var $form = $("form[name='addform']");
    $form.find("input[type=text],select").change(function() {
        $form.find('input[name="change"]').val('1');
    });

    $form.submit(function() {

    	//var text = CKEDITOR.instances.ckeditor.document.getBody().getText();
    	//$('#ckeditor').val(text);

		if ( CKEDITOR.instances.ckeditor.checkDirty() ) {
			$form.find('input[name="change"]').val('1');
	}
	});
    //-----------------------------------------------------------------
	
	
    $(".minImg").click(function(){
 
        var largePath = $(this).attr("href");
        var largeAlt = $(this).attr("title");
 
        $("#largeImg").attr({ src: largePath, alt: largeAlt });
 
        return false;
    });
});