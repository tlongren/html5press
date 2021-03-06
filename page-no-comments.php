<?php
/*Template Name: Page With No Comments*/
?>
<?php get_header(); ?>
<?php $options = rootdip_get_options(); ?>
<main id="content" role="main">
		<?php if (!empty($options['featured_cat']) && is_front_page()) { rootdip_featured_posts(); } ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
        
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
			<?php $large_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $options['featured_image_size'] ); ?>
            <?php if ( has_post_thumbnail() ) { ?><a href="<?php echo "$large_image[0]"; ?>" rel="thumbnail"><img src="<?php echo "$image[0]"; ?>" alt="" class="thumbnail alignleft" /></a><?php } ?>
            <?php the_content(__( 'Read more','rootdip' )); ?>
			<?php /* Edit Link */ edit_post_link(); ?>
			<footer class="post-meta">
                <p>
                	<?php _e( 'Created ','rootdip'); ?><time datetime="<?php the_time('Y-m-d\TH:i:sO'); ?>" class="timeago" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time><?php if (get_the_modified_time() != get_the_time()) { ?>, updated <time datetime="<?php the_modified_time('Y-m-d\TH:i:sO'); ?>"><?php the_modified_date(); ?></time><?php } ?>
				</p>
				
            </footer> <!-- end post meta -->
        </article> <!-- end post 1 -->
		<?php endwhile; endif; ?>
    
    </main> <!-- end main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
