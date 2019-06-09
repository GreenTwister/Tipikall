jQuery(function($){
		//keep price value
		results=[];
		totalPrice=0;

		//activate modal
		$("#modalDevis").modal();

		//modal on every page

		
		//quotation menu
		$(".line").on("click", function(){
			var returnId=$(this).attr('id');
			var lineValue=parseInt(returnId.charAt(4));
			var nextValue=lineValue+1;

			if($(".line"+lineValue).is(":checked")){
				$("#line"+nextValue).css({
					"display":"block",
					"-webkit-transition-timing-function": "cubic-bezier(0.175, 0.885, 0.84, 1.275)",
					"transition-timing-function": "cubic-bezier(0.175, 0.885, 0.84, 1.275)",
					"width":"100%"
				});

				if(lineValue==6){
					$("#quoteSend").css({
						"display":"block"
					});
				};
				if(lineValue>1){
					linePrice=parseInt($(".line"+lineValue+":checked").attr('id'));
					lineName=$(".line"+lineValue+":checked").attr('name');
					results[lineName]=linePrice;
					addPrices(results);
					
					$('#amountNumber').text("A partir de: "+totalPrice+" euros");
				}

				function addPrices(priceObject){
					totalPrice=0;
					for (let key in priceObject){
						totalPrice+=priceObject[key];
					}
				}
				$('#questionNumber').text("Question "+lineValue+"/6");
				$('#modalDevis').animate({ scrollTop: 9999 }, 'slow');
			}
		});


	});