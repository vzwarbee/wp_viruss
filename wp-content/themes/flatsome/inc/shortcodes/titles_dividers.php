<?php
// [title]
function title_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    '_id' => 'title-'.rand(),
    'text' => 'Lorem ipsum dolor sit amet...',
    'tag_name' => 'h3',
    'style' => 'normal',
    'size' => '100',
    'margin_top' => '',
    'margin_bottom' => '',
    'color' => '',
    'width' => '',
    'icon' => '',
    'link_text' => '',
    'link' => '',
    'target' => '',
    'rel' => '',
    'class' => '',
    'visibility' => '',
	// Deprecated.
    'letter_case' => '',
    'sub_text' => '',
  ), $atts ) );

	if ( ! preg_match( '/^h[1-6]$/', trim( $tag_name ) ) ) $tag_name = 'h3';

  $classes = array('container', 'section-title-container');
  if ( $class ) $classes[] = $class;
  if ( $visibility ) $classes[] = $visibility;
  $classes = implode(' ', $classes);


	$link_atts   = array(
		'href'   => esc_url( $link ),
		'target' => esc_attr( $target ),
		'rel'    => array( esc_attr( $rel ) ),
	);
	$link_output = '';
	if ( $link_text ) {
		$link_output = sprintf( '<a %s>%s%s</a>',
			flatsome_html_atts( $link_atts ),
			wp_kses_post( $link_text ),
			get_flatsome_icon( 'icon-angle-right' )
		);
	}

  $small_text = '';
  if($sub_text) $small_text = '<small class="sub-title">' . wp_kses_post( $atts['sub_text'] ) . '</small>';

  if($icon) $icon = get_flatsome_icon($icon);

  // fix old
  if($style == 'bold_center') $style = 'bold-center';

  $css_args = array(
   array( 'attribute' => 'margin-top', 'value' => $margin_top),
   array( 'attribute' => 'margin-bottom', 'value' => $margin_bottom),
  );

  if($width) {
    $css_args[] = array( 'attribute' => 'max-width', 'value' => $width);
  }

  $css_args_title = array();

  if($size !== '100'){
    $css_args_title[] = array( 'attribute' => 'font-size', 'value' => $size, 'unit' => '%');
  }
  if($color){
    $css_args_title[] = array( 'attribute' => 'color', 'value' => $color);
  }

  return '<div class="' . esc_attr( $classes ) . '" ' . get_shortcode_inline_css($css_args) . '><'. $tag_name . ' class="section-title section-title-' . esc_attr( $style ) . '"><b></b><span class="section-title-main" '.get_shortcode_inline_css($css_args_title).'>' . $icon . wp_kses_post( $text ) . $small_text . '</span><b></b>' . $link_output . '</' . $tag_name . '></div>';
}
add_shortcode('title', 'title_shortcode');


// [divider]
function divider_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'width' => '',
    'height' => '',
    'margin' => '',
    'align' => '',
    'color' => '',
  ), $atts ) );

$align_end ='';
$align_start = '';


// Fallback
if($width == 'full') $width = '100%';

$css_args = array(
  array( 'attribute' => 'margin-top', 'value' => $margin),
  array( 'attribute' => 'margin-bottom', 'value' => $margin),
  array( 'attribute' => 'max-width', 'value' => $width ),
  array( 'attribute' => 'height', 'value' => $height ),
  array( 'attribute' => 'background-color', 'value' => $color ),
);

if($align === 'center'){
  $align_start ='<div class="text-center">';
  $align_end = '</div>';
}
if($align === 'right'){
  $align_start ='<div class="text-right">';
  $align_end = '</div>';
}
return $align_start.'<div class="is-divider divider clearfix" '.get_shortcode_inline_css($css_args).'></div>'.$align_end;

}
add_shortcode('divider', 'divider_shortcode');
