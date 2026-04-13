<?php
/**
 * Plugin Name: Aki Custom Dynamic Button for Divi
 * Description: Mengubah teks 'read more' secara dinamis berdasarkan judul lokasi pada Post Type RM Locations.
 * Version: 1.0
 * Author: Brofit
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function aki_dynamic_read_more_text( $html ) {
    // Pastikan ini hanya berjalan di Post Type RM Locations
    if ( 'rm_locations' === get_post_type() ) {
        // Ambil judul post saat ini
        $title = get_the_title();
        
        // Bersihkan kata "Toko" jika Mas ingin teks lebih ringkas, 
        // misal dari "Toko Aki Klaten" jadi "Aki Klaten"
        $display_title = str_replace('Toko ', '', $title);
        
        $new_text = 'Selengkapnya ' . $display_title;
        
        // Ganti teks 'read more' bawaan Divi dengan teks dinamis
        $html = str_replace( 'read more', $new_text, $html );
    }
    return $html;
}

add_filter( 'et_get_the_relative_custom_excerpts', 'aki_dynamic_read_more_text' );