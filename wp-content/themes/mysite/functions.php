<?php

//概要（抜粋）の文字数
function my_length($length) {
	return 50;
}
add_filter('excerpt_mblength','my_length');

//概要（抜粋）の省略記号
function my_more($more) {
	return '…';
}
add_filter('excerpt_more', 'my_more');


//コンテンツの最大幅
if ( !isset( $content_width ) ) {
	$content_width = 700;
}


//YouTubeのビデオ：<div>でマークアップ
function ytwrapper($return, $data, $url) {
	if ($data->provider_name == 'YouTube') {
		return '<div class="ytvideo">'.$return.'</div>';
	} else {
		return $return;
	}
}
add_filter('oembed_dataparse','ytwrapper',10,3);


//YouTubeのビデオ：キャッシュをクリア
//function clear_ytwrapper($post_id) {
//	global $wp_embed;
//	$wp_embed->delete_oembed_caches($post_id);
//}
//add_action('pre_post_update', 'clear_ytwrapper');



//アイキャッチ画像
add_theme_support( 'post-thumbnails' );


// エディタスタイルシート
//add_editor_style();
//add_editor_style( '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );


// サムネイル画像
function mythumb( $size, $post ) {

	if( has_post_thumbnail() ) {
		$postthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
		$url = $postthumb[0];
	} elseif( preg_match( '/wp-image-(\d+)/s', $post->post_content, $thumbid ) ) {
		$postthumb = wp_get_attachment_image_src( $thumbid[1], $size );
		$url = $postthumb[0];
	} else {
		$url = get_template_directory_uri() . '/thumb-' . $size . '.jpg';
	}

	return $url;

}


// カスタムメニュー
register_nav_menu( 'sitenav', 'サイトナビゲーション' );
register_nav_menu( 'pickupnav', 'おすすめ記事' );


// トグルボタン
function navbtn_scripts() {

	wp_enqueue_script( 'navbtn-script', get_template_directory_uri() .'/navbtn.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'navbtn_scripts' );


// ウィジェットエリア
register_sidebar( array(
	'id' => 'submenu',
	'name' => ' サブメニュー',
	'description' => 'サイドバーに表示するウィジェットを指定。',
	'before_widget' => '<aside id="%1$s" class="mymenu widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>'
) );


// 検索フォーム
add_theme_support( 'html5', array('search-form') );


//カスタマイザー
function theme_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );
}
add_action('customize_register', 'theme_customize_register');




