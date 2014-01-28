<?php 

// jCart v1.3
// http://conceptlogic.com/jcart/
error_reporting(0);
// This file demonstrates a basic store setup

// If your page calls session_start() be sure to include jcart.php first
include_once('jcart/jcart.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<title>jCart - Free Ajax/PHP shopping cart</title>

		<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo base_url() ?>cart/style.css" />

		<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo base_url() ?>cart/jcart/css/jcart.css" />
               <script type="text/javascript" src="<?php echo base_url() ?>cart/jcart/js/jquery-1.4.4.min.js"></script>
                <script type="text/javascript">
                
// jCart v1.3
// http://conceptlogic.com/jcart/

$(document).ready( function () {

	var JCART = (function() {

		var path = 'http://localhost/AncienArgo/cart/jcart',
			container = $('#jcart'),
			token = $('[name=jcartToken]').val(),
			tip = $('#jcart-tooltip');

		var config = (function() {
			var config = null;
			$.ajax({
				url: "<?php echo base_url() ?>index.php/ancientagro/my_ajax",
				data: {
					"ajax": "true"
				},
				dataType: 'json',
				async: false,
				success: function(response) {
					config = response;
				},
				error: function() {
					alert('Ajax error: Edit the path in jcart.js to fix.');
				}
			});
			return config;
		}());

		var setup = (function() {
			if(config.tooltip === true) {
				tip.text(config.text.itemAdded);
	
				// Tooltip is added to the DOM on mouseenter, but displayed only after a successful Ajax request
				$('.jcart [type=submit]').mouseenter(
					function(e) {
						var x = e.pageY + 25,
							y = e.pageX + -10;
						$('body').append(tip);
						tip.css({top: y + 'px', left: x + 'px'});
					}
				)
				.mousemove(
					function(e) {
						var y = e.pageY + 25,
						x = e.pageX + -10;
						tip.css({top: y + 'px', left: x + 'px'});
					}
				)
				.mouseleave(
					function() {
						tip.hide();
					}
				);
			}

			// Remove the update and empty buttons since they're only used when javascript is disabled
			$('#jcart-buttons').remove();

			// Default settings for Ajax requests
			$.ajaxSetup({
				type: 'POST',
				url: path + '/relay.php',
				success: function(response) {
					// Refresh the cart display after a successful Ajax request
					container.html(response);
					$('#jcart-buttons').remove();
				},
				// See: http://www.maheshchari.com/jquery-ajax-error-handling/
				error: function(x, e) {
					var s = x.status, 
						m = 'Ajax error: ' ; 
					if (s === 0) {
						m += 'Check your network connection.';
					}
					if (s === 404 || s === 500) {
						m += s;
					}
					if (e === 'parsererror' || e === 'timeout') {
						m += e;
					}
					alert(m);
				}
			});
		}());

		// Check hidden input value
		// Sent via Ajax request to jcart.php which decides whether to display the cart checkout button or the PayPal checkout button based on its value
		// We normally check against request uri but Ajax update sets value to relay.php

		// If this is not the checkout the hidden input doesn't exist and no value is set
		var isCheckout = $('#jcart-is-checkout').val();

		function add(form) {
			// Input values for use in Ajax post
			var itemQty = form.find('[name=' + config.item.qty + ']'),
				itemAdd = form.find('[name=' + config.item.add + ']');

			// Add the item and refresh cart display
			$.ajax({
				data: form.serialize() + '&' + config.item.add + '=' + itemAdd.val(),
				success: function(response) {

					// Momentarily display tooltip over the add-to-cart button
					if (itemQty.val() > 0 && tip.css('display') === 'none') {
						tip.fadeIn('100').delay('400').fadeOut('100');
					}

					container.html(response);
					$('#jcart-buttons').remove();
				}
			});
		}

		function update(input) {
			// The id of the item to update
			var updateId = input.parent().find('[name="jcartItemId[]"]').val();

			// The new quantity
			var newQty = input.val();

			// As long as the visitor has entered a quantity
			if (newQty) {

				// Update the cart one second after keyup
				var updateTimer = window.setTimeout(function() {

					// Update the item and refresh cart display
					$.ajax({
						data: {
							"jcartUpdate": 1, // Only the name in this pair is used in jcart.php, but IE chokes on empty values
							"itemId": updateId,
							"itemQty": newQty,
							"jcartIsCheckout": isCheckout,
							"jcartToken": token
						}
					});
				}, 1000);
			}

			// If the visitor presses another key before the timer has expired, clear the timer and start over
			// If the timer expires before the visitor presses another key, update the item
			input.keydown(function(e){
				if (e.which !== 9) {
					window.clearTimeout(updateTimer);
				}	
			});
		}

		function remove(link) {
			// Get the query string of the link that was clicked
			var queryString = link.attr('href');
			queryString = queryString.split('=');

			// The id of the item to remove
			var removeId = queryString[1];

			// Remove the item and refresh cart display
			$.ajax({
				type: 'GET',
				data: {
					"jcartRemove": removeId,
					"jcartIsCheckout": isCheckout
				}
			});
		}

		// Add an item to the cart
		$('.jcart').submit(function(e) {
			add($(this));
			e.preventDefault();
		});

		// Prevent enter key from submitting the cart
		container.keydown(function(e) {
			if(e.which === 13) {
				e.preventDefault();
			}
		});

		// Update an item in the cart
		container.delegate('[name="jcartItemQty[]"]', 'keyup', function(){
			update($(this));
		});

		// Remove an item from the cart
		container.delegate('.jcart-remove', 'click', function(e){
			remove($(this));
			e.preventDefault();
		});

	}()); // End JCART namespace

}); // End the document ready function
                </script>
	</head>
	<body>
		<div id="wrapper">
			<h2>Demo Store</h2>

			<div id="sidebar">
				<div id="jcart"><?php $jcart->display_cart();?></div>
			</div>

			<div id="content">

				<form method="post" action="" class="jcart" >
					<fieldset>
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
						<input type="hidden" name="my-item-id" value="ABC-123" />
						<input type="hidden" name="my-item-name" value="Soccer Ball" />
						<input type="hidden" name="my-item-price" value="25.00" />
						<input type="hidden" name="my-item-url" value="" />

						<ul>
							<li><strong>Soccer Ball</strong></li>
							<li>Price: $25.00</li>
							<li>
								<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
							</li>
						</ul>

						<input type="submit" name="my-add-button" value="add to cart" class="button" />
					</fieldset>
				</form>

				<form method="post" action="" class="jcart">
					<fieldset>
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
						<input type="hidden" name="my-item-id" value="2" />
						<input type="hidden" name="my-item-name" value="Baseball Mitt" />
						<input type="hidden" name="my-item-price" value="19.50" />
						<input type="hidden" name="my-item-url" value="http://yahoo.com" />

						<ul>
							<li><strong>Baseball Mitt</strong></li>
							<li>Price: $19.50</li>
							<li>
								<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
							</li>
						</ul>

						<input type="submit" name="my-add-button" value="add to cart" class="button" />
					</fieldset>
				</form>

				<form method="post" action="" class="jcart">
					<fieldset>
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
						<input type="hidden" name="my-item-id" value="3" />
						<input type="hidden" name="my-item-name" value="Hockey Stick" />
						<input type="hidden" name="my-item-price" value="33.25" />
						<input type="hidden" name="my-item-url" value="http://bing.com" />

						<ul>
							<li><strong>Hockey Stick</strong></li>
							<li>Price: $33.25</li>
							<li>
								<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
							</li>
						</ul>

						<input type="submit" name="my-add-button" value="add to cart" class="button tip" />
					</fieldset>
				</form>

				<div class="clear"></div>

				<p><small>Having trouble? <a href="jcart/server-test.php">Test your server settings.</a></small></p>

				<?php
					//echo '<pre>';
					//var_dump($_SESSION['jcart']);
					//echo '</pre>';
				?>
			</div>

			<div class="clear"></div>
		</div>

		
		
		
	</body>
</html>