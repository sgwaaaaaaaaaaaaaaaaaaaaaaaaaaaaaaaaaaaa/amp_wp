<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns#">
<meta charset="UTF-8">
<title>
<?php wp_title( '|', true, 'right'); ?>
<?php bloginfo( 'name' ); ?>
</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css?family=Syncopate:700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">


<?php if( is_single() || is_page() ): //記事の個別ページ用のメタデータ ?>
<meta name="description" content="<?php echo wp_trim_words( $post->post_content, 100, '…' ); ?>">

<?php if( has_tag() ): ?>
<?php $tags = get_the_tags();
$kwds = array();
foreach($tags as $tag) {
	$kwds[] = $tag->name;
} ?>
<meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">
<?php endif; ?>

<meta property="og:type" content="article">
<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:url" content="<?php the_permalink(); ?>">
<meta property="og:description" content="<?php echo wp_trim_words( $post->post_content, 100, '…' ); ?>">

<meta property="og:image" content="<?php echo mythumb( 'large', $post->ID ); ?>">
<?php endif; //記事の個別ページ用のメタデータ【ここまで】?>


<?php if( is_home() ): //トップページ用のメタデータ ?>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">

<?php $allcats = get_categories();
foreach($allcats as $allcat) {
	$kwds[] = $allcat->name;
} ?>
<meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:url" content="<?php echo home_url( '/' ); ?>">
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/picnic-top.jpg">
<?php endif; //トップページ用のメタデータ【ここまで】?>


<?php if( is_category() || is_tag() ): //カテゴリー・タグページ用のメタデータ ?>
	<?php if( is_category() ) {
		$termid = $cat;
		$taxname = 'category';
	} elseif( is_tag() ) {
		$termid = $tag_id;
		$taxname = 'post_tag';
	} ?>

<meta name="description" content="<?php single_term_title(); ?>に関する記事の一覧です。">

<?php $childcats = get_categories( array( 'child_of' => $termid ) );
$kwds = array();
$kwds[] = single_term_title('', false);
foreach($childcats as $childcat) {
	$kwds[] = $childcat->name;
} ?>
<meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?php single_term_title(); ?>に関する記事｜<?php bloginfo( 'name' ); ?>">
<meta property="og:url" content="<?php echo get_term_link( $termid, $taxname ); ?>">
<meta property="og:description" content="<?php single_term_title(); ?>に関する記事の一覧です。">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/picnic-top.jpg">
<?php endif; //カテゴリー・タグページ用のメタデータ【ここまで】?>


<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:locale" content="ja_JP">

<meta name="twitter:site" content="@ebisucom">
<meta name="twitter:card" content="summary_large_image">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<header>
<div class="header-inner">
	<div class="site">
	<a href="<?php echo home_url(); ?>">
	<?php if( has_site_icon() ): ?>
	<img src="<?php site_icon_url(); ?>" alt="" width="42" height="42">
	<?php endif; ?>
	CLOUD
	</a>
	</div>


	<div class="sitenav">

	<button type="button" id="navbtn">
	<i class="fa fa-bars"></i><span>MENU</span>
	</button>

	<?php if ( has_nav_menu( 'sitenav' ) ) : ?>
	<?php wp_nav_menu( array(
		'theme_location' => 'sitenav',
		'container' => 'nav',
		'container_class' => 'mainmenu',
		'container_id' => 'mainmenu'
	) ); ?>
	<?php else: ?>
	<nav id="mainmenu" class="mainmenu">
		<ul>
		<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
		<?php if( $about = get_page_by_path('about') ) : ?>
			<li><a href="<?php echo get_permalink($about->ID); ?>"><?php echo $about->post_title; ?></a></li>
		<?php endif; ?>
		<?php if( $about = get_page_by_path('contact') ) : ?>
			<li><a href="<?php echo get_permalink($about->ID); ?>"><?php echo $about->post_title; ?></a></li>
		<?php endif; ?>
		</ul>
	</nav>
	<?php endif; ?>
	</div>

</div>
</header>





