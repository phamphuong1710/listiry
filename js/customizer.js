/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Copyright
	wp.customize( 'copy_right', function( value ) {
		value.bind( function( to ) {
			$( '.copy-right' ).html( to );
		} );
	} );
	wp.customize( 'list_contact', function( value ) {
		value.bind( function( to ) {
			$( '.menu-footer' ).html( to );
		} );
	} );
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-info').css('background-color', newval );
		} );
	} );
	wp.customize( 'footer_bg_bottom_color', function( value ) {
		value.bind( function( newval ) {
			$('.bottom-footer').css('background-color', newval );
		} );
	} );
		wp.customize( 'location', function( value ) {
		value.bind( function( to ) {
			$( '.map' ).text( to );
		} );
	} );
	wp.customize( 'form_contact', function( value ) {
		value.bind( function( to ) {
			$( '.form-contact' ).text( to );
		} );
	} );
} )( jQuery );
