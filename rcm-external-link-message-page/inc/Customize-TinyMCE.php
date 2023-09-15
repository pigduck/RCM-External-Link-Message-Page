<?php

namespace rcm_eump_transparencyreport;

if (class_exists('WP_Customize_Control')) {

    class WP_Customize_Tiny_Control extends \WP_Customize_Control
    {
        function __construct($manager, $id, $options) {
            parent::__construct($manager, $id, $options);

            global $num_customizer_teenies_initiated;
            $num_customizer_teenies_initiated = empty($num_customizer_teenies_initiated)
                ? 1
                : $num_customizer_teenies_initiated + 1;
        }
        function render_content() {
            global $num_customizer_teenies_initiated, $num_customizer_teenies_rendered;
            $num_customizer_teenies_rendered = empty($num_customizer_teenies_rendered)
                ? 1
                : $num_customizer_teenies_rendered + 1;

            $value = $this->value();
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <input id="<?php echo esc_attr($this->id); ?>-link" class="wp-editor-area" type="hidden" <?php esc_url($this->link()); ?> value="<?php echo esc_textarea($value); ?>">
                <?php
                wp_editor($value, $this->id, [
                    'textarea_name' => $this->id,
                    'media_buttons' => true,
                    'drag_drop_upload' => false,
                    'teeny' => true,
                    'textarea_rows' => 5,
                    'quicktags' => true,
                    'tinymce' => [
                      'setup' => "function (editor) {
                          var cb = function () {
                            var linkInput = document.getElementById('$this->id-link')
                            linkInput.value = editor.getContent()
                            linkInput.dispatchEvent(new Event('change'))
                          }
                          editor.on('Change', cb)
                          editor.on('Undo', cb)
                          editor.on('Redo', cb)
                          editor.on('KeyUp', cb) // Remove this if it seems like an overkill
                      }"
                    ]
                ]);
                ?>
            </label>
            <?php
            if ($num_customizer_teenies_rendered == $num_customizer_teenies_initiated)
                do_action('admin_print_footer_scripts');

        }
    }
}