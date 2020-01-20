<?php
/**
 * Plugin Name:       Twenty Twenty Font Fix
 * Description:       This WordPress plugin is a temporary solution for the font rendering issue introduced in Chrome 79.0.3945.88.
 * Version:           1.0.0
 * Author:            Joseph Fusco
 * Author URI:        https://josephfus.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace TwentyTwentyFontFix;

// If file is called directly, abort.
defined( 'WPINC' ) || die();

/**
 * Embed CSS into the document head containing fix.
 */
function embed_styles() : void {
    $stylesheet = get_stylesheet();

    // Exit if current theme is not Twenty Twenty.
    if ( 'twentytwenty' !== $stylesheet ) {
        return;
    }

    remove_editor_styles();

    ?>
    <style>
        .entry-content p,
        .entry-content ol,
        .entry-content ul,
        .entry-content dl,
        .entry-content dt,
        .widget_text p,
        .widget_text ol,
        .widget_text ul,
        .widget_text dl,
        .widget_text dt,
        .widget-content .rssSummary,
        body#tinymce.wp-editor.content p,
        body#tinymce.wp-editor.content ol,
        body#tinymce.wp-editor.content ul,
        body#tinymce.wp-editor.content dl,
        body#tinymce.wp-editor.content dt {
            font-family: Garamond, "Times New Roman", serif !important;
        }
    </style>
    <?php
}
add_action( 'admin_head', __NAMESPACE__ . '\embed_styles' );
add_action( 'wp_head', __NAMESPACE__ . '\embed_styles' );
