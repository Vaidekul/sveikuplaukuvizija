<?php
/**
* KW
*/

$param = array(
	'name'				=> esc_attr__( 'Milestone Counter', 'sobari_sc' ),
	'base'				=> 'milestone',
	'category'	=> array( 'Content' ),
	'description'		=> esc_attr__( 'Show animated milestone', 'sobari_sc' ),
	'icon'				=> DAHZEXTENDER_SHORTCODE_URI . "assets/images/icon/df_element-icon-milestone.svg",
	'params'			=> array()
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Counter', 'sobari_sc' ),
	'param_name'	=> 'milestone_counter',
	'std'				=> '789',
	'description'	=> esc_attr__( 'The number/count of your milestone e.g. "13"', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Milestone Number Inherit Font', 'sobari_sc' ),
	'param_name'	=> 'milestone_number_font_family',
	'std'			=> 'primary',
	'value'			=> array(
		'Primary Font'      => 'primary',
		'Secondary Font'    => 'secondary',
	),
	'description'	=> esc_attr__( 'Please select if you would like your milestone number to inherit a font family.', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Symbol', 'sobari_sc' ),
	'param_name'	=> 'milestone_symbol',
	'std'			=> '$',
	'description'	=> esc_attr__( 'Input a prefix to the value e.g "$"', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Milestone Symbol Position', 'sobari_sc' ),
	'param_name'	=> 'milestone_symbol_position',
	'std'			=> 'prefix',
	'value'			=> array(
		'Before Counter'    => 'prefix',
		'After Counter'     => 'suffix',
	)
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Milestone Symbol Alignment', 'sobari_sc' ),
	'param_name'	=> 'milestone_symbol_alignment',
	'std'			=> 'default',
	'value'			=> array(
		'Default'        => 'default',
		'Superscript'    => 'superscript',
	),
	'description'	=> esc_attr__( 'Please select the alignment you desire for your symbol', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Title', 'sobari_sc' ),
	'param_name'	=> 'milestone_title',
	'std'			=> 'Total Payment',
	'description'	=> esc_attr__( 'The title of your milestones e.g. "Project Completed"', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Subtitle', 'sobari_sc' ),
	'param_name'	=> 'milestone_subtitle',
	'description'	=> esc_attr__( 'The subtitle of your milestones e.g. "Project Completed"', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'dropdown',
	'heading'		=> esc_attr__( 'Milestone Alignment', 'sobari_sc' ),
	'param_name'	=> 'milestone_alignment',
	'std'			=> 'top',
	'value'			=> array(
		'Left'      => 'top',
		'Center'    => 'middle',
		'Right'     => 'bottom',
	),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Counter Font Size', 'sobari_sc' ),
	'param_name'	=> 'milestone_counter_font_size',
	'std'			=> '64px',
	'group'         => __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Symbol Font Size', 'sobari_sc' ),
	'param_name'	=> 'milestone_symbol_font_size',
	'std'			=> '48px',
	'group'         => __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Milestone Counter & Symbol Color', 'sobari_sc' ),
	'param_name'	=> 'milestone_counter_symbol_color',
	'std'			=> '#0e0e0e',
	'group' => __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Font Title Size', 'sobari_sc' ),
	'param_name'	=> 'milestone_font_title_size',
	'std'			=> '16px',
	'group'         => __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Milestone Title Color', 'sobari_sc' ),
	'param_name'	=> 'milestone_title_color',
	'std'			=> '#545454',
	'group' => __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'textfield',
	'heading'		=> esc_attr__( 'Milestone Font Subtitle Size', 'sobari_sc' ),
	'param_name'	=> 'milestone_font_subtitle_size',
	'std'			=> '16px',
	'group'         => __( 'Styling', 'sobari_sc' ),
);
$param['params'][] = array(
	'type'			=> 'colorpicker',
	'heading'		=> esc_attr__( 'Milestone Subtitle Color', 'sobari_sc' ),
	'param_name'	=> 'milestone_subtitle_color',
	'std'			=> '#545454',
	'group' => __( 'Styling', 'sobari_sc' ),
);
return $param;
