<?php
function jyfg_display_table(){
	
		if ( strlen( $usersearch ) ) {
			/* translators: %s: Search query. */
			printf( '<span class="subtitle">' . __( 'Search results for &#8220;%s&#8221;' ) . '</span>', esc_html( $usersearch ) );
		}?>
	

	<hr class="wp-header-end">

			<?php $wp_list_table->views(); ?>

	<form method="get">

			<?php $wp_list_table->search_box( __( 'Search Users' ), 'user' ); ?>

			<?php if ( ! empty( $_REQUEST['role'] ) ) { ?>
			<input type="hidden" name="role" value="<?php echo esc_attr( $_REQUEST['role'] ); ?>" />
			<?php } ?>

			<?php $wp_list_table->display(); ?>
	</form>
<?php } ?>

<div class="wrap">
	<h1 class="wp-heading">Download users list</h1>
	<button type="button" id="downloadcsv" class="button action">Download list</button>
			
</div>