<!DOCTYPE html><!--htmlで書かれていることを宣言-->
<html lang="ja"><!--日本語のサイトであることを指定-->
<head prefix="og: http://ogp.me/ns#">
<meta charset="utf-8"><!--エンコードがUTF-8であることを指定-->
<meta name="viewport" content="width=device-width, initial-scale=1.0 "><!--viewportの設定-->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"><!--スタイルシートの呼び出し-->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!--font-awesomeのスタイルシートの呼び出し-->
<?php if(is_tag()): ?>
  <meta name="robots" content="noindex"/>
<?php elseif(is_date()): ?>
  <meta name="robots" content="noindex"/>
<?php elseif(is_search()): ?>
  <meta name="robots" content="noindex"/>
<?php elseif(is_404()):?>
  <meta name="robots" content="noindex"/>
<?php endif;?>

<!-- 共通ogp -->
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:locale" content="ja_JP">
<!-- TwitterOGP設定 -->
<meta name="twitter:site" content="@yamadaDaitenshi">
<meta name="twitter:card" content="summary">
<meta name="twitter:creator" content="@yamadaDaitenshi">
<!-- 個別ページのmetadata -->
<?php if( is_single() || is_page() ): ?>
  <!-- 共通 -->
  <meta name="description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
  <?php if ( has_tag() ): ?>
  <?php $tags = get_the_tags();
  $kwds = array();
  foreach($tags as $tag){
    $kwds[] = $tag->name;
  }	?>
  <meta name="keywords" content="<?php echo implode( ',',$kwds ); ?>">
  <?php endif; ?>
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <meta property="og:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>">
  <?php if( has_post_thumbnail() ): ?>
    <?php $postthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
    <meta property="og:image" content="<?php echo $postthumb[0]; ?>">
  <?php endif; ?>
  <!-- Tewitter用 -->
  <meta name="twitter:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>">
  <?php if( has_post_thumbnail() ): ?>
  <?php $postthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
  <meta name="twitter:image:src" content="<?php echo $postthumb[0]; ?>">
  <?php endif; ?>
<?php endif; ?>

<!--TOPページ用metaデータ-->
<?php if( is_home() ): ?>
  <!-- 共通 -->
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <?php $allcats = get_categories();
  $kwds = array();
  foreach($allcats as $allcat) {
    $kwds[] = $allcat->name;
  } ?>
  <meta name="keywords" content="<?php echo implode( ',',$kwds ); ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
  <meta property="og:url" content="<?php home_url( '/' ); ?>">
  <meta property="og:description" content="<?php bloginfo( 'description' ) ?>">
  <meta property="og:image" content="<?php echo $postthumb[0]; ?>">
  <!-- Teitter用 -->
  <meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="twitter:image:src" content="<?php echo get_template_directory_uri(); ?>/add/title.png">
<?php endif; ?>
<?php wp_head(); ?><!--システム・プラグイン用-->
</head>
<body <?php body_class(); ?>>
<header>
  <div class="header-inner">
    <!--タイトルを画像にする場合-->
    <div class="site-title site-title-top">
    <h1>
    <?php if(get_header_image()): ?>
    <a href="<?php echo home_url(); ?>">
    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>" />
    </a>
    <?php else: ?>
    <a href="<?php echo home_url(); ?>">
    <?php bloginfo('name'); ?>
    </a>
    <?php endif; ?>
    </h1>
    </div>
  </div>
  <!--ヘッダーメニュー-->
  <?php if( has_nav_menu('header-nav') ) : ?>
  <div class="top-nav-area">
  <!--ボタンの設定-->
  <div class="nav-fixid">
    <button type="button" id="navbutton">
      <i class="fa fa-list-ul"></i>
    </button>
  </div>
    <!--メニューの設定-->
    <?php wp_nav_menu( array(
      'theme_location' => 'header-nav',
      'container' => 'nav',
      'container_class' => 'header-nav',
      'container_id' => 'header-nav',
      'fallback_cb' => ''
    ) ); ?>
  </div>
  <?php else : ?>
    <div class="top-nav-area-margin"></div>
    <div class="not-top-nav-area"></div>
  <?php endif; ?>

</header>
