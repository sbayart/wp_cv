<?php get_header(); ?>


<?php global $post;
$cat = get_category_by_slug('details-de-la-personne');
$categories = get_categories( array( 'orderby' => 'name'));
    foreach ($categories as $category):
        if ( $category->cat_ID != $cat->term_id ) :?>
            <div class="domaine">
                <?php echo '<h2 id='.$category->name.'>'.$category->name.'</h2>';

                $args = array(
                	'posts_per_page'   => 5,
                	'category'         => $category->cat_ID,
                    'order'            => 'DESC',
                    'meta_key'         => 'Période',
                    'orderby'          => 'meta_value_num',
                );
                $posts_array = get_posts( $args );
                ?>
                <div>
                    <?php
                    foreach ($posts_array as $post) : setup_postdata( $post );
                        ?>
                		<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php
                        $custom_fields = get_post_custom(0);
                        $my_custom_field = $custom_fields['Période'];
                        foreach ( $my_custom_field as $key => $value ) {
                            echo '<p>'. $value . '</p>';
                        }
                        the_content('<p>','</p>');
                    endforeach;?>
                </div>
            </div>
            <?php
        endif;
    endforeach;
 ?>
