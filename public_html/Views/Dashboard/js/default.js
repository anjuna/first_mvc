$(function(){


	$.get('xhrGetListing',

		function(returned){

			for(i=0; i < returned.length; i++){

				$("#listings").append('<div>'+ returned[i].yourtext +' <a class="del" rel="'+ returned[i].id +'" href="#" >X</a> </div>');
			}

			$(document).on('click', '.del', function(){


				delItem = $(this);
				var id = $(this).attr('rel');
				  	
				$.post('xhrDelete',{'id':id}, function(d){


					delItem.parent().remove();


				});  	
				return false;
			})
		

		},

		'json');




	$('#randomform').on('submit',function(){

		var url  = $(this).attr('action');
		var data = $(this).serialize();

		$.post(url,data,function(o){

			$("#listings").append('<div>'+ o.text +'<a class="del" rel="' + o.id + '" href="#" >X</a> </div>');
		},
		'json')



		return false; 

	})

	$("#test1").on('click',function(){alert(1);})




})