<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri()?>">
<link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
        <?php global $post;

        $categories = array( 'category_name' => 'details-de-la-personne');
            $posts_array = get_posts( $categories );
                foreach ($posts_array as $post) : setup_postdata( $post );
                    $dontrepeat = $categories->cat_ID;
                    the_category('<h1>','</h1>');?>
                	<div>
                        <?php the_content('<p>','</p>'); ?>
                	</div>
            <?php endforeach;

            $cat = get_category_by_slug('details-de-la-personne');
            $categories = get_categories( array( 'orderby' => 'name'));?>
            <div class="menu">
                <?php
                foreach ($categories as $category):
                    if ( $category->cat_ID != $cat->term_id ) :?>
                            <?php echo '<a href=#'.$category->name.'><p>'.$category->name.'</p></a>';
                    endif;
                endforeach;
        ?>

            </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
