<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
if ( version_compare( WOOCOMMERCE_VERSION, '3.0.0' ) >= 0 ) {
	$attachment_ids = $product->get_gallery_image_ids();
} else {
	$attachment_ids = $product->get_gallery_attachment_ids();
}

if ( $attachment_ids && has_post_thumbnail() ) {

	if ( count( $attachment_ids ) > 2 ) {
		$wrap_start = '<div class="kleo-gallery kleo-woo-gallery animate-when-almost-visible">'
		              . '<div class="kleo-thumbs-carousel kleo-thumbs-animated th-fade" data-min-items="3" data-max-items="4" data-circular="true">';
		$wrap_end   = '</div>'
		              . '<a class="kleo-thumbs-prev" href="#"><i class="icon-angle-left"></i></a>'
		              . '<a class="kleo-thumbs-next" href="#"><i class="icon-angle-right"></i></a>'
		              . '</div><!--end carousel-container-->';
	} else {
		$wrap_start = '<div class="kleo-woo-gallery thumbnails">';
		$wrap_end   = '</div>';
	}

	$loop    = 1;
	$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

	echo $wrap_start;
	?>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<?php
		/* Generate the featured image as the first image */
		$thumb_id       = get_post_thumbnail_id();
		$main_image_src = wp_get_attachment_image_src( $thumb_id, 'shop_single' );
		$image_link     = $main_image_src[0];
		$main_full_img  = wp_get_attachment_url( $thumb_id );
		$main_thumbnail = wp_get_attachment_image_src( $thumb_id, 'shop_thumbnail' );
		$thumb_link = $main_thumbnail[0];
		?>
		
		<div data-thumb="<?php esc_url( $thumb_link ); ?>" class="woocommerce-product-gallery__image">
			<a data-big-img="<?php echo $main_full_img; ?>" id="product-thumb-0" href="<?php echo $image_link; ?>" class="zoom first selected">
				<?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) ) ?>
			</a>
		</div>
		
	<?php endif; ?>

	<?php
	foreach ( $attachment_ids as $attachment_id ) {

		$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
		$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
		$image_title     = get_post_field( 'post_excerpt', $attachment_id );

		$attributes = array(
			'title'                   => $image_title,
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
		);

		$html = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image">' .
			'<a class="zoom" id="product-thumb-' . $loop . '" data-big-img="' . $full_size_image[0] . '" href="' . esc_url( $full_size_image[0] ) . '">';
		$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
		$html .= '</a></div>';

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

		$loop ++;
	}
	echo $wrap_end;
}
