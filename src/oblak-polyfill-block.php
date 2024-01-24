<?php
/**
 * Block polyfills
 *
 * ! This file intentionally left without namespace
 *
 * @package WP Polyfills
 */

if ( ! function_exists( 'deregister_all_blocks' ) ) :
    /**
     * Deregisters all registered blocks.
     */
    function deregister_all_blocks() {
        if ( did_action( 'init' ) || 'init' !== current_action() ) {
            _doing_it_wrong( __FUNCTION__, 'You need to call this function on init', '1.0.0' );
            return;
        }

        array_walk(
            array_keys( WP_Block_Type_Registry::get_instance()->get_all_registered() ),
            static fn( $b ) => WP_Block_Type_Registry::get_instance()->unregister( $b )
        );
    }

endif;
