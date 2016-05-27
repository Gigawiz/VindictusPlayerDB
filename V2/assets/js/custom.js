$(document).ready(function() {
	var dataTable = $('#scammer-grid').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax":{
			url :"scammer-grid-data.php", // json datasource
			type: "post",  // method  , by default get
			error: function(){  // error handling
				$(".scammer-grid-error").html("");
				$("#scammer-grid").append('<tbody class="scammer-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#scammer-grid_processing").css("display","none");			
			}
		}
	});
});

$(function() {
	$('#submitscammer').on('click', function() {
		var captcha_response  = $("#g-recaptcha-response").val();
		var submission = {
			ign: $('#ingamename').val(),
			alts: $('#alts').val(),
			amtlst: $('#scamamt').val(),
			sslink: $('#screenshots').val(),
			charnm: $('#submittedby').val(),
			skype: $('#skype').val(),
			scmtyp: $('#scamtype').val(),
			server: $('#server').val(),
			notes: $('#notes').val(),
			email: $('#email').val()
		};
		$.ajax({
			type : "POST",
            url : "checkca.php",
			data : "recaptcha_response_field=" + escape(captcha_response),
            dataType : 'json',
            success : function(resps)
            {
				if(resps.msg == "Valid") {
					$.ajax({
                        type : "POST",
                        url : "submit.php",
                        data : submission,
                        dataType : "html",
                        success : function(resps)
                        {
                            $('#reportstatus').text(resps);
							$('#reportscammer')[0].reset();
                        },
						error : function(xhr, ajaxOptions, thrownError) {
							$('#reportstatus').text(xhr.status + "<br>" + thrownError);
						}
                    });
                }
            },
			error : function() {
				$('#reportstatus').text("Invalid Captcha");
				$('#reportstatus').css("color", "red");
				}
            });
		});
	});
$('a.gallery').featherlightGallery({
	openSpeed: 300,
	previousIcon: '&#9664;',     /* Code that is used as previous icon */
	nextIcon: '&#9654;',         /* Code that is used as next icon */
	galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
	galleryFadeOut: 300,          /* fadeOut speed before slide is loaded */
	openSpeed: 300
});