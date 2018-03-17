<?php
//テーマのセットアップ
// titleタグをhead内に生成する
add_theme_support( 'title-tag' );
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );
// カスタムヘッダー画像を設置する
$custom_header_defaults = array(
		'width'                  => 700,
		'height'                 => 200,
		'header-text'            => false,	//ヘッダー画像上にテキストをかぶせる
);
add_theme_support( 'custom-header', $custom_header_defaults );
//カスタムメニュー
register_nav_menu( 'header-nav',  ' ヘッダーナビゲーション ' );
register_nav_menu( 'footer-nav',  ' フッターナビゲーション ' );
//メニューボタンjs呼び出し
function navbutton_scripts(){
wp_enqueue_script( 'navbutton_script', get_template_directory_uri() .'/navbutton.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts' , 'navbutton_scripts' );

function scrolled_scripts(){
wp_enqueue_script( 'scrolled_script', get_template_directory_uri() .'/scrolled.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts' , 'scrolled_scripts' );
//サイドバーにウィジェット追加
function widgetarea_init(){
  register_sidebar(array(
    'name' => 'サイドバー',
    'id' => 'side-widget',
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-wrapper">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
  ));
}
add_action('widgets_init','widgetarea_init');
