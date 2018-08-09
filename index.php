<?php
/*
Plugin Name: Website Social Links
Plugin URI: https://codelovers786.wordpress.com/
Description: Managed social links from admin and display with a simple shortcode
Author: Saurav Sharma
Version: 1.1
*/
add_action('admin_menu', 'social_links_create_menu');

function social_links_create_menu() {

	//create new top-level menu
	add_menu_page('Social Links', 'Social Links', 'administrator', __FILE__, 'my_social_links_settings_page' ,'
		dashicons-editor-unlink');

	//call register settings function
	add_action( 'admin_init', 'register_social_links_plugin_settings' );
}

function register_social_links_plugin_settings() {
	
	register_setting( 'social-links-settings-group', 'font_option' );
	register_setting( 'social-links-settings-group', 'style1' );
	register_setting( 'social-links-settings-group', 'facebook' );
	register_setting( 'social-links-settings-group', 'twitter' );
	register_setting( 'social-links-settings-group', 'instagram' );
	register_setting( 'social-links-settings-group', 'pinterest' );
	register_setting( 'social-links-settings-group', 'linkedin' );
	register_setting( 'social-links-settings-group', 'youtube' );
	register_setting( 'social-links-settings-group', 'google-plus' );
	register_setting( 'social-links-settings-group', 'snapchat-ghost' );
	register_setting( 'social-links-settings-group', 'tumblr' );
	register_setting( 'social-links-settings-group', 'reddit' );
	register_setting( 'social-links-settings-group', 'rss' );
	register_setting( 'social-links-settings-group', 'yahoo' );
	register_setting( 'social-links-settings-group', 'flickr' );
	register_setting( 'social-links-settings-group', 'dribbble' );
	register_setting( 'social-links-settings-group', 'skype' );
	register_setting( 'social-links-settings-group', 'whatsapp' );
}

function my_social_links_settings_page() {

?>
<style>.widget-liquid-right.custom td img{max-width: 80%;position: relative;top: 7px;}
</style>
	<div class="wrap mainsocial">

		<form method="post" action="options.php">
			<div class="widget-liquid-left">
				<h1>Social Links</h1>
				<?php settings_fields( 'social-links-settings-group' ); ?>
				<?php do_settings_sections( 'social-links-settings-group' ); ?>
				<table class="form-table">
					<tr class="form-field form-required">
						<th scope="row">Facebook</th>
						<td><input type="text" name="facebook" value="<?php echo esc_attr( get_option('facebook') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Twitter</th>
						<td><input type="text" name="twitter" value="<?php echo esc_attr( get_option('twitter') ); ?>" /></td>
					</tr>
					
					<tr class="form-field form-required">
						<th scope="row">Instagram</th>
						<td><input type="text" name="instagram" value="<?php echo esc_attr( get_option('instagram') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Pinterest</th>
						<td><input type="text" name="pinterest" value="<?php echo esc_attr( get_option('pinterest') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Linkedin</th>
						<td><input type="text" name="linkedin" value="<?php echo esc_attr( get_option('linkedin') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Youtube</th>
						<td><input type="text" name="youtube" value="<?php echo esc_attr( get_option('youtube') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Google Plus</th>
						<td><input type="text" name="googleplus" value="<?php echo esc_attr( get_option('google-plus') ); ?>" /></td>
					</tr>
					
					<tr class="form-field form-required">
						<th scope="row">Snapchat</th>
						<td><input type="text" name="snapchat-ghost" value="<?php echo esc_attr( get_option('snapchat-ghost') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Tumbler</th>
						<td><input type="text" name="tumblr" value="<?php echo esc_attr( get_option('tumblr') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Reddit</th>
						<td><input type="text" name="reddit" value="<?php echo esc_attr( get_option('reddit') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Rss</th>
						<td><input type="text" name="rss" value="<?php echo esc_attr( get_option('rss') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">yahoo</th>
						<td><input type="text" name="yahoo" value="<?php echo esc_attr( get_option('yahoo') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Gmail</th>
						<td><input type="text" name="gmail" value="<?php echo esc_attr( get_option('envelope') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Flikr</th>
						<td><input type="text" name="flikr" value="<?php echo esc_attr( get_option('flickr') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Dribble</th>
						<td><input type="text" name="dribbble" value="<?php echo esc_attr( get_option('dribbble') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Skype</th>
						<td><input type="text" name="skype" value="<?php echo esc_attr( get_option('skype') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">WhatsApp</th>
						<td><input type="text" name="whatsapp" placeholder="https://wa.me/+919041564493" value="<?php echo esc_attr( get_option('whatsapp') ); ?>" /></td>
					</tr>
				</table>
				
				<?php submit_button(); ?>


			</div>

			<div class="widget-liquid-right custom">
				<h1>Social Setting</h1>
				<h1>Shortcode: [social_links]</h1>

				<table class="form-table">
					<tr class="form-field form-required">
						<th scope="row">Font Size</th>
						<td><input type="number" name="font_option" placeholder="48" value="<?php echo esc_attr( get_option('font_option') ); ?>" /></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Style 1</th>
						<td><input type="radio" <?php if(esc_attr( get_option('style1'))=='1'){ echo 'checked'; } ?> name="style1" value="1" /><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/1.png'; ?>"></td>
					</tr>
					<tr class="form-field form-required">
						<th scope="row">Style 2</th>
						<td><input type="radio" <?php if(esc_attr( get_option('style1'))=='2'){ echo 'checked'; } ?> name="style1" value="2" /><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/2.png'; ?>"></td>
					</tr>
				</table>

			</div>
		</form>
	</div>
<?php } 
function my_social_links_display() {
	
	$font = esc_attr( get_option('font_option') )?: '48';
	wp_register_style('style', plugin_dir_url( __FILE__ ) . 'css/style.css');
	wp_enqueue_style( 'style');	
	$size = $font/2;
	$padding = $font/4;
	if(esc_attr( get_option('style1'))=='1'){ ?><style>.social_links li { border-radius: 0 !important;  }	</style><?php }	 ?>
	<style>
	.social_links .fa { font-size: <?php echo $size.'px'; ?>;padding: <?php echo $padding.'px'; ?>; }
	.social_links li { height: <?php echo $font.'px'; ?>;width: <?php echo $font.'px'; ?>;}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<?php 
	$regValues = array('facebook' ,'twitter', 'instagram' ,'pinterest', 'linkedin' ,'youtube', 'google-plus' ,'snapchat-ghost', 'tumblr' ,'reddit', 'rss' ,'yahoo', 'envelope', 'flickr' ,'dribbble', 'skype' , 'whatsapp');
	echo '<div class="social_links"><ul>';
	foreach($regValues as $option):
		if(esc_attr( get_option($option) )){
			echo '<li class="'.$option.'"><a href="'.esc_attr( get_option($option) ).'" class="fa fa-'.$option.'"></a></li>';
		}
		
	endforeach;
	echo '</ul></div>';
}
add_shortcode('social_links','my_social_links_display');
?>
