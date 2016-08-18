<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hb-2015
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <section class="page-not-found">
                <div class="container">
                    <article id="article" class="card article--card">
						<?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<div class="breadcrumbs">','</div>');
						} ?>
						<div class="entry-header">
							<h1 class="entry-title" itemprop="headline">Page not found</h1>
						</div>
						<div class="entry-content" itemprop="text">
							<p>Whoops, that page is missing!<br>
							If you clicked a link that led to this page, please let us know so we can fix our mistake as soon as possible.</p>
							<form method="get" class="search">
								<input type="text" name="s" value="<?php echo get_search_query(); ?>" class="search" placeholder="<?php _e( 'Enter condition or topic (e.g., Psoriasis', 'hb' ); ?>" />
							</form>
						</div>
					</article>
                </div>
            </section>
			
            <section class="home--content">
                <div class="container">
                    <?php $articles = hb_get_featured_expert_articles(); ?>
                    <?php if ( $articles && count( $articles ) > 0 ) : ?>
                        <div class="home--experts">
                            <h2 class="home--heading"><span><?php _e( 'Featured Experts', 'hb' ); ?></span><div class="arrows"><a class="prev"></a><a class="next"></a></div></h2>
                            <ul class="home--expert-articles" data-equal="h3">
                                <?php foreach ( $articles as $article ) : ?>
                                    <li>
                                        <article class="expert--article card">
                                            <div class="expert--profile">
                                                <?php $expert = get_field( 'expert', $article->ID ); ?>
                                                <a href="<?php echo get_permalink( $expert ); ?>" class="expert--name"><?php echo $expert->post_title; ?></a>
                                                <span class="expert--speciality"><?php the_field( 'specialty', $expert->ID ); ?></span>
                                                <?php $organisation = get_field( 'facility', $expert->ID ); ?>
                                                <span class="expert--organisation"><?php echo $organisation->post_title; ?></span>
                                                <img src="<?php echo hb_get_post_thumbnail_url( $expert->ID, 'home-expert' ); ?>" />
                                            </div>
                                            <a href="<?php echo get_permalink( $article ); ?>" class="expert--article-image" style="background-image: url('<?php echo hb_get_post_thumbnail_url( $article->ID, 'medium' ); ?>');"></a>
                                            <a href="<?php echo get_permalink( $article ); ?>" class="expert--article-info">
                                                <span class="archive--card-category"><?php echo hb_get_card_category_name( $article->ID ); ?></span>
                                                <h3><?php echo $article->post_title; ?></h3>
                                            </a>
                                            <footer>
                                                <div class="share--widget-inline share">
                                                    <a href="#" class="share--trigger"><i class="fa fa-share-square-o"></i> <?php _e( 'Share', 'hb' ); ?></a>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink( $article ); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
                                                    <?php /* <a href="" class="linkhay"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkhay.png" alt="linkhay" /></a> */ ?>
                                                    <a href="mailto:?subject=Hello Bacsi&body=<?php _e( 'I found this article I think you might like!', 'hb' ); ?> <?php echo get_permalink( $article->ID ); ?>" class="mail"><i class="fa fa-envelope"></i></a>
                                                </div>
                                            </footer>
                                        </article>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="home--hcs">
                        <h2 class="home--heading"><span><?php _e( 'Featured Health Centers', 'hb' ); ?></span></h2>
                        <?php wp_nav_menu( array( 'menu_class' => 'card', 'theme_location' => 'home_hcs' ) ); ?>
                    </div>
                </div>
                <div class="container">
                    <h2 class="home--heading"><span><?php _e( 'Latest Articles', 'hb' ); ?></span></h2>
                </div>
                <div class="container home--latest">
                    <div class="grid" data-equal="h2">
                        <?php $articles = hb_get_home_posts(true, 1, 6); ?>

                        <?php foreach ( $articles as $post ) : ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="card home--latest-card">
                                    <a href="<?php the_permalink(); ?>" class="archive--article">
                                        <?php if ( $thumb = hb_get_post_thumbnail_url( get_the_ID() ) ) : ?>
                                            <div class="archive--article-thumbnail" style="background-image: url(<?php echo $thumb; ?>);"></div>
                                        <?php endif; ?>
                                        <div class="entry-content" style="border-color: <?php echo hb_get_accent_color( 'post', $post ); ?>">
                                            <span class="archive--card-category"><?php echo hb_get_card_category_name( get_the_ID() ); ?></span>
                                            <h2><?php echo ( $title = get_field( 'card_title' ) ? $title : get_the_title() ); ?></h2>
                                        </div><!-- .entry-content -->
                                    </a>
                                    <footer>
                                        <div class="share--widget-inline share">
                                            <a href="#" class="share--trigger"><i class="fa fa-share-square-o"></i> <?php _e( 'Share', 'hb' ); ?></a>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink( $post ); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <?php /*<a href="" class="linkhay"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkhay.png" alt="linkhay" /></a>*/ ?>
                                            <a href="mailto:?subject=Hello Bacsi&body=<?php _e( 'I found this article I think you might like!', 'hb' ); ?> <?php echo get_permalink( $post->ID ); ?>" class="mail"><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </footer>
                                </div>
                            </article><!-- #post-## -->
                        <?php endforeach; // End of the loop. ?>
                    </div>
                    <div class="list">
                        <?php $articles = hb_get_home_posts(false, 1, 7); ?>

                        <?php foreach ( $articles as $post ) : ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>" class="card archive--article  home--latest-card">
                                    <div class="entry-content" style="border-color: <?php echo hb_get_accent_color( 'post', $post ); ?>">
                                        <span class="archive--card-category"><?php echo hb_get_card_category_name( get_the_ID() ); ?></span>
                                        <h2><?php echo ( $title = get_field( 'card_title' ) ? $title : get_the_title() ); ?></h2>
                                    </div><!-- .entry-content -->
                                </a>
                            </article><!-- #post-## -->
                        <?php endforeach; // End of the loop. ?>
                    </div>
                    <div class="more">
                        <a class="more--button" data-page="2"><?php _e( 'View more' ); ?></a>
                    </div>
                </div>
                <div class="container">
                    <div class="home--hcs mobile">
                        <h2 class="home--heading"><span><?php _e( 'Featured Health Centers', 'hb' ); ?></span></h2>
                        <?php wp_nav_menu( array( 'menu_class' => 'card', 'theme_location' => 'home_hcs' ) ); ?>
                    </div>
                </div>
                
                    <?php wp_reset_query(); ?>
                    <?php while( have_posts() ) : the_post(); ?>
                        <div class="home--seo">
                            <div class="card">
                                <header class="entry-header"><p class="entry-title"><?php the_title(); ?></p></header>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>