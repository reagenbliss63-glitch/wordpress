<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

    <main id="primary" class="site-main" style="margin-top: 0;">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="single-post-header">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'full' ); ?>
                    <?php else : ?>
                        <div style="width:100%; height:400px; background:linear-gradient(45deg, var(--bg-color), var(--accent-pink));"></div>
                    <?php endif; ?>
                    
                    <div class="single-title-wrapper">
                        <h1 class="single-title"><?php the_title(); ?></h1>
                        <div class="entry-meta" style="color: #fff; text-shadow: 0 1px 5px rgba(0,0,0,0.8);">
                            By <?php the_author(); ?> on <?php echo get_the_date(); ?>
                        </div>
                    </div>
                </header>
                
                <div class="post-content" style="margin-top: 3rem;">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'anipulse' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        )
                    );
                    ?>
                </div>

            </article><!-- #post-<?php the_ID(); ?> -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #primary -->

<?php
get_footer();
