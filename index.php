<?php get_header(); ?>


<?php global $post;
$categories = get_categories( array( 'orderby' => 'name'));
foreach ($categories as $category): ?>
    <div class="domaine">
        <?php echo '<h2>'.$category->name.'</h2>';

        $args = array(
        	'posts_per_page'   => 5,
        	'category'    => $category->cat_ID
        );
        $posts_array = get_posts( $args );
        ?>
        <div>
            <?php foreach ($posts_array as $post) : setup_postdata( $post ); ?>

        		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php the_meta('<p class="periode">','</p>'); ?>
                <?php the_content('<p>','</p>') ?>
            <?php endforeach;?>
        </div>
    </div>
    <?php
endforeach;?>
