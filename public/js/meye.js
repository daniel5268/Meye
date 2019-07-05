$(document).ready(function(){
	var url = window.location.pathname;
	var activePage = url.substring(url.lastIndexOf('/') + 1); 
	$('.meye-nav-link').each(function(){
		var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1);
		if (activePage == linkPage) {
            $(this).closest("li").addClass("active"); 
        }
	});
	$('.btn-increment').click(function (){
		$input = $( this ).closest('.input-group').children('input');
		$prev = parseInt($input.val(), 10);
		
		$input.val($prev+1);
	});

	$('.btn-decrement').click(function (){
		$input = $( this ).closest('.input-group').children('input');
		$prev = parseInt($input.val(), 10);
		
		$input.val($prev-1);
	});

	$('#pj-select').each(function(){
		$selected = $(this).val();
		$('.pj-div').each(function(){
			if (( $(this).attr('id')) == $selected){
				$(this).removeClass('d-none');
			}else{
				$(this).addClass('d-none');
			}
		});
	});	

	$('#pj-select').change(function(){
		$selected = $(this).val();
		$('.pj-div').each(function(){
			if (( $(this).attr('id')) == $selected){
				$(this).removeClass('d-none');
			}else{
				$(this).addClass('d-none');
			}
		});
	});
});