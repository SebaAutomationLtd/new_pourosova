<?php

return [
    'mode' => '',
    'format' => 'A4',
    'default_font_size' => '12',
    'default_font' => 'solaimanlipi',
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 10,
    'margin_bottom' => 10,
    'margin_header' => 5,
    'margin_footer' => 0,
    'orientation' => 'P',
    'title' => 'Laravel mPDF',
    'author' => '',
    'watermark' => '',
    'show_watermark' => false,
    'watermark_font' => 'solaimanlipi',
    'display_mode' => 'fullpage',
    'watermark_text_alpha' => 0.1,
    'custom_font_dir' => public_path('fonts/'), // don't forget the trailing slash!
	'custom_font_data' => [
		'kalpurush' => [
			'R'  => 'kalpurush.ttf',    // regular font
		],
        'solaimanlipi' => [
            'R'  => 'solaimanlipi.ttf',    // regular font
        ],
        'SutonnyOMJ' => [
            'R'  => 'SutonnyOMJ.ttf',    // regular font
        ]
	],
    'auto_language_detection' => false,
    'temp_dir' => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
    'pdfa' => false,
    'pdfaauto' => false,
    'use_active_forms' => false,
];


?>
