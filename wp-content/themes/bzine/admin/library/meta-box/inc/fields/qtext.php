<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Qtext_Field' ) )
{
	class RWMB_Qtext_Field
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field )
		{
			$html ='';
			//$getall ='';
			$i = 0;
			
			if(!is_array($meta)){
				$meta['default'] = (isset($meta['defalut'])) ? $meta['defalut'] : '';
				if(function_exists(qtrans_getSortedLanguages)){
					$languages = qtrans_getSortedLanguages();
					foreach ($languages as $lang){
						$meta[$lang] = (isset($meta[$lang])) ? $meta[$lang] : '';
					}
				}
			}
			
			$html .= sprintf(
				'<span style="display: block;">Default</span> <input type="text" name="%s[default]" id="%s[default]" value="%s" size="%s"  class="rwmb-text %s"/>'.'<br />',
				$field['field_name'],
				$field['id'],
				$meta['default'],
				$field['size'],
				$field['class']
			);
			if(function_exists(qtrans_getSortedLanguages)){
				$languages = qtrans_getSortedLanguages();
				//print_r($languages);
				foreach ($languages as $lang){
				//$meta = $lang;
					$i++;
				//	$html .= 'jfslfjsldfj '.$i++;
				//	$html .= 'xxx '.$i++;
				$html .= sprintf(
					'<span style="display: block;">'.qtrans_getLanguageName($lang) . '</span> <input type="text" class="rwmb-text" name="%s['.$lang.']" id="%s['.$lang.']" value="%s" size="%s"  />'.'<br />',
					$field['field_name'],
					$field['id'],
					$meta[$lang],
					$field['size']
				);
				//$getall .= '[:'.$lang.']'.$meta[$lang].' ';
				//save( $new, $old, $post_id, $field )
				//save( $new, $old, $post_id, $field );
				}
			}
			//$html .=$field['id'];
			//$html .=$field['field_name'];
			//$field['field_name['translate']'] = 'paijo';
		/* 	$html .= sprintf('<input type="hidden" name="%s['."translate".']" id="%s" value="'.$getall.'"  />',
					$field['field_name'],
					$field['id']
			); */
			
			//var_dump($getall);
			return $html;
		}

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field = wp_parse_args( $field, array(
				'size' => 40,
			) );
			return $field;
		}
	}
}