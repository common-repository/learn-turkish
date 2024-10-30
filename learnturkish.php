<?php
/*
Plugin Name: Learn Turkish
Plugin URI: http://lycie.com
Description: Displays random Turkish words with their English translations.
Author: Onur Kocatas
Version: 2.2
Author URI: http://lycie.com
*/

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'learn_turkish_load_widgets' );

/* Function that registers our widget. */
function learn_turkish_load_widgets() {
	register_widget( 'Learn_Turkish_Widget' );
}

class Learn_Turkish_Widget extends WP_Widget {
	function Learn_Turkish_Widget() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'Learn_Turkish', 'description' => 'Displays random Turkish words with their English translations.' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200,  'id_base' => 'learn-turkish-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'learn-turkish-widget', 'Learn Turkish', $widget_ops, $control_ops );
	}
	
	
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$css = $instance['css'];


		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		if($css==1){	
			echo  '<style type="text/css">
#LT div.learn_turkish{text-align:center;}
			div#LT div.turkish_word{font-size:22px;font-weight:bold;text-align:center;margin-bottom:7px;color:#666;}
			div#LT div.english_word{font-weight:bold;text-align:center;color:#999;font-size:12px;}
			</style>' ;
		} else 
		if($css==2){	
			echo  '<style type="text/css">
#LT {background:transparent url('.plugins_url( 'talk-right.png' , __FILE__ ).') no-repeat scroll -3px 0px;
			clear:both;
			position:absolute;
			right:10px;
			top:10px;
			width:200px;
			height:130px;}
#LT div.learn_turkish{text-align:center;padding-top:35px;}
			div#LT div.turkish_word{font-size:22px;font-weight:bold;color:#fff;text-align:center;margin-bottom:7px;}
			div#LT div.english_word{color:#efefef;font-weight:bold;text-align:center;}
			</style>' ;
		} else
		if($css==3){	
			echo  '<style type="text/css">
#LT {
			background:transparent url('.plugins_url( 'talk-left.png' , __FILE__).') no-repeat scroll -3px 0px;
			clear:both;
			position:absolute;
			left:10px;
			top:10px;
			width:200px;
			height:130px;}
#LT div.learn_turkish{text-align:center;padding-top:35px;}
			div#LT div.turkish_word{font-size:22px;font-weight:bold;color:#fff;text-align:center;margin-bottom:7px;}
			div#LT div.english_word{color:#efefef;font-weight:bold;text-align:center;}
			</style>' ;
		}


// Turkish - English words
		$turkish = '<div class="learn_turkish"><div class="turkish_word">merhaba</div><div class="english_word">"hello"</div></div>
		<div class="learn_turkish"><div class="turkish_word">g&uuml;le g&uuml;le</div><div class="english_word">"goodbye"</div></div>
		<div class="learn_turkish"><div class="turkish_word">g&uuml;nayd&iota;n</div><div class="english_word">"good morning"</div></div>
		<div class="learn_turkish"><div class="turkish_word">iyi ak&#351;amlar</div><div class="english_word">"good evening"</div></div>
		<div class="learn_turkish"><div class="turkish_word">iyi geceler</div><div class="english_word">"good night"</div></div>
		<div class="learn_turkish"><div class="turkish_word">nas&iota;ls&iota;n&iota;z?</div><div class="english_word">"how are you?"</div></div>
		<div class="learn_turkish"><div class="turkish_word">l&uuml;tfen</div><div class="english_word">"please"</div></div>
		<div class="learn_turkish"><div class="turkish_word">te&#351;ekk&uuml;r ederim&nbsp;</div><div class="english_word">"thank you"</div></div>
		<div class="learn_turkish"><div class="turkish_word">evet</div><div class="english_word">"yes"</div></div>
		<div class="learn_turkish"><div class="turkish_word">hay&iota;r</div><div class="english_word">"no"</div></div>
		<div class="learn_turkish"><div class="turkish_word">.. istiyorum</div><div class="english_word">"I want .."</div></div>
		<div class="learn_turkish"><div class="turkish_word">ne zaman?</div><div class="english_word">"when?"</div></div>
		<div class="learn_turkish"><div class="turkish_word">bug&uuml;n</div><div class="english_word">"today"</div></div>
		<div class="learn_turkish"><div class="turkish_word">d&uuml;n</div><div class="english_word">"yesterday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">yar&iota;n</div><div class="english_word">"tomorrow"</div></div>
		<div class="learn_turkish"><div class="turkish_word">sabah</div><div class="english_word">"morning"</div></div>
		<div class="learn_turkish"><div class="turkish_word">gece</div><div class="english_word">"night"</div></div>
		<div class="learn_turkish"><div class="turkish_word">bir saat</div><div class="english_word">"one hour"</div></div>
		<div class="learn_turkish"><div class="turkish_word">saat ka&ccedil;?</div><div class="english_word">"what time is it?"</div></div>
		<div class="learn_turkish"><div class="turkish_word">saat ka&ccedil;ta?</div><div class="english_word">"at what time?"</div></div>
		<div class="learn_turkish"><div class="turkish_word">pazartesi</div><div class="english_word">"monday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">sal&iota;</div><div class="english_word">"tuesday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">&ccedil;ar&#351;amba</div><div class="english_word">"wednesday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">per&#351;embe</div><div class="english_word">"thursday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">cuma</div><div class="english_word">"friday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">cumartesi</div><div class="english_word">"saturday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">pazar</div><div class="english_word">"sunday"</div></div>
		<div class="learn_turkish"><div class="turkish_word">havaalan&iota;</div><div class="english_word">"airport"</div></div>
		<div class="learn_turkish"><div class="turkish_word">liman</div><div class="english_word">"port"</div></div>
		<div class="learn_turkish"><div class="turkish_word">&#351;ehir merkezi</div><div class="english_word">"town center"</div></div>
		<div class="learn_turkish"><div class="turkish_word">nerede?</div><div class="english_word">"where is it?"</div></div>
		<div class="learn_turkish"><div class="turkish_word">uzak m&iota;?</div><div class="english_word">"is it far?"</div></div>
		<div class="learn_turkish"><div class="turkish_word">turizm b&uuml;rosu</div><div class="english_word">"tourism bureau"</div></div>
		<div class="learn_turkish"><div class="turkish_word">iyi bir otel</div><div class="english_word">"a good hotel"</div></div>
		<div class="learn_turkish"><div class="turkish_word">bir lokanta</div><div class="english_word">"a restaurant"</div></div>
		<div class="learn_turkish"><div class="turkish_word">dikkat</div><div class="english_word">"attention"</div></div>
		<div class="learn_turkish"><div class="turkish_word">ekmek</div><div class="english_word">"bread"</div></div>
		<div class="learn_turkish"><div class="turkish_word">et</div><div class="english_word">"meat"</div></div>
		<div class="learn_turkish"><div class="turkish_word">su</div><div class="english_word">"water"</div></div>
		<div class="learn_turkish"><div class="turkish_word">meyva suyu</div><div class="english_word">"fruit juice"</div></div>
		<div class="learn_turkish"><div class="turkish_word">&#351;arap</div><div class="english_word">"wine"</div></div>
		<div class="learn_turkish"><div class="turkish_word">bira</div><div class="english_word">"beer"</div></div>
		<div class="learn_turkish"><div class="turkish_word">tavuk</div><div class="english_word">"chicken"</div></div>
		<div class="learn_turkish"><div class="turkish_word">buz</div><div class="english_word">"ice"</div></div>
		<div class="learn_turkish"><div class="turkish_word">bal&iota;k</div><div class="english_word">"fish"</div></div>
		<div class="learn_turkish"><div class="turkish_word">yirmi</div><div class="english_word">"20"</div></div>
		<div class="learn_turkish"><div class="turkish_word">otuz</div><div class="english_word">"30"</div></div>
		<div class="learn_turkish"><div class="turkish_word">k&iota;rk</div><div class="english_word">"40"</div></div>
		<div class="learn_turkish"><div class="turkish_word">elli</div><div class="english_word">"50"</div></div>
		<div class="learn_turkish"><div class="turkish_word">altm&iota;s</div><div class="english_word">"60"</div></div>
		<div class="learn_turkish"><div class="turkish_word">yetmi&#351;</div><div class="english_word">"70"</div></div>
		<div class="learn_turkish"><div class="turkish_word">seksen</div><div class="english_word">"80"</div></div>
		<div class="learn_turkish"><div class="turkish_word">doksan</div><div class="english_word">"90"</div></div>
		<div class="learn_turkish"><div class="turkish_word">y&uuml;z</div><div class="english_word">"100"</div></div>
		<div class="learn_turkish"><div class="turkish_word">ikiyy&uuml;z</div><div class="english_word">"200"</div></div>
		<div class="learn_turkish"><div class="turkish_word">&uuml;&ccedil;y&uuml;z</div><div class="english_word">"300"</div></div>
		<div class="learn_turkish"><div class="turkish_word">bin</div><div class="english_word">"1000"</div></div>
		<div class="learn_turkish"><div class="turkish_word">ikibin</div><div class="english_word">"2000"</div></div>
		<div class="learn_turkish"><div class="turkish_word">bir</div><div class="english_word">"1"</div></div>
		<div class="learn_turkish"><div class="turkish_word">iki</div><div class="english_word">"2"</div></div>
		<div class="learn_turkish"><div class="turkish_word">&uuml;&ccedil;</div><div class="english_word">"3"</div></div>
		<div class="learn_turkish"><div class="turkish_word">d&ouml;rt</div><div class="english_word">"4"</div></div>
		<div class="learn_turkish"><div class="turkish_word">be&#351;</div><div class="english_word">"5"</div></div>
		<div class="learn_turkish"><div class="turkish_word">alti</div><div class="english_word">"6"</div></div>
		<div class="learn_turkish"><div class="turkish_word">yedi</div><div class="english_word">"7"</div></div>
		<div class="learn_turkish"><div class="turkish_word">sekiz</div><div class="english_word">"8"</div></div>
		<div class="learn_turkish"><div class="turkish_word">dokuz</div><div class="english_word">"9"</div></div>
		<div class="learn_turkish"><div class="turkish_word">on</div><div class="english_word">"10"</div></div>';

// one line at a time
		$turkish = explode("\n", $turkish);

// And then randomly choose a word
		$chosen = wptexturize( $turkish[ mt_rand(0, count($turkish) - 1) ] );

//echo the chosen line
		echo '<div id="LT">' .$chosen. '</div>';

		/* After widget*/
		echo $after_widget;
	}
	
	
	/* Update the widget settings.*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['css'] = strip_tags( $new_instance['css'] );
		return $instance;
	}
	function form( $instance ) {

		/* Set up default tile*/
		$defaults = array( 'title' => 'Learn Turkish' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'css' ); ?>">CSS:</label>
			<select name="<?php echo $this->get_field_name( 'css' ); ?>" id="<?php echo $this->get_field_id( 'css' ); ?>" class="widefat">
				<option value="0" <?php if($instance['css'] == 0) {echo ' selected="SELECTED"'; } ?>>No style</option>
				<option value="1" <?php if($instance['css'] == 1) {echo ' selected="SELECTED"'; } ?>>Simple</option>
				<option value="2" <?php if($instance['css'] == 2) {echo ' selected="SELECTED"'; } ?>>Top right</option>
				<option value="3" <?php if($instance['css'] == 3) {echo ' selected="SELECTED"'; } ?>>Top left</option>
			</select>
		</p>
		<?php
	}
}
?>