$(function() {
	$('.product-remove').on('click', function(e) {
		
		e.preventDefault();
		
		var $this = $(this);
		
		var productId = $this.data('id');
		
		console.log('click remove');
		
		var ajax = $.ajax({
			'url': addr + 'product/delete',
			'type': 'post',
			'dataType': 'json',
			'data': {id: productId}
		});
		
		ajax.done(function(oJson) {
			alert(oJson.message);
			
			$('#products-count').text(parseInt($('#products-count').text())-1);
			
			if (oJson.status == 'success') {
				$this.parents().eq(4).fadeOut();
			}
		});
	});
});