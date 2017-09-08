<?php
/*
Plugin Name: INVEITIX chatbot
Description: Chatbot
Version:     0.2
Author:      Miroslav Mihaylov
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
wp_register_style ( 'chatbot_style', plugins_url ( 'css/style.css', __FILE__ ) );
wp_enqueue_style('chatbot_style');
wp_register_style ( 'bootstrap', plugins_url ( 'css/bootstrap.css', __FILE__ ) );
wp_enqueue_style('bootstrap');

add_action('wp_footer', 'chatbot');
add_action( 'admin_menu', 'chatbot_add_admin_menu' );
add_action( 'admin_init', 'chatbot_settings_init' );


function chatbot_add_admin_menu(  ) { 

	add_menu_page( 'Chatbot', 'Chatbot', 'manage_options', 'chatbot', 'chatbot_options_page' );

}


function chatbot_settings_init(  ) { 

	register_setting( 'pluginPage', 'chatbot_settings' );

	add_settings_section(
		'chatbot_pluginPage_section', 
		__( 'Chatbot settings', 'wordpress' ), 
		'chatbot_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'chatbot_text_field_0', 
		__( '<a target="_blank" href="https://api.ai/docs/integrations/web-demo"><u>Set chatbot address:</u></a>', 'wordpress' ), 
		'chatbot_text_field_0_render', 
		'pluginPage', 
		'chatbot_pluginPage_section' 
	);

	add_settings_field( 
		'chatbot_radio_field_0', 
		__( 'Chatbot icon:', 'wordpress' ), 
		'chatbot_radio_field_0_render', 
		'pluginPage', 
		'chatbot_pluginPage_section' 
	);

}

function chatbot_text_field_0_render(  ) { 

	$options = get_option( 'chatbot_settings' );
	?>
	<input class="form-control form-control-lg" type='text' name='chatbot_settings[chatbot_text_field_0]' value='<?php echo $options['chatbot_text_field_0']; ?>'>
	<?php

}

function chatbot_radio_field_0_render(  ) { 

	$options = get_option( 'chatbot_settings' );
	?>
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-5">
				<p><label for="radio-1"><img src="<?php echo plugins_url( "img/chatbot1.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-1"<?php checked( $options['chatbot_radio_field_0'], 1 ); ?> value='1'></p>
			</div>
			<div class="col-md-5">
				<p><label for="radio-2"><img src="<?php echo plugins_url( "img/chatbot2.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-2"<?php checked( $options['chatbot_radio_field_0'], 2 ); ?> value='2'></p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-5">
				<p><label for="radio-3"><img src="<?php echo plugins_url( "img/chatbot3.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-3"<?php checked( $options['chatbot_radio_field_0'], 3 ); ?> value='3'></p>
			</div>
				
			<div class="col-md-5">
				<p><label for="radio-5"><img src="<?php echo plugins_url( "img/chatbot5.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-5"<?php checked( $options['chatbot_radio_field_0'], 5 ); ?> value='5'></p>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-5">
				<p><label for="radio-6"><img src="<?php echo plugins_url( "img/chatbot6.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-6"<?php checked( $options['chatbot_radio_field_0'], 6 ); ?> value='6'></p>
			</div>
			
			<div class="col-md-5">	
				<p><label for="radio-7"><img src="<?php echo plugins_url( "img/chatbot7.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-7"<?php checked( $options['chatbot_radio_field_0'], 7 ); ?> value='7'></p>
			</div>
		</div>	

		<div class="row">
			<div class="col-md-5">
				<p><label for="radio-8"><img src="<?php echo plugins_url( "img/chatbot8.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-8"<?php checked( $options['chatbot_radio_field_0'], 8 ); ?> value='8'></p>
			</div>

			<div class="col-md-5">
				<p><label for="radio-9"><img src="<?php echo plugins_url( "img/chatbot9.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-9"<?php checked( $options['chatbot_radio_field_0'], 9 ); ?> value='9'></p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-5">
				<p><label for="radio-10"><img src="<?php echo plugins_url( "img/chatbot10.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-10"<?php checked( $options['chatbot_radio_field_0'], 10 ); ?> value='10'></p>
			</div>

			<div class="col-md-5">
				<p><label for="radio-4"><img src="<?php echo plugins_url( "img/chatbot4.png", __FILE__ )?> " ></label>
				<input type='radio' name='chatbot_settings[chatbot_radio_field_0]' id="radio-4"<?php checked( $options['chatbot_radio_field_0'], 4 ); ?> value='4'></p>
			</div>
		</div>	
			</div>
	<?php

}


function chatbot_settings_section_callback(  ) { 

	// echo __( 'This section description', 'wordpress' );

}


function chatbot_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		
		?>
	<button type="submit" class="btn btn-info btn-lg">Save changes</button>
	</form>
	<?php
}


function chatbot(){
	$options = get_option( 'chatbot_settings' );
	?>

	<div class="site-footer"><img id="btn-chatbot" class="img img-responsive" src="<?php echo plugins_url( "img/", __FILE__ )?>chatbot<?php echo $options['chatbot_radio_field_0'] ?>.png" style="width: 80px; position: fixed; bottom: 20px; right: 20px;">
	<div id="chatbot" style="display: none; position: fixed; bottom: 60px; right: 100px;">
	   <?php 
	   		if($options['chatbot_text_field_0'] == ''){
	   			echo '<h1>Set chatbot url</h1>';
	   		}else{
	   		?>

	   <iframe id="chatbot-iframe" src="<?php echo $options['chatbot_text_field_0'] ?>"></iframe>
	   <?php } ?>
	</div></div>

	<script type="text/javascript">
		jQuery(document).ready(function(){
		    jQuery("#btn-chatbot").click(function(){
		        jQuery("#chatbot").toggle();
		    });
		});
	</script>

<?php
}







