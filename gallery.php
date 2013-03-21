<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vivacity 2010</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/galleria.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="javascript/updates.js"></script>
<script type="text/javascript" src="javascript/effects.js"></script>
<script type="text/javascript" src="javascript/jquery.js"></script> 
<script type="text/javascript" src="javascript/jquery.galleria.js"></script> 
<script type="text/javascript"> 
//jQuery(function($) { $('ul.gallery').galleria(); });
jQuery(function($) {
		
		$('.gallery').addClass('gallery_demo'); // adds new class name to maintain degradability
		
		$('ul.gallery_demo').galleria({
			history   : true, // activates the history object for bookmarking, back-button etc.
			clickNext : true, // helper for making the image clickable
			insert    : '#mainImage', // the containing selector for our main image
			onImage   : function(image,caption,thumb) {
				
				// fade in the image & caption
				if(! ($.browser.mozilla && navigator.appVersion.indexOf("Win")!=-1) ) { // FF/Win fades large images terribly slow
					image.css('display','none').fadeIn(1000);
				}
				caption.css('display','none').fadeIn(1000);
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// fade out inactive thumbnail
				_li.siblings().children('img.selected').fadeTo(500,0.3);
				
				// fade in active thumbnail
				thumb.fadeTo('fast',1).addClass('selected');
				
				// add a title for the clickable image
				image.attr('title','Click to view the Next Image');
			},
			onThumb : function(thumb) { // thumbnail effects goes here
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// if thumbnail is active, fade all the way.
				var _fadeTo = _li.is('.active') ? '1' : '0.3';
				
				// fade in the thumbnail when finnished loading
				thumb.css({display:'none',opacity:_fadeTo}).fadeIn(1500);
				
				// hover effects
				thumb.hover(
					function() { thumb.fadeTo('fast',1); },
					function() { _li.not('.active').children('img').fadeTo('fast',0.3); } // don't fade out if the parent is active
				)
			}
		});
	});
</script>
</head>

<body onload="showSponsors();">
<div id="main">
<?php include('updates.php');
	  include('header.php');
?>

	<div class="container">
    <table cellpadding="0" align="center">
    	<tr valign="middle" align="center">
        	<td><div class="btnPrev"><a href="#" onclick="$.galleria.prev(); return false;"></a></div></td>
			<td><div id="mainImage"></div></td>
            <td><div class="btnNext"><a href="#" onclick="$.galleria.prev(); return false;"></a></div></td>
        </tr>
    </table>

        <div id="thumb">
        <ul class="gallery">
        <?php
			$xml = simplexml_load_file('Scripts/gallery.xml') or die ("Loading of Gallery Failed");
			foreach($xml->IMAGE as $img)
			{
				echo "<li><img src=\"".$img->PATH."\" title=\"".$img->DESC."\" alt=\"".$img->DESC."\" /></li>\n";
			}
		?>
         </ul>
		 </div>
    </div>
</div>
<?php include('footer.html') ?>
</body>
</html>
