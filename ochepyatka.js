(function ochepyatka(){
	jQuery('<div>', {id: 'ochepyatka'}).prependTo('html');

	function gs() { // get selection
	    var t = "";
	    if (window.getSelection) {
	        t = window.getSelection().toString();
	    } else if (document.selection && document.selection.type != "Control") {
	        t = document.selection.createRange().text;
	    }
	    return t;
	}

	function sm(m){ // show message
		jQuery("#ochepyatka").hide();
		jQuery("#ochepyatka").html(m);
		jQuery("#ochepyatka").show();
		setTimeout(function() {
			jQuery("#ochepyatka").hide();
		}, 3000);
	}

	function se(t){ // send error
		if (t.length < 4) { 
			sm("Вы не выбрали текст"); 
		} else if(t.length > 350) {
			sm("Слишком много текста, выберите меньше");
		} else {
			var err = prompt("В чём ошибка?");
			jQuery.getJSON(och_url, {
				contentType: "text/html; charset=utf-8",
				err: err,
				url: location.href, 
				txt: t 
			}).done(function(data) {
                //console.log(data);
				if (data.result == "ok") {
					sm(data.message);
				} else {
					sm(data.error);
				}
			}).fail(function(){
				sm("Ошибка в настройках");
			});
		}
	}
	jQuery(document).keydown(function(e){
		if (e.keyCode == 13 && e.ctrlKey) { // отправка
			if (jQuery('#ochepyatka').is(':visible')) {
				jQuery("#ochepyatka").hide();
				jQuery("#ochepyatka").html('');
			}			
			se(gs());
		} 
	});
})();