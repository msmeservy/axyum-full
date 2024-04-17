<?php 
/**
* Plugin Name: Axyum Contact Form
* Description: This form submits through an Ajax call
* Author: Mike Meservy
**/


/**
MY LIST OF ITEMS

1. write the forms code as a shortcode
2. write the process page that it submits to
3. write the javascript / ajax that will take the submission
4. write email send function

**/

function axyum_contact_form()
{
	/* string variable to hold content */
	$content * ''; /*creat string*/
	
	//$content .= '<form method="post" action="">';
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0 mt-0">';
	$content .= '<input class="form-control" type="text" name="your_name" id="your_name" />';
	$content .= '<label for="your_name">Name</label>';
	$content .= '</div></div></div>';
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0">';
	$content .= '<label for="your_email">Email:</label>';
	$content .= '<input class="form-control" type="email" name="your_email" id="your_email"  />';
	$content .= '</div></div></div>';
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0">';
	$content .= '<label for="phone_number">Phone:</label>';
	$content .= '<input class="form-control"  type="text" name="phone_number" id="phone_number"  />';
	$content .= '</div></div></div>';
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0">';
	$content .= '<label for="your_comments">Message:</label>';
	$content .= '<textarea type="text"  class="form-control md-textarea" name="your_comments" rows="2" id="your_comments"></textarea>';
	$content .= '</div></div></div>';
	
	
	
		
	//$content .= '</form>';
		
	return $content;
}
add_shortcode('axyum_form', 'axyum_contact_form');


?>