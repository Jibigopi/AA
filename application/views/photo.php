<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
<title>Hover Zoom with image tiles</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="imagetoolbar" content="no">

<meta property="og:type" content="article"/>
<meta property="og:title" content="Hover Zoom with image tiles"/>
<meta property="og:description" content="Javascript hover zoom / mouseover zoom with image tiles."/>
<meta name="description" content="Javascript hover zoom / mouseover zoom with image tiles." />
<meta property="og:image" content="http://www.ajax-zoom.com/pic/layout/image-zoom_20.jpg"/> 

<meta name="viewport" content="width=device-width,  minimum-scale=1, maximum-scale=1, user-scalable=no"><!-- CSS for jcarousel to show the thumbs under the image -->
<link href="<?php echo base_url() ?>website/hover/css/skin.css" type="text/css" rel="stylesheet" />

<!-- jQuery core, needed! -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<!-- jcarousel js for thumbnails -->
<script type="text/javascript" src="<?php echo base_url() ?>website/hover/js/jquery.jcarousel.min.js"></script>


<style type="text/css" media="screen"> 
	html {font-family: Tahoma, Arial; font-size: 10pt;}
	h2 {padding:0px; margin: 15px 0px 15px 0px; font-size: 16pt;}	
	p {text-align: justify;}
	
	/* Thumbnails in jcarousel */
	.outerimg{
		background-position: center center;
		width: 62px;
		height: 62px;
		margin: 1px 0px 0px 1px;
		background-repeat: no-repeat;
	}
	
	.outerContainer{
		display: block;
		float: left;
		cursor: pointer; 
		width: 64px;
		height: 64px; 
		margin: 0px 3px 3px 0px;
		background-color: #E3E3E3;
		outline: none;
	}
	
	/* Overwrite some css from /axZm/axZm.css */
	.zoomHorGalleryDescr{
		display:none;
	}
	
	#zoomContainer{
		background-color: #E3E3E3;
	}
	
	#zoomMapSel{
		border-color: blue;
	}

	#zoomMapSelArea{
		background-color: blue;
	}	
	
	#zoomMapLoading{
		background-color: #FFFFFF;
		background-image: url('../axZm/icons/ajax-loader-map-white.gif');
	}
	
	#zoomMapHolder{
		background-color: #FFFFFF;
		background-image: url('../axZm/icons/ajax-loader-map-white.gif');
	}
	
</style>

</head>
<body>

<!-- Wrapper for media data-->
<DIV style='float: left; width: 250px; min-height: 500px; margin-right: 20px'>

	<!-- Container for preview image (AJAX-ZOOM "image map") -->
	<DIV id='mapContainer' style='position: absolute; width: 250px; height: 375px;'></DIV>

	<!-- Container for zoomed image (will be displayed to the right from preview image) -->
	<DIV id='zoomedAreaDiv' style='display: none; float: left; min-width: 450px; min-height: 450px; position: absolute; z-index: 20;'></DIV>
	
	<!-- Touch devices additional control -->
	<DIV id="touchDevicesZoomButtons" style="clear: both; width: 250px; padding: 0; margin: 0; height: 20px; position: absolute; display: none;">
		<a href='javascript:void(0)' onClick="jQuery.touchDevicesZoomOn()">ENABLE ZOOM</a> | 
		<a href='javascript:void(0)' onClick="jQuery.touchDevicesZoomOff()">DISABLE ZOOM</a>
	</DIV>

	<!-- Navi replacement (plus and minus buttons for zooming) -->
	<DIV id="naviReplacement" style="text-align: left; position: absolute; display: none;">
		<a href="javascript: void(0)" onclick="jQuery.fn.axZm.zoomIn({speed: 750, ajxTo: 1000, pZoom: 25})" style="outline-style: none;"><img src="../axZm/icons/zi_32x32.png" border="0" ></a>
		<a href="javascript: void(0)" onclick="jQuery.fn.axZm.zoomOut({speed: 750, ajxTo: 1000, pZoom: 25})" style="outline-style: none;"><img src="../axZm/icons/zo_32x32.png" border="0"></a>
	</DIV>	
	
	<!-- jcarousel with thumbs (will be filled with thumbs by javascript) -->
	<DIV id="jcarouselContainer" style="clear: both; width: 250px; position: absolute; display: none;">
		<ul id="mycarousel" class="jcarousel-skin-custom"></ul>
	</DIV>
	
</DIV>
 
<script type="text/javascript">
// Horizontal offset
var zoomedAreaOffsetRight = 15;

// Vertical offset
var zoomedAreaOffsetTop = 0;

// ID of zoomed area
var zoomedAreaDiv = 'zoomedAreaDiv';

var ajaxZoom = {};

// Path to the axZm folder (relative or absolute)
ajaxZoom.path = '../axZm/'; 

// Needed parameter query string
// example=22 -> overwrites some default parameter in zoomConfigCustom.inc.php after elseif ($_GET['example'] == 22)
ajaxZoom.parameter = 'example=22&zoomData=/pic/zoom/fashion/fashion_004.jpg\
|/pic/zoom/fashion/fashion_005.jpg\
|/pic/zoom/fashion/fashion_006.jpg\
|/pic/zoom/fashion/fashion_008.jpg\
|/pic/zoom/fashion/fashion_002.jpg\
|/pic/zoom/fashion/fashion_001.jpg\
'; 
// The id of the Div where ajax-zoom has to be inserted into
ajaxZoom.divID = zoomedAreaDiv;

// Additional control functions for touch devices
jQuery.touchDevicesZoomOn = function(){
	jQuery('#mapContainer, #'+zoomedAreaDiv).unbind();
	jQuery('#zoomMapSel').css('display', 'block');
	jQuery('#naviReplacement').stop(true, false).css({display: 'block', 'opacity': 1});
	var relID = 'mapContainer'; //  zoomMapHolder
	var rOffset = jQuery('#'+relID).offset();
	jQuery('#'+zoomedAreaDiv).stop(true, false).css({
		opacity: 1, 
		display: 'block',
		left: Math.round(rOffset.left + jQuery('#'+relID).width() + zoomedAreaOffsetRight),
		top: Math.round(rOffset.top + zoomedAreaOffsetTop)
	});
};

jQuery.touchDevicesZoomOff = function(){
	jQuery('#mapContainer, #'+zoomedAreaDiv).unbind();
	jQuery('#zoomMapSel').css('display', 'none');
	jQuery('#naviReplacement').stop(true, false).css('opacity', 0.0);
	jQuery('#'+zoomedAreaDiv).stop(true, false).css({
		opacity: 0, 
		display: 'none'
	});	
};


// AJAX-ZOOM callbacks
ajaxZoom.opt = {

	// AJAX-ZOOM callback triggered after AJAX-ZOOM is loaded
	onLoad: function(){
		//  zoomMapHolder
		var relID = 'mapContainer'; 
		
		// Icons for zoomIn and zoomOut, not necessary
		jQuery('#naviReplacement').appendTo('#mapContainer').css({
			left: 10,
			top: 10,
			zIndex: 9999,
			opacity: (jQuery.browser.msie ? '' : 0)
		});
		
		// Background for zoom level, not necessary
		jQuery('<div />').attr('id', 'zoomLevelWrap').css({
			position: 'absolute',
			left: 0,
			top: 0,
			backgroundColor: '#000000',
			opacity: 0.3,
			width: 40,
			height: 20,
			zIndex: 9998
		}).appendTo('#zoomLayer');
		
		// Zoom level, not necessary
		jQuery('#zoomLevel').appendTo('#zoomLayer').css({
			position: 'absolute',
			color: '#FFFFFF',
			width: 40,
			padding: 3,
			margin: 0,
			fontSize: '10pt',
			display: 'block',
			left: 0,
			top: 0,
			zIndex: 9999
		});
		
		// Some helper functions
		function getl(sep, str){
			return str.substring(str.lastIndexOf(sep)+1);
		}
		
		function getf(sep, str){
			var extLen = getl(sep, str).length;
			return str.substring(0, (str.length - extLen - 1));
		}
		
		function cfn(file){
			var full = '_'+jQuery.axZm.galFullPicX+'x'+jQuery.axZm.galFullPicY;
			return getf('.', file)+full+'.jpg';
		}
		
		// Detect iphone
		function touchDevicesZoomTest() {
			if(/KHTML|WebKit/i.test(navigator.userAgent) && ('ontouchstart' in window)) {
				return true;
			}else{
				return false;
			}
		}
		
		// Hide zoom selector if mouse is not over
		jQuery('#zoomMapSel').css('display', 'none');

		// Get the position of the preview image (AJAX-ZOOM "image map")
		var rPosition = jQuery('#'+relID).position();

		// Position the jcarousel container below the preview image
		jQuery('#jcarouselContainer').css({
			top: rPosition.top+jQuery('#'+relID).height()+10,
			display: 'block'
		});
		
		// Put thumbnails (generated by AJAX-ZOOM) into jcarousel container
		// jQuery.axZm.zoomGA is a JS object containing information about the images in the gallery
		// All thumbnails are created on the fly while loading first time
		jQuery.each(jQuery.axZm.zoomGA, function(k,v){
				var li = jQuery('<li />');
				var a = jQuery('<a />').addClass('outerContainer').bind('click',function(){jQuery.fn.axZm.zoomSwitch(k); return false;});
				var div = jQuery('<div />').addClass('outerimg').css('backgroundImage', 'url('+jQuery.axZm.zoomGalDir+cfn(v.img)+')');
				jQuery(div).appendTo(a);
				jQuery(li).append(a).appendTo('#mycarousel');
		});
		
		// Init jcarousel
		jQuery('#mycarousel').jcarousel();
		
		// Dedect touch devices and add switch interface for them
		if (touchDevicesZoomTest()){
			// Add switch interface, can and should be styled as you want
			jQuery('#touchDevicesZoomButtons').css({
				display: 'block',
				top: rPosition.top+jQuery('#'+relID).height()+10,
				zIndex: 99999
			});
			// Move the thumbnail container a little below
			jQuery('#jcarouselContainer').css({
				top: parseInt(jQuery('#jcarouselContainer').css('top'))+jQuery('#touchDevicesZoomButtons').height()
			});
		}
		
		
		// Mouseenter on preview image (AJAX-ZOOM "image map") function
		jQuery('#mapContainer').bind('mouseenter', function(){
			if (jQuery.removeHoverTimeout){clearTimeout(jQuery.removeHoverTimeout);}

			// Position AJAX-ZOOM area to the right of zoom map
			var rOffset = jQuery('#'+relID).offset();
			jQuery('#'+zoomedAreaDiv).stop(true, false).css({
				display: 'block',
				opacity: 1,
				left: Math.round(rOffset.left + jQuery('#'+relID).width() + zoomedAreaOffsetRight),
				top: Math.round(rOffset.top + zoomedAreaOffsetTop)
			});
			
			// Show zoom selector
			jQuery('#zoomMapSel').css('display', 'block');
			
			if (!jQuery.browser.msie){
				jQuery('#naviReplacement').stop(true, false).css({
					opacity: 1,
					display: 'block'
				});
			}
		});

		// Mouseleave on preview image (AJAX-ZOOM "image map") and the actual zoom area function
		jQuery('#mapContainer, #'+zoomedAreaDiv).bind('mouseleave', function(){
			jQuery.removeHoverTimeout = setTimeout(function(){
				jQuery('#'+zoomedAreaDiv).stop(true, false).fadeTo(500, 0, function(){
					jQuery(this).css('display', 'none');
					jQuery('#zoomMapSel').css('display', 'none');
				}); 
				if (!jQuery.browser.msie){
					jQuery('#naviReplacement').stop(true, false).fadeTo(500, 0.0);
				}else{
					jQuery('#naviReplacement').stop(true, false).css('display', 'none');
				}
			}, 300);
		});
		
		// Prevent closing zoom area when mouse is over it. 
		jQuery('#'+zoomedAreaDiv).bind('mouseenter', function(){
			if (jQuery.removeHoverTimeout){clearTimeout(jQuery.removeHoverTimeout);}
		});
	},
	
	onFullScreenStart: function(){
		var zoomC = jQuery('#zoomContainer');
		zoomC.data('back', zoomC.css('backgroundColor'));
		zoomC.css('backgroundColor', '#000000');
	},
	
	onFullScreenClose: function(){
		var zoomC = jQuery('#zoomContainer');
		zoomC.css('backgroundColor', zoomC.data('back'));
		jQuery('#mapContainer').trigger('mouseleave');
	},

	onMapMouseOverClick: function(){ // onMapMouseOverDbClick
		jQuery.fn.axZm.initFullScreen();
	}
};


</script>

<!-- AJAX-ZOOM loader file -->
<script type="text/javascript" src="<?php echo base_url() ?>website/hover/js/jquery.axZm.loader.js"></script>









<!-- google analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
var gaJaSource = 'google-analytics.com';
//var gaJaSource = 'ajax-zoom.com/js';
document.write(unescape("%3Cscript src='" + gaJsHost + gaJaSource + "/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-15598343-1");
pageTracker._trackPageview();
} catch(err) {}
</script>
<!-- google analytics end -->






</body>
</html>