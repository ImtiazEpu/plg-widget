<?php
	
	class DemoWidget extends WP_Widget {
		
		function __construct() {
			parent::__construct(
				'Demo_Widget',
				esc_html__( 'SC: Demo Widget', 'sourcecypher' ),
				array( 'description' => esc_html__( 'Our Widget Description', 'sourcecypher' ), ) // Args
			);
		}
		
		
		/**
		 * @param array $instance
		 *
		 * @return string|void
		 */
		public function form( $instance ) {
			$title     = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$latitude  = ! empty( $instance['latitude'] ) ? $instance['latitude'] : 23.9;
			$longitude = ! empty( $instance['longitude'] ) ? $instance['longitude'] : 90.8;
			$email     = ! empty( $instance['email'] ) ? $instance['email'] : 'info@imtiazepu.com';
			//$textarea = ! empty( $instance['textarea'] ) ? $instance['textarea'] : '';
			?>

            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
                       name="<?php echo $this->get_field_name( 'title' ); ?>"
                       value="<?php echo esc_attr( $title ); ?>"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'latitude' ); ?>">Latitude:</label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'latitude' ); ?>"
                       name="<?php echo $this->get_field_name( 'latitude' ); ?>"
                       value="<?php echo esc_attr( $latitude ); ?>"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'longitude' ); ?>">Longitude:</label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'longitude' ); ?>"
                       name="<?php echo $this->get_field_name( 'longitude' ); ?>"
                       value="<?php echo esc_attr( $longitude ); ?>"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'email' ); ?>">Email:</label>
                <input class="widefat" type="email" id="<?php echo $this->get_field_id( 'email' ); ?>"
                       name="<?php echo $this->get_field_name( 'email' ); ?>"
                       value="<?php echo esc_attr( $email ); ?>"/>
            </p>

            <!--<label for="<?php /*echo $this->get_field_id( 'textarea' ); */ ?>"></label>
            <textarea class="widefat" name="<?php /*echo $this->get_field_name( 'textarea' ); */ ?>"
                      id="textarea" cols="30"
                      rows="10"><?php /*echo esc_attr( $textarea ); */ ?></textarea>-->
			
			<?php
			
			/*$editor_id = $this->get_field_id( 'textarea' );
			
			$setting = array(
				'textarea_rows' => 12,
				'editor_class'  => 'textarea',
				'textarea_name' => $this->get_field_name( 'textarea' ),
				'teeny'         => true
			
			);
			wp_editor( $textarea, $editor_id, $setting );*/
			
		}
		
		//End method form
		
		
		/**
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			//print_r($args);
			echo $args['before_widget'];
			if ( isset( $instance['title'] ) && $instance['title'] != '' ) {
				echo $args['before_title'];
				echo apply_filters( 'widget_title', $instance['title'] );
				echo $args['after_title'];
				?>
                <div class="demowidget <?php echo esc_attr( $args['id'] ); ?>">
                    <p>Latitude: <?php echo isset( $instance['latitude'] ) ? $instance['latitude'] : 'N/A'; ?></p>
                    <p>Longitude: <?php echo isset( $instance['longitude'] ) ? $instance['longitude'] : 'N/A'; ?></p>
                    <p>Email: <?php echo isset( $instance['email'] ) ? $instance['email'] : 'N/A'; ?></p>
                </div>
				<?php
			}
			echo $args['after_widget'];
		}
		
		//End method widget
		
		function update( $new_instance, $old_instance ) {
			
			$instance = $new_instance;
			
			$new_instance['title'] = sanitize_text_field( $instance['title'] );
			
			$email = $new_instance['email'];
			if ( ! is_email( $email ) ) {
				$instance['email'] = $old_instance['email'];
			}
			if ( ! is_numeric( $new_instance['latitude'] ) ) {
				$instance['latitude'] = $old_instance['latitude'];
			}
			if ( ! is_numeric( $new_instance['longitude'] ) ) {
				$instance['longitude'] = $old_instance['longitude'];
			}
			
			return $instance;
		}
		
	}