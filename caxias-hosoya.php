<?php
/**
 * @package Caxias Hosoya
 * @version 1.0
 */
/*
Plugin Name: Caxias Hosoya
Plugin URI: http://wordbench.org/groups/kobe/
Description: これはただのプラグインではありません。伝説上のシンガー カシアス・ホソヤによって歌われた最も有名な WordPress のキーワードに要約される、同一世代のすべての人々の希望と情熱を象徴するものです。これは世界で最初で最後になるかわからない WordBench Kobe 公式プラグインです。このプラグインが有効にされると、プラグイン管理画面以外の管理パネルの右上に「君の瞳にダッシュボード」からの歌詞がランダムに表示されます。 
Author: Caxias Hosoya
Version: 1.0
Author URI: https://twitter.com/tkc49
*/

function caxias_hosoya_get_lyric() {
  /** These are the lyrics to Caxias Hosoya */
	$lyrics = "君の瞳にダッシュボード
溢れる想いがトラックバック
そして届かない君からのコメント通知
Wow~ You are my Type~";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function caxias_hosoya() {
	$chosen = caxias_hosoya_get_lyric();
	echo "<p id='caxias'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'caxias_hosoya' );

// We need some CSS to position the paragraph
function caxias_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#caxias {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'caxias_css' );

?>
