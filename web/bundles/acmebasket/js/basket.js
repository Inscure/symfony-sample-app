$(function() {
	$('.add-to-basket').on('click', function() {
		var productId = $(this).data('id');
		
		console.log('click add');
		
		var ajax = $.ajax({
			'url': addr + 'basket/add/' + productId,
			'type': 'get',
			'dataType': 'json',
		});
		
		ajax.done(function(oJson) {
			alert(oJson.message);
		});
	});
	
	$('.remove-from-basket').on('click', function() {
		
		var $this = $(this);
		
		var productId = $this.data('id');
		
		console.log('click remove');
		
		var ajax = $.ajax({
			'url': addr + 'basket/delete',
			'type': 'post',
			'dataType': 'json',
			'data': {id: productId}
		});
		
		ajax.done(function(oJson) {
			alert(oJson.message);
			if (oJson.status == 'success') {
			
				$('#basket-brutto').text(oJson.costs.brutto);
				$('#basket-netto').text(oJson.costs.netto);
				$('#basket-vat').text(oJson.costs.vat);
				
				$this.parent().fadeIn(400, function() {
					$(this).remove();
					
					$('#basket-products-count').text(parseInt($('#basket-products-count').text())-1);
					
					if ($('.basket-product-block').length === 0) {
						$('#basket-status').show();
						$('#basket-products-count').parent().remove();
						$('#basket-costs, #basket-submit').remove();
					}
				});
			}
		});
	});
});