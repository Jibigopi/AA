/**
* Plugin: jQuery AJAX-ZOOM, jquery.axZm.loader.js
* Copyright: Copyright (c) 2010-2013 Vadim Jacobi
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 4.1.3
* Date: 2013-11-10
* URL: http://www.ajax-zoom.com
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/

function ajaxZoomLoad(){
	var waitJquery;
	
	// window.ajaxZoom needs to be defined somewhere to use this loader
	if (typeof ajaxZoom == 'undefined'){
		alert('var ajaxZoom is not defined!');
		return;
	}

	// Prevent doble trigger
	if (ajaxZoom.triggered === true){
		if (typeof console == "object") {
			console.log('jquery.axZm.loader.js included at least twice');
		}
		return;
	}
	
	ajaxZoom.triggered = true;
	
	// Add slash at the end if needed
	if (ajaxZoom.path.slice(-1) != '/'){
		ajaxZoom.path += '/';
	}	
	
	// Inject AJAX-ZOOM stylesheet - axZm.css
	var css = document.createElement('link');
	css.setAttribute('type', 'text/css');
	css.setAttribute('rel', 'stylesheet');
	css.setAttribute('href', ajaxZoom.path+'axZm.css');
	document.getElementsByTagName("head")[0].appendChild(css);

	// Inject a js file
	function loadJS(jsFile){
		var js = document.createElement('script');
		js.setAttribute("type","text/javascript");
		js.setAttribute('src', ajaxZoom.path+jsFile);
		document.getElementsByTagName("head")[0].appendChild(js);			
	}
	
	//  Check, if jquery core is loaded
	if (typeof jQuery == 'undefined'){
		// Load jQuery core
		loadJS('plugins/jquery-1.8.3.min.js');
	}

	function wait(){
		if (waitJquery != 'undefined'){clearTimeout(waitJquery);}
		
		// jQuery core should be loaded
		if (typeof jQuery != 'undefined'){
			var parameter = 'zoomLoadAjax=1&'+ajaxZoom.parameter,
				axZmFileLoadSuccess = function(){
					jQuery.ajax({
						url: ajaxZoom.path + 'zoomLoad.php',
						data: parameter,
						dataType: 'html',
						cache: false,
						success: function (data){
							if (jQuery.isFunction(jQuery.fn.axZm) && data){
								jQuery('#'+ajaxZoom.divID).html(data);
								setTimeout(function(){
									jQuery.fn.axZm(ajaxZoom.opt);
								}, 1);
							}
						},
						error: function(a){
							var status = a.status, 
								statusText = a.statusText, 
								returnStr = 'An error '+status+' ('+statusText+') was returned from the server! ';
								
							if (status == 403 || status == 500){
								returnStr += 'This means that the file /axZm/zoomLoad.php encountered an error while processing. \
								Possible reasons are: \
								<ul>\
								';
								if (parameter.indexOf('./') != -1){
									returnStr += '<li>.htaccess rule does not allow to pass relative paths ('+parameter+') over query string, try with absolute path.</li>';
								}
								returnStr += '<li>Ioncube loader is not installed properly or is not running.</li>';
								returnStr += '<li>You have chmod /axZm directory and/or php files in it to some high value, so they are not executed because of server security settings.</li>';
								if (status == 500){
									returnStr += '<li>You have made an error while editing the PHP files.</li>';
									returnStr += '<li>Your server does not have enough RAM to generate the image tiles.</li>';
								}
								returnStr += '</ul>';
								returnStr += 'Found a different reason? Please report it to AJAX-ZOOM support. If nothing else helps please contact the support as well.';
							} else if (status == 404){
								returnStr += 'Please make sure that ajaxZoom.path ('+ajaxZoom.path+') - the path to "/axZm" directory is set properly! ';
							} else {
								returnStr += 'Please contact AJAX-ZOOM support!';
							}
	
							var errDiv = '<div style="min-width: 300px; padding: 10px; font-size: 14px; background-color: #FFFFFF; color: #000000">'+returnStr+'</div>';
							
							if (jQuery('#axZmTempLoading').length){
								jQuery('#axZmTempLoading').append(errDiv);
							}else{
								jQuery('#'+ajaxZoom.divID).html(errDiv);
							}
						}
					});
				};
			
			if (jQuery.isFunction(jQuery.fn.axZm)){
				axZmFileLoadSuccess();
			}else{
				jQuery.ajax({
					url: ajaxZoom.path + 'jquery.axZm.js',
					dataType: 'script',
					cache: true,
					success: function(){
						axZmFileLoadSuccess();
					},
					error: function(a){
						var status = a.status, 
							statusText = a.statusText, 
							returnStr = 'An error '+status+' ('+statusText+') was returned while attempted to load this file: '+ajaxZoom.path + 'jquery.axZm.js';
							returnStr += '<br>'+'Please make sure that ajaxZoom.path ('+ajaxZoom.path+') points to the existing directory.';
						
						var errDiv = '<div style="min-width: 300px; padding: 10px; font-size: 14px; background-color: #FFFFFF; color: #000000">'+returnStr+'</div>';
						
						if (jQuery('#axZmTempLoading').length){
							jQuery('#axZmTempLoading').append(errDiv);
						}else{
							jQuery('#'+ajaxZoom.divID).html(errDiv);
						}
					}
				});				
			}

		} else{
			waitJquery = setTimeout(function(){
				wait();
			}, 50);					
		}
	}
	wait();
}

function ajaxZoomLoadEvent(obj, evType, fn){ 
	if (obj.addEventListener){ 
		obj.addEventListener(evType, fn, false); 
		return true; 
	} else if (obj.attachEvent){ 
		var r = obj.attachEvent("on"+evType, fn); 
		return r; 
	} else { 
		return false; 
	} 
}

if (typeof ajaxZoom != 'undefined'){
	// Do not do anything, trigger loading AJAX-ZOOM manually
	if (!ajaxZoom.readyToTrigger){
		// Trigger immediately
		if (ajaxZoom.trigger){
			ajaxZoomLoad();
		} else {
			ajaxZoomLoadEvent(window, 'load', ajaxZoomLoad);
		}
	}
} else {
	// Some people inclide this file in head
	ajaxZoomLoadEvent(window, 'load', ajaxZoomLoad);
}