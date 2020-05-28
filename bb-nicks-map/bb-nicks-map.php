<?php

    class NicksMapModuleClass extends FLBuilderModule {

        public function __construct()
        {
            parent::__construct([
                'name'            => __( 'Nick\'s Map Module', 'fl-builder' ),
                'description'     => __( 'It\'s a map module', 'fl-builder' ),
                'group'           => __( 'Nick\'s Custom Group', 'fl-builder' ),
                'category'        => __( 'Nick\'s Custom Category', 'fl-builder' ),
                'dir'             => NICKS_MODULES_DIR . 'bb-nicks-map/',
                'url'             => NICKS_MODULES_URL . 'bb-nicks-map/',
                'icon'            => 'button.svg',
                'editor_export'   => true, // Defaults to true and can be omitted.
                'enabled'         => true, // Defaults to true and can be omitted.
                'partial_refresh' => false, // Defaults to false and can be omitted.
            ]);
        }
    }

    FLBuilder::register_module('NicksMapModuleClass', [
        'map_tab' => [
            'title' => __('Map Settings', 'fl-builder'),
            'sections' => [
                'api_section' => [
                    'title' => 'API Settings', 'fl-builder',
                    'fields'        => [
                        'api_key'     => [
                            'type'          => 'text',
                            'label'         => __( 'Google Maps API Key', 'fl-builder' ),
                        ],
                    ]
                ],
                'map_section' => [
                    'title' => 'Map Settings', 'fl-builder',
                    'fields' => [
                        'map_title' => [
                            'type' => 'text',
                            'label' => __( 'Map Title', 'fl-builder' )
                        ],
                        'font_size' => [
                            'type' => 'unit',
                            'label' => 'Font Size',
                            'description' => 'px',
                            'placeholder' => 24,
                            'responsive' => true
                        ]
                    ]
                        ],
                'location_section' => [
                    'title' => 'Location Settings', 'fl-builder',
                    'fields' => [
                        'location_field' => [
                            'type' => 'form',
                            'label' => __('Restaurant', 'fl-builder'),
                            'form' => 'restaurants_form_field',
                            'multiple' => true
                        ]
                    ]
                ]
            ]
        ]
    ]);

    FLBuilder::register_settings_form('restaurants_form_field', [
        'title' => __('Restaurant', 'fl-builder'),
        'tabs'  => [
            'general'      => [
                'title'         => __('General', 'fl-builder'),
                'sections'      => [
                    'general'       => [
                        'title'         => 'General',
                        'fields'        => [
                            'name'         => [
                                'type'          => 'text',
                                'label'         => __('Restaurant Name', 'fl-builder'),
                            ],
                            'description' => [
                                'type' => 'text',
                                'label' => __('Restaurant Description', 'fl-builder')
                            ]
                        ]
                    ],
                    'location_information' => [
                        'title' => 'Location Information',
                        'fields' => [
                            'lat' => [
                                'type'          => 'text',
                                'label'         => __('Restaurant Latitude', 'fl-builder')
                            ],
                            'lng' => [
                                'type' => 'text',
                                'label' => __('Restaurant Longitude', 'fl-builder')
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]);