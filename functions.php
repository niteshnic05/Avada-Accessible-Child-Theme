<?php

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', wp_get_theme()->get('Version'));
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/script.js', wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

function avada_child_add_custom_accessibility_options($sections) {
    // Add new section to Avada options
    $sections['custom_accessibility_options'] = array(
        'label'    => esc_html__('Accessibility Options', 'Avada'),
        'id'       => 'custom_accessibility_options',
        'icon'     => 'fa fa-universal-access',
        'fields'   => array(
            array(
                'type'        => 'select',
                'label'     => esc_html__('Focus Outline Style', 'Avada'),
                'description' => esc_html__('Select the style for focus outline.', 'Avada'),
                'id'          => 'focus_outline_style',
                'default'     => 'solid',
                'choices'     => array(
                    'solid'  => esc_html__('Solid', 'Avada'),
                    'dashed' => esc_html__('Dashed', 'Avada'),
                    'dotted' => esc_html__('Dotted', 'Avada'),
                    'double' => esc_html__('Double', 'Avada'),
                    'none'   => esc_html__('None', 'Avada'),
                ),
                'css_vars'    => [
                        [
                            'name'    => '--avada-cr-focus-outline-style',
                            'element' => 'body',
                        ],
                    ],
            ),
            array(
                'type'        => 'text',
                'label'     => esc_html__('Focus Outline Width (px)', 'Avada'),
                'description' => esc_html__('Enter the width of the outline in pixels.', 'Avada'),
                'id'          => 'focus_outline_width',
                'default'     => '2',
                'css_vars'    => [
                        [
                            'name'    => '--avada-cr-focus-outline-width',
                            'element' => 'body',
                        ],
                    ],
            ),
            array(
                'type'        => 'color-alpha',
                'label'     => esc_html__('Focus Outline Color', 'Avada'),
                'description' => esc_html__('Select the color for the outline.', 'Avada'),
                'id'          => 'focus_outline_color',
                'default'     => '#000000',
                'css_vars'    => [
                        [
                            'name'    => '--avada-cr-focus-outline-color',
                            'element' => 'body',
                        ],
                    ],
            ),
            array(
                'type'        => 'text',
                'label'     => esc_html__('Focus Outline Offset (px)', 'Avada'),
                'description' => esc_html__('Enter the offset of the outline in pixels.', 'Avada'),
                'id'          => 'focus_outline_offset',
                'default'     => '1',
                'css_vars'    => [
                        [
                            'name'    => '--avada-cr-focus-outline-offset',
                            'element' => 'body',
                        ],
                    ],
            ),
            array(
                'type'        => 'select',
                'label'     => esc_html__('Focus Trigger', 'Avada'),
                'description' => esc_html__('Enable focus outline only for keyboard focus or for both mouse click and keyboard tab focus.', 'Avada'),
                'id'          => 'focus_trigger',
                'default'     => 'keyboard',
                'choices'     => array(
                    'keyboard' => esc_html__('Keyboard Focus Only', 'Avada'),
                    'both'     => esc_html__('Both Mouse Click and Keyboard Tab Focus', 'Avada'),
                ),
            ),
            array(
                'type'        => 'heading',
                'label'     => esc_html__('External Link Accessibility', 'Avada'),
                'description' => esc_html__('Customize the accessibility options for external links.', 'Avada'),
                'id'          => 'external_link_accessibility_heading',
            ),
            array(
                'type'        => 'text',
                'label'     => esc_html__('External URL Example Text', 'Avada'),
                'description' => esc_html__('Enter the example text for external URLs. Example: Open in new tab', 'Avada'),
                'id'          => 'external_url_example_text',
                'default'     => esc_html__('Open in new tab', 'Avada'),
            ),
            array(
                'type'        => 'select',
                'label'     => esc_html__('External Link Accessible Text', 'Avada'),
                'description' => esc_html__('Choose how the accessible text should be added for external links.', 'Avada'),
                'id'          => 'external_link_accessible_text_type',
                'default'     => 'sr-only',
                'choices'     => array(
                    'sr-only'   => esc_html__('As sr-only text', 'Avada'),
                    'aria-label'=> esc_html__('As aria-label text', 'Avada'),
                ),
            ),
            array(
                'type'        => 'select',
                'label'     => esc_html__('Show Accessible Text as Tooltip', 'Avada'),
                'description' => esc_html__('Show the accessible text for external links as a tooltip.', 'Avada'),
                'id'          => 'external_link_tooltip',
                'default'     => 'no',
                'choices'     => array(
                    'yes' => esc_html__('Yes', 'Avada'),
                    'no'  => esc_html__('No', 'Avada'),
                ),
                'dependency'  => array(
                    array(
                        'field'      => 'external_link_accessible_text_type',
                        'value'      => 'sr-only',
                        'comparison' => '==',
                    ),
                ),
                ),
        ),
    );

    return $sections;
}
add_filter('avada_options_sections', 'avada_child_add_custom_accessibility_options');

function avada_child_apply_custom_focus_styles() {
    $focus_outline_style = Avada()->settings->get('focus_outline_style');
    $focus_outline_width = Avada()->settings->get('focus_outline_width');
    $focus_outline_color = Avada()->settings->get('focus_outline_color');
    $focus_outline_offset = Avada()->settings->get('focus_outline_offset');
    $focus_trigger = Avada()->settings->get('focus_trigger', 'keyboard');
    $external_link_text = Avada()->settings->get('external_url_example_text');
    $external_link_text_type = Avada()->settings->get('external_link_accessible_text_type');
    $external_link_tooltip = Avada()->settings->get('external_link_tooltip');
    
    $custom_css = "";

    if ($focus_trigger === 'keyboard') {
        $custom_css .= "
            *:focus {
                outline: none;
            }

            *:focus-visible {
                outline: {$focus_outline_width}px {$focus_outline_style} {$focus_outline_color} !important;
                outline-offset: {$focus_outline_offset}px !important;
            }
        ";
    } else {
        $custom_css .= "
            *:focus {
                outline: {$focus_outline_width}px {$focus_outline_style} {$focus_outline_color} !important;
                outline-offset: {$focus_outline_offset}px !important;
            }
        ";
    }

    wp_add_inline_style('avada-stylesheet', $custom_css);

// External link accessibility script
add_action('wp_footer', function() use ($external_link_text, $external_link_text_type, $external_link_tooltip) {

    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var links = document.querySelectorAll('a[target="_blank"]');
            links.forEach(function(link) {
                var accessibleText = '<?php echo esc_js($external_link_text); ?>';
                if ('<?php echo esc_js($external_link_text_type); ?>' === 'sr-only') {
                    var span = document.createElement('span');
                    span.className = 'sr-only';
                    span.textContent = accessibleText;
                    link.appendChild(span);
                    if ('<?php echo esc_js($external_link_tooltip); ?>' === 'yes') {
                        link.setAttribute('title', accessibleText);
                    }
                } else if ('<?php echo esc_js($external_link_text_type); ?>' === 'aria-label') {
                    var existingAriaLabel = link.getAttribute('aria-label');
                    if (existingAriaLabel) {
                        link.setAttribute('aria-label', existingAriaLabel + ' ' + accessibleText);
                    } else {
                        var linkText = link.textContent.trim();
                        link.setAttribute('aria-label', linkText + ' ' + accessibleText);
                    }
                }
            });
        });
    </script>
    <?php
});
}
add_action('wp_enqueue_scripts', 'avada_child_apply_custom_focus_styles', 20);







