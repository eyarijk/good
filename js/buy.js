/*Покупка оголошень */
$('.buy').click(function() { 
	swal({
	    title: 'Купити оголошення',
	    input: 'text',
	    type: 'info',
	    showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
	    confirmButtonText: 'Купити',
	    showLoaderOnConfirm: true,
	    preConfirm: function (email) {
	        return new Promise(function (resolve, reject) {
	          	setTimeout(function() {
	            resolve()  
	        	}, 600)
	    	})
		},
    	allowOutsideClick: true
  	}).then(function (email) {
	  	if(isNaN(email*2)){
	  		swal({
	      		title: 'Помилка!',
	     		text: "Кількість оголошень має бути цілим числом!.",
	      		type: 'error',})
	  	}else{
	    	swal({
	      	title: 'Увага!',
		    text: "Ви збираєтесь купити "+email+" шт. на суму "+email*2+" грн.",
		    type: 'warning',
		    showCancelButton: true,
		    confirmButtonColor: '#3085d6',
		    cancelButtonColor: '#d33',
		    confirmButtonText: 'Так,купити'
		    }).then(function () {
		        $(document).ready(function() {
		      		$.ajax({
		        		type: "post",
		     			url: 'profedit',
		      			data:{nums: email},
		      			success: function(result) {
		        			json = jQuery.parseJSON(result);
		        			if (json.go) {
		          				go(json.go);
		        			} else {
		          				swal(json.title, json.text, json.status);
		        			}
		      			},
		    		});
		    	});
		  	}) 
	  	} 
	})
});
/*Вихід */
$('.out').click(function() { 
	swal({
		title: 'Бажаєте вийти?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Вийти'
	}).then(function () {
		go("logout");
	})
});


/*Поповнення */

$('.get').click(function() { 
		var id = document.getElementById("id_user").value;
	swal({
	    title: 'Поповнити баланс',
	    input: 'text',
	    type: 'info',
	    showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
	    confirmButtonText: 'Поповнити',
	    showLoaderOnConfirm: true,
	    preConfirm: function (email) {
	        return new Promise(function (resolve, reject) {
	          	setTimeout(function() {
	            resolve()  
	        	}, 600)
	    	})
		},
    	allowOutsideClick: true
  	}).then(function (email) {
	  	if(isNaN(email*2)){
	  		swal({
	      		title: 'Помилка!',
	     		text: "Кількість має бути цілим числом!.",
	      		type: 'error',})
	  	}else{
	    	swal({
	      	title: 'Увага!',
		    text: "Ви збираєтесь поповнити баланс на суму "+email+" грн.",
		    type: 'warning',
		    showCancelButton: true,
		    confirmButtonColor: '#3085d6',
		    cancelButtonColor: '#d33',
		    confirmButtonText: 'Так,поповнити'
		    }).then(function () {
		        swal({
			      	title: 'Увага!',
 					html: '<form method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp" accept-charset="windows-1251">  <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="'+email+'"><input type="hidden" name="LMI_PAYMENT_DESC" value="id:'+id+'=>'+email+' грн."><input type="hidden" name="LMI_PAYMENT_NO" value="id:'+id+'=>'+email+' грн."><input type="hidden" name="LMI_PAYEE_PURSE" value="R227237939552"><center style=" padding-top: 40px;"> <button style="width: 300px; height: 35px; background:#3085d6;border:0 solid red; color:#fff;border-radius:3px;cursor:pointer; ">Оплатить через Webmoney</button></center></div></form>',
				    type: 'warning',
				    showConfirmButton: false,
				    showCancelButton: true,
				    cancelButtonColor: '#d33',
				    }).then(function () {
				        
				  	}) 
		  	}) 
	  	} 
	})
});

