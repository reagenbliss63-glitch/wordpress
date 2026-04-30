<?php
/**
 * The main template file
 */

get_header();
?>

    <main id="primary" class="site-main">
        <h2 class="section-title">Latest Updates</h2>

        <?php if ( have_posts() ) : ?>

            <div class="blog-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php identify_post_class(); ?>" <?php post_class( 'anime-card' ); ?>>
                        <div class="card-image-wrapper">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </a>
                            <?php else : ?>
                                <!-- Fallback placeholder if no thumbnail -->
                                <a href="<?php the_permalink(); ?>" style="display:block; width:100%; height:100%; background:linear-gradient(45deg, var(--accent-pink), var(--accent-cyan)); opacity:0.5;"></a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-content">
                            <div class="entry-meta">
                                <?php echo get_the_date(); ?>
                            </div>
                            
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                            
                            <div class="entry-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">Read System <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->
                    <?php
                endwhile;
                ?>
            </div><!-- .blog-grid -->

            <?php
            the_posts_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'anipulse' ) . '</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'anipulse' ) . '</span>',
            ) );

        else :
            ?>
            <p><?php esc_html_e( 'No posts found.', 'anipulse' ); ?></p>
        <?php endif; ?>

    </main><!-- #primary -->

<?php
get_footer();
