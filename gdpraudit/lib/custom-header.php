<?php // <- Don't add me in
// Gist updated to use code from Genesis Framework 2.4.2
//remove initial header functions
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_header', 'genesis_do_header' );
//add in the new header markup - prefix the function name - here sm_ is used
add_action( 'genesis_header', 'sm_genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'sm_genesis_header_markup_close', 15 );
add_action( 'genesis_header', 'sm_genesis_do_header' );

//New Header functions
function sm_genesis_header_markup_open() {
 genesis_markup( array(
 'html5' => '<header %s>',
 'context' => 'site-header',
 ) );
 /* Added in content
 echo '<div class="header-ghost"></div>';
 */
 genesis_structural_wrap( 'header' );
}
function sm_genesis_header_markup_close() {
 genesis_structural_wrap( 'header', 'close' );
 genesis_markup( array(
 'close' => '</header>',
 'context' => 'site-header',
 ) );
}

function sm_genesis_do_header() {
 global $wp_registered_sidebars;
 genesis_markup( array(
 'open' => '<div %s>',
 'context' => 'title-area',
 ) );
 // Added in content
 echo '<div class="site-id">
 		<a class="site-logo" href="' . esc_url( home_url( '/' ) ) . '">

      <svg id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255 33.63">
        <title>GDPR Audit</title>
        <defs>
          <style>
            .cls-1 {
              fill: #142e3d;
            }
            .cls-2 {
              fill: #62888d;
            }
          </style>
        </defs>
        <g id="gdpr">
          <g>
            <path class="cls-1" d="M33.13,16.68c0,9.58-6.54,17.06-16.12,17.06A16.75,16.75,0,0,1-.1,16.9C-.1,7.46,7.34.11,17.23.11A17.56,17.56,0,0,1,29.08,4.43l-6.24,6.82a8.23,8.23,0,0,0-5.61-2.1A7.59,7.59,0,0,0,9.48,16.9c0,4.37,3.12,7.93,7.53,7.93a6.5,6.5,0,0,0,6-3.16l-5.94,0V13.92H33S33.13,15.43,33.13,16.68Z" transform="translate(0.1 -0.11)"/>
            <path class="cls-1" d="M38.11.78H48.8c10.43,0,15.6,7,15.6,16.12S59.23,33.07,48.8,33.07H38.11ZM48.8,24.3c4.41,0,6-2.85,6-7.4s-1.61-7.35-6-7.35H47.69V24.3Z" transform="translate(0.1 -0.11)"/>
            <path class="cls-1" d="M92.42,11A10.11,10.11,0,0,1,82,21.22H78.7V33.07H69.12V.78H82A10.14,10.14,0,0,1,92.42,11Zm-9.31.09A2.29,2.29,0,0,0,80.7,8.8h-2v4.67h2A2.3,2.3,0,0,0,83.11,11.11Z" transform="translate(0.1 -0.11)"/>
            <path class="cls-1" d="M106.34,21.27v11.8H96.77V.78H109.6a10.14,10.14,0,0,1,10.47,10.29,10.13,10.13,0,0,1-4.37,8.42l8.9,13.58H113.9Zm0-12.47v5.83h1.43a2.84,2.84,0,0,0,3-2.89,2.84,2.84,0,0,0-3-2.94Z" transform="translate(0.1 -0.11)"/>
          </g>
        </g>
        <g id="audit">
          <g>
            <path class="cls-2" d="M135.64.23h.09L150.4,33.07h-3.59l-3.46-7.8H128l-3.36,7.8H121Zm6.46,22.21c-2.34-5.34-4.36-10-6.42-15.08-2.06,5.07-4.08,9.74-6.42,15.08Z" transform="translate(0.1 -0.11)"/>
            <path class="cls-2" d="M178.94,22c0,7.31-4.53,11.66-12.12,11.66S154.75,29.26,154.75,22V.76h3.41v21c0,5.43,3.23,8.66,8.66,8.66s8.71-3.23,8.71-8.66V.76h3.41Z" transform="translate(0.1 -0.11)"/>
            <path class="cls-2" d="M186.92,33.07V.76h8.93C205.5.76,212.9,7,212.9,16.92S205.59,33.07,196,33.07Zm3.41-29.43V30.2H196c7.58,0,13.37-5.16,13.37-13.28S203.57,3.64,195.8,3.64Z" transform="translate(0.1 -0.11)"/>
            <path class="cls-2" d="M221.25,33.07V.76h3.41V33.07Z" transform="translate(0.1 -0.11)"/>
            <path class="cls-2" d="M244.94,3.64V33.07h-3.41V3.64h-9.92V.76H254.9V3.64Z" transform="translate(0.1 -0.11)"/>
          </g>
        </g>
      </svg>

 	  </a>';
 do_action( 'genesis_site_title' );
 do_action( 'genesis_site_description' );
 
 genesis_markup( array(
 'close' => '</div></div>',
 'context' => 'title-area',
 ) );
 if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
 genesis_markup( array(
 'open' => '<div %s>' . genesis_sidebar_title( 'header-right' ),
 'context' => 'header-widget-area',
 ) );
 do_action( 'genesis_header_right' );
 add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
 add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
 dynamic_sidebar( 'header-right' );
 remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
 remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
 genesis_markup( array(
 'close' => '</div>',
 'context' => 'header-widget-area',
 ) );
 }
}