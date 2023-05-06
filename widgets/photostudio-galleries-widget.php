<?php

class Photostudio_Galleries_Widget extends WP_Widget {

    // Конструктор за инициализация на виджета
    function __construct() {
        parent::__construct(
            'photostudio_galleries_widget',
            esc_html__('Photo Studio Galleries', 'photostudio'),
            array('description' => esc_html__('Displays a list of photo galleries', 'photostudio'))
        );
    }

    // Метод за изграждане на формата за настройка на виджета
    public function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $count = isset($instance['count']) ? absint($instance['count']) : 5;

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'photostudio'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Number of galleries to show:', 'photostudio'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="number" min="1" max="10" step="1" value="<?php echo esc_attr($count); ?>">
        </p>
        <?php
    }

    // Метод за запазване на настройките на виджета
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['count'] = (!empty($new_instance['count'])) ? absint($new_instance['count']) : 5;
        return $instance;
    }

    // Метод за извеждане на виджета
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $count = absint($instance['count']);

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $args = array(
            'post_type' => 'photostudio_gallery',
            'posts_per_page' => $count,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<ul>';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo esc_html__('No galleries found', 'photostudio');
        }

        wp_reset_postdata();
        echo $args['after_widget'];
    }

}

// Регистриране на виджета
function register_photostudio_galleries_widget() {
  register_widget('Photostudio_Galleries_Widget');
}
add_action('widgets_init', 'register_photostudio_galleries_widget');
