<?php
function portfolio_clean( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'portfolio_clean', $var );
	} else {
		return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
	}
}

if( !class_exists('DahzExtender_Portfolios') ) {

	class DahzExtender_Portfolios {

		private $permalinks = array();

		function __construct(){

			add_action( 'init', array( $this, 'register_portfolio' ), 5 );

			add_action( 'init', array( $this, 'register_portfolio_taxonomies' ), 5 );

			add_action( 'set_object_terms', array( $this, 'force_default_portfolio_categories' ), 10, 5 );

			add_action( 'current_screen', array( $this, 'permalink_settings_screen' ) );

			add_filter( 'display_post_states', array( $this, 'portfolio_post_states' ), 10, 2 );

			add_filter( 'template_include', array( $this, 'portfolio_template_loader' ) );

			add_action( 'pre_get_posts', array( $this, 'portfolio_pre_get_posts' ) );

			add_filter( 'rewrite_rules_array', array( $this, 'portfolio_fix_rewrite_rules' ) );

			add_filter( 'post_type_link', array( $this, 'portfolio_post_type_link' ), 10, 2 );

			$this->save_permalink_settings();

			$this->permalinks = $this->get_permalink_structure();

		}

		function portfolio_post_type_link( $permalink, $post ) {
			// Abort if post is not a portfolio.
			if ( 'portfolio' !== $post->post_type ) {
				return $permalink;
			}

			// Abort early if the placeholder rewrite tag isn't in the generated URL.
			if ( false === strpos( $permalink, '%' ) ) {
				return $permalink;
			}

			// Get the custom taxonomy terms in use by this post.
			$terms = get_the_terms( $post->ID, 'portfolio_categories' );

			if ( ! empty( $terms ) ) {
				if ( function_exists( 'wp_list_sort' ) ) {
					$terms = wp_list_sort( $terms, 'term_id', 'ASC' );
				} else {
					usort( $terms, '_usort_terms_by_ID' );
				}
				$category_object = $terms[0];
				$category_object = get_term( $category_object, 'portfolio_categories' );
				$portfolio_categories = $category_object->slug;

				if ( $category_object->parent ) {
					$ancestors = get_ancestors( $category_object->term_id, 'portfolio_categories' );
					foreach ( $ancestors as $ancestor ) {
						$ancestor_object = get_term( $ancestor, 'portfolio_categories' );
						$portfolio_categories     = $ancestor_object->slug . '/' . $portfolio_categories;
					}
				}
			} else {
				// If no terms are assigned to this post, use a string instead (can't leave the placeholder there).
				$portfolio_categories = _x( 'uncategorized', 'slug', 'dahzextender' );
			}

			$find = array(
				'%year%',
				'%monthnum%',
				'%day%',
				'%hour%',
				'%minute%',
				'%second%',
				'%post_id%',
				'%category%',
				'%portfolio_categories%',
			);

			$replace = array(
				date_i18n( 'Y', strtotime( $post->post_date ) ),
				date_i18n( 'm', strtotime( $post->post_date ) ),
				date_i18n( 'd', strtotime( $post->post_date ) ),
				date_i18n( 'H', strtotime( $post->post_date ) ),
				date_i18n( 'i', strtotime( $post->post_date ) ),
				date_i18n( 's', strtotime( $post->post_date ) ),
				$post->ID,
				$portfolio_categories,
				$portfolio_categories,
			);

			$permalink = str_replace( $find, $replace, $permalink );

			return $permalink;
		}

		public function portfolio_fix_rewrite_rules( $rules ){

			global $wp_rewrite;

			$permalinks = $this->get_permalink_structure();

			if ( preg_match( '`/(.+)(/%portfolio_categories%)`', $permalinks['portfolio_rewrite_slug'], $matches ) ) {
				foreach ( $rules as $rule => $rewrite ) {
					if ( preg_match( '`^' . preg_quote( $matches[1], '`' ) . '/\(`', $rule ) && preg_match( '/^(index\.php\?portfolio_categories)(?!(.*portfolio))/', $rewrite ) ) {
						unset( $rules[ $rule ] );
					}
				}
			}
			// handle portfolio page subpages to avoid 404s.
			if ( ! $permalinks['use_verbose_page_rules'] ) {
				return $rules;
			}

			$portfolio_page_id = $this->get_page_id();

			if ( $portfolio_page_id ) {

				$page_rewrite_rules = array();

				$subpages = $this->dahzextender_get_page_children( $portfolio_page_id );
				// Subpage rules.
				foreach ( $subpages as $subpage ) {

					$uri = get_page_uri( $subpage );

					$page_rewrite_rules[ $uri . '/?$' ] = 'index.php?pagename=' . $uri;

					$wp_generated_rewrite_rules = $wp_rewrite->generate_rewrite_rules( $uri, EP_PAGES, true, true, false, false );

					foreach ( $wp_generated_rewrite_rules as $key => $value ) {
						$wp_generated_rewrite_rules[ $key ] = $value . '&pagename=' . $uri;
					}

					$page_rewrite_rules = array_merge( $page_rewrite_rules, $wp_generated_rewrite_rules );

				}

				// Merge with rules.
				$rules = array_merge( $page_rewrite_rules, $rules );
			}

			return $rules;

		}

		public function portfolio_pre_get_posts( $query ){

			if ( ! $query->is_main_query() ) {
				return;
			}
			// Fix portfolio feeds.
			if ( $query->is_feed() && $query->is_post_type_archive( 'portfolio' ) ) {
				$query->is_comment_feed = false;
			}

			if ( $query->is_page() && 'page' === get_option( 'show_on_front' ) && absint( $query->get( 'page_id' ) ) === $this->get_page_id() ) {
				// This is a front-page shop.
				$query->set( 'post_type', 'portfolio' );
				$query->set( 'page_id', '' );

				if ( isset( $query->query['paged'] ) ) {
					$query->set( 'paged', $query->query['paged'] );
				}

				// Get the actual WP page to avoid errors and let us use is_front_page().
				// This is hacky but works. Awaiting https://core.trac.wordpress.org/ticket/21096.
				global $wp_post_types;

				$portfolio_page = get_post( $this->get_page_id() );

				$wp_post_types['portfolio']->ID         = $portfolio_page->ID;
				$wp_post_types['portfolio']->post_title = $portfolio_page->post_title;
				$wp_post_types['portfolio']->post_name  = $portfolio_page->post_name;
				$wp_post_types['portfolio']->post_type  = $portfolio_page->post_type;
				$wp_post_types['portfolio']->ancestors  = get_ancestors( $portfolio_page->ID, $portfolio_page->post_type );

				// Fix conditional Functions like is_front_page.
				$query->is_singular          = false;
				$query->is_post_type_archive = true;
				$query->is_archive           = true;
				$query->is_page              = true;

				// Remove post type archive name from front page title tag.
				add_filter( 'post_type_archive_title', '__return_empty_string', 5 );

			} elseif ( ! $query->is_post_type_archive( 'portfolio' ) && ! $query->is_tax( get_object_taxonomies( 'portfolio' ) ) ) {
				return;
			}

			$query->set(
				'posts_per_page',
				$query->get( 'posts_per_page' ) ? $query->get( 'posts_per_page' ) : apply_filters( 'loop_portfolio_per_page', 8 )
			);

		}

		public function portfolio_template_loader( $template ){
			if ( is_embed() ) {
				return $template;
			}

			$default_file = '';

			if ( is_singular( 'portfolio' ) ) {
				$default_file = 'single-portfolio.php';
			} elseif ( is_post_type_archive( 'portfolio' ) || is_page( $this->get_page_id() ) ) {
				$default_file = 'archive-portfolio.php';
			} elseif ( is_tax( get_object_taxonomies( 'portfolio' ) ) ) {
				$object = get_queried_object();

				if ( is_tax( 'portfolio_categories' ) ) {
					$default_file = 'taxonomy-' . $object->taxonomy . '.php';
				} else {
					$default_file = 'archive-portfolio.php';
				}
			}

			if ( $default_file ) {

				$search_files = self::portfolio_template_loader_files( $default_file );

				$template = locate_template( $search_files );

				if ( ! $template ) {
					$template = DahzExtender()->plugin_path() . '/templates/' . $default_file;
				}

			}

			return $template;
		}

		private static function portfolio_template_loader_files( $default_file ) {

			$templates   = array();

			if ( is_page_template() ) {
				$templates[] = get_page_template_slug();
			}

			if ( is_singular( 'portfolio' ) ) {
				$object       = get_queried_object();
				$name_decoded = urldecode( $object->post_name );
				if ( $name_decoded !== $object->post_name ) {
					$templates[] = "single-portfolio-{$name_decoded}.php";
				}
				$templates[] = "single-portfolio-{$object->post_name}.php";
			}

			if ( is_tax( get_object_taxonomies( 'portfolio' ) ) ) {
				$object      = get_queried_object();
				$templates[] = 'taxonomy-' . $object->taxonomy . '-' . $object->slug . '.php';
				$templates[] = DahzExtender()->template_path() . 'taxonomy-' . $object->taxonomy . '-' . $object->slug . '.php';
				$templates[] = 'taxonomy-' . $object->taxonomy . '.php';
				$templates[] = DahzExtender()->template_path() . 'taxonomy-' . $object->taxonomy . '.php';
			}

			$templates[] = $default_file;
			$templates[] = DahzExtender()->template_path() . $default_file;

			return array_unique( $templates );
		}

		public function portfolio_post_states( $post_states, $post ){

			if ( $this->get_page_id() === $post->ID ) {
				$post_states['dahzextender_page_for_portfolio'] = __( 'Portfolio Page', 'dahzextender' );
			}

			return $post_states;

		}

		public function permalink_settings_screen(){

			if ( ! $screen = get_current_screen() ) {
				return;
			}

			if ( $screen->id === 'options-permalink' ) {
				add_settings_section( 'dahzextender-portfolio-permalink', __( 'Portfolio permalinks', 'dahzextender' ), array( $this, 'permalinks_settings' ), 'permalink' );

				add_settings_field(
					'dahzextender_portfolio_categories_slug',
					__( 'Portfolio categories base', 'dahzextender' ),
					array( $this, 'portfolio_categories_slug_input' ),
					'permalink',
					'optional'
				);
			}

		}

		public function register_portfolio_taxonomies(){
			if ( ! is_blog_installed() || taxonomy_exists( 'portfolio_categories' ) ) {
				return;
			}

			do_action( 'dahzextender_portfolio_register_taxonomy' );

			$permalinks = $this->get_permalink_structure();

			register_taxonomy( 'portfolio_categories',
				apply_filters( 'dahzextender_portfolio_categories_objects_post_type', array( 'portfolio' ) ),
				apply_filters( 'dahzextender_portfolio_categories_args',
					array(
						'hierarchical'          => true,
						'label'                 => __( 'Categories', 'dahzextender' ),
						'labels' 				=> array(
							'name'              => __( 'Portfolio categories', 'dahzextender' ),
							'singular_name'     => __( 'Category', 'dahzextender' ),
							'menu_name'         => _x( 'Categories', 'Admin menu name', 'dahzextender' ),
							'search_items'      => __( 'Search categories', 'dahzextender' ),
							'all_items'         => __( 'All categories', 'dahzextender' ),
							'parent_item'       => __( 'Parent category', 'dahzextender' ),
							'parent_item_colon' => __( 'Parent category:', 'dahzextender' ),
							'edit_item'         => __( 'Edit category', 'dahzextender' ),
							'update_item'       => __( 'Update category', 'dahzextender' ),
							'add_new_item'      => __( 'Add new category', 'dahzextender' ),
							'new_item_name'     => __( 'New category name', 'dahzextender' ),
							'not_found'         => __( 'No categories found', 'dahzextender' ),
						),
						'show_ui'               => true,
						'query_var'             => true,
						'rewrite'          		=> array(
							'slug'         		=> $permalinks['portfolio_category_rewrite_slug'],
							'with_front'   		=> false,
							'hierarchical' 		=> true,
						),
					)
				)
			);

			$default_category = (int) get_option( 'default_portfolio_categories', 0 );

			if ( ! $default_category || ! term_exists( $default_category, 'portfolio_categories' ) ) {
				$default_portfolio_categories_id   = 0;
				$default_portfolio_categories_slug = sanitize_title( _x( 'Uncategorized', 'Default category slug', 'dahzextender' ) );
				$default_portfolio_categories = get_term_by( 'slug', $default_portfolio_categories_slug, 'portfolio_categories' ); // @codingStandardsIgnoreLine.

				if ( $default_portfolio_categories ) {
					$default_portfolio_categories_id = absint( $default_portfolio_categories->term_taxonomy_id );
				} else {
					$result = wp_insert_term( _x( 'Uncategorized', 'Default category slug', 'dahzextender' ), 'portfolio_categories', array( 'slug' => $default_portfolio_categories_slug ) );

					if ( ! is_wp_error( $result ) && ! empty( $result['term_taxonomy_id'] ) ) {
						$default_portfolio_categories_id = absint( $result['term_taxonomy_id'] );
					}
				}

				if ( $default_portfolio_categories_id ) {
					update_option( 'default_portfolio_categories', $default_portfolio_categories_id );
				}
			}

			do_action( 'dahzextender_portfolio_after_register_taxonomy' );

		}

		public function register_portfolio(){

			if ( ! is_blog_installed() || post_type_exists( 'portfolio' ) ) {
				return;
			}

			do_action( 'dahzextender_register_portfolio' );

			$permalinks = $this->get_permalink_structure();

			$supports = array( 'title', 'editor', 'excerpt', 'thumbnail', 'publicize', 'wpcom-markdown', 'comments' );

			$portfolio_page_id = $this->get_page_id();

			// Define portfolio acrhive page title after assigned a page
			$portfolio_name = '';
			if ( $portfolio_page_id != 0 ) {
				$portfolio_name = get_the_title( $portfolio_page_id);
			} else {
				$portfolio_name = __( 'Portfolios', 'dahzextender' );
			}
			
			$has_archive  = $portfolio_page_id && get_post( $portfolio_page_id ) ? urldecode( get_page_uri( $portfolio_page_id ) ) : 'portfolio';

			register_post_type( 'portfolio',
				array(
					'labels'	=> array(
						'name'                  => $portfolio_name,
						'singular_name'         => __( 'Portfolio', 'dahzextender' ),
						'all_items'             => __( 'All Portfolios', 'dahzextender' ),
						'menu_name'             => _x( 'Portfolios', 'Admin menu name', 'dahzextender' ),
						'add_new'               => __( 'Add New', 'dahzextender' ),
						'add_new_item'          => __( 'Add new portfolio', 'dahzextender' ),
						'edit'                  => __( 'Edit', 'dahzextender' ),
						'edit_item'             => __( 'Edit portfolio', 'dahzextender' ),
						'new_item'              => __( 'New portfolio', 'dahzextender' ),
						'view_item'             => __( 'View portfolio', 'dahzextender' ),
						'view_items'            => __( 'View Portfolios', 'dahzextender' ),
						'search_items'          => __( 'Search Portfolios', 'dahzextender' ),
						'not_found'             => __( 'No Portfolios found', 'dahzextender' ),
						'not_found_in_trash'    => __( 'No Portfolios found in trash', 'dahzextender' ),
						'parent'                => __( 'Parent portfolio', 'dahzextender' ),
						'featured_image'        => __( 'Portfolio image', 'dahzextender' ),
						'set_featured_image'    => __( 'Set portfolio image', 'dahzextender' ),
						'remove_featured_image' => __( 'Remove portfolio image', 'dahzextender' ),
						'use_featured_image'    => __( 'Use as portfolio image', 'dahzextender' ),
						'insert_into_item'      => __( 'Insert into portfolio', 'dahzextender' ),
						'uploaded_to_this_item' => __( 'Uploaded to this portfolio', 'dahzextender' ),
						'filter_items_list'     => __( 'Filter Portfolios', 'dahzextender' ),
						'items_list_navigation' => __( 'Portfolios navigation', 'dahzextender' ),
						'items_list'            => __( 'Portfolios list', 'dahzextender' ),
					),
					'public'              => true,
					'show_ui'             => true,
					'map_meta_cap'        => true,
					'publicly_queryable'  => true,
					'exclude_from_search' => false,
					'hierarchical'        => false, // Hierarchical causes memory issues - WP loads all records!
					'rewrite'             => $permalinks['portfolio_rewrite_slug'] ? array( 'slug' => $permalinks['portfolio_rewrite_slug'], 'with_front' => false, 'feeds' => true ) : false,
					'query_var'           => true,
					'supports'            => $supports,
					'has_archive'         => $has_archive,
					'show_in_nav_menus'   => true,
					'show_in_rest'        => true,
					'menu_position'		  => 4
				)

			);

			do_action( 'dahzextender_after_register_portfolio' );

		}

		public function force_default_portfolio_categories( $object_id, $terms, $tt_ids, $taxonomy, $append ){

			if ( ! $append && 'portfolio_categories' === $taxonomy && empty( $tt_ids ) && 'portfolio' === get_post_type( $object_id ) ) {
				$default_term = absint( get_option( 'default_portfolio_categories', 0 ) );
				$tt_ids       = array_map( 'absint', $tt_ids );

				if ( $default_term && ! in_array( $default_term, $tt_ids, true ) ) {
					wp_set_post_terms( $object_id, array( $default_term ), 'portfolio_categories', true );
				}
			}

		}

		public function get_permalink_structure() {
			$saved_permalinks = (array) get_option( 'dahzextender_portfolio_permalinks', array() );
			$permalinks       = wp_parse_args( array_filter( $saved_permalinks ), array(
				'portfolio_base'			=> _x( 'portfolio', 'slug', 'dahzextender' ),
				'portfolio_category_base'	=> _x( 'portfolio-category', 'slug', 'dahzextender' ),
				'use_verbose_page_rules'	=> false,
			) );

			if ( $saved_permalinks !== $permalinks ) {
				update_option( 'dahzextender_portfolio_permalinks', $permalinks );
			}

			$permalinks['portfolio_rewrite_slug']   = untrailingslashit( $permalinks['portfolio_base'] );
			$permalinks['portfolio_category_rewrite_slug']  = untrailingslashit( $permalinks['portfolio_category_base'] );

			return $permalinks;
		}

		public function get_page_id(){
			$dpf = DPF_Core::getInstance( 'dahz-extender' );
			$myValue = $dpf->getOption( 'archive_portfolio_page' );

			$page = apply_filters( 'dahzextender_get_portfolio_page_id', $myValue );

			return $page ? absint( $page ) : -1;

		}

		public function permalinks_settings() {
			/* translators: %s: Home URL */
			echo wp_kses_post( wpautop( sprintf( __( 'If you like, you may enter custom structures for your portfolio URLs here. For example, using <code>portfolio</code> would make your portfolio links like <code>%sportfolio/</code>. This setting affects portfolio URLs only, not things such as portfolio categories.', 'dahzextender' ), esc_url( home_url( '/' ) ) ) ) );

			$portfolio_page_id   = $this->get_page_id();
			$base_slug      = urldecode( ( $portfolio_page_id > 0 && get_post( $portfolio_page_id ) ) ? get_page_uri( $portfolio_page_id ) : _x( 'portfolio', 'default-slug', 'dahzextender' ) );
			$portfolio_base   = _x( 'portfolio', 'default-slug', 'dahzextender' );

			$structures = array(
				0 => '',
				1 => '/' . trailingslashit( $base_slug ),
				2 => '/' . trailingslashit( $base_slug ) . trailingslashit( '%portfolio_categories%' ),
			);
			?>
			<table class="form-table dahzextender-portfolio-permalink-structure">
				<tbody>
					<tr>
						<th><label><input name="portfolio_permalink" type="radio" value="<?php echo esc_attr( $structures[0] ); ?>" class="portfoliotog" <?php checked( $structures[0], $this->permalinks['portfolio_base'] ); ?> /> <?php esc_html_e( 'Default', 'dahzextender' ); ?></label></th>
						<td><code class="default-example"><?php echo esc_html( home_url() ); ?>/?portfolio=sample-portfolio</code> <code class="non-default-example"><?php echo esc_html( home_url() ); ?>/<?php echo esc_html( $portfolio_base ); ?>/sample-portfolio/</code></td>
					</tr>
					<?php if ( $portfolio_page_id ) : ?>
						<tr>
							<th><label><input name="portfolio_permalink" type="radio" value="<?php echo esc_attr( $structures[1] ); ?>" class="portfoliotog" <?php checked( $structures[1], $this->permalinks['portfolio_base'] ); ?> /> <?php esc_html_e( 'Portfolio base', 'dahzextender' ); ?></label></th>
							<td><code><?php echo esc_html( home_url() ); ?>/<?php echo esc_html( $base_slug ); ?>/sample-portfolio/</code></td>
						</tr>
						<tr>
							<th><label><input name="portfolio_permalink" type="radio" value="<?php echo esc_attr( $structures[2] ); ?>" class="portfoliotog" <?php checked( $structures[2], $this->permalinks['portfolio_base'] ); ?> /> <?php esc_html_e( 'Portfolio base with category', 'dahzextender' ); ?></label></th>
							<td><code><?php echo esc_html( home_url() ); ?>/<?php echo esc_html( $base_slug ); ?>/portfolio-categories/sample-portfolio/</code></td>
						</tr>
					<?php endif; ?>
					<tr>
						<th><label><input name="portfolio_permalink" id="dahzextender_custom_selection" type="radio" value="custom" class="tog" <?php checked( in_array( $this->permalinks['portfolio_base'], $structures, true ), false ); ?> />
							<?php esc_html_e( 'Custom base', 'dahzextender' ); ?></label></th>
						<td>
							<input name="portfolio_permalink_structure" id="dahzextender_permalink_structure" type="text" value="<?php echo esc_attr( $this->permalinks['portfolio_base'] ? trailingslashit( $this->permalinks['portfolio_base'] ) : '' ); ?>" class="regular-text code"> <span class="description"><?php esc_html_e( 'Enter a custom base to use. A base must be set or WordPress will use default instead.', 'dahzextender' ); ?></span>
						</td>
					</tr>
				</tbody>
			</table>
			<?php wp_nonce_field( 'dahzextender-portfolio-permalinks', 'dahzextender-portfolio-permalinks-nonce' ); ?>
			<script type="text/javascript">
				jQuery( function() {
					jQuery('input.portfoliotog').change(function() {
						jQuery('#dahzextender_permalink_structure').val( jQuery( this ).val() );
					});
					jQuery('.permalink-structure input').change(function() {
						jQuery('.dahzextender-portfolio-permalink-structure').find('code.non-default-example, code.default-example').hide();
						if ( jQuery(this).val() ) {
							jQuery('.dahzextender-portfolio-permalink-structure code.non-default-example').show();
							jQuery('.dahzextender-portfolio-permalink-structure input').removeAttr('disabled');
						} else {
							jQuery('.dahzextender-portfolio-permalink-structure code.default-example').show();
							jQuery('.dahzextender-portfolio-permalink-structure input:eq(0)').click();
							jQuery('.dahzextender-portfolio-permalink-structure input').attr('disabled', 'disabled');
						}
					});
					jQuery('.permalink-structure input:checked').change();
					jQuery('#dahzextender_permalink_structure').focus( function(){
						jQuery('#dahzextender_custom_selection').click();
					} );
				} );
			</script>
			<?php
		}

		public function portfolio_categories_slug_input() {
		?>
			<input name="dahzextender_portfolio_category_slug" type="text" class="regular-text code" value="<?php echo esc_attr( $this->permalinks['portfolio_category_base'] ); ?>" placeholder="<?php echo esc_attr_x( 'portfolio-category', 'slug', 'dahzextender' ) ?>" />
		<?php
		}

		public function save_permalink_settings() {
			if ( ! is_admin() ) {
				return;
			}

			// We need to save the options ourselves; settings api does not trigger save for the permalinks page.
			if ( isset( $_POST['permalink_structure'], $_POST['dahzextender-portfolio-permalinks-nonce'], $_POST['dahzextender_portfolio_category_slug'] ) && wp_verify_nonce( wp_unslash( $_POST['dahzextender-portfolio-permalinks-nonce'] ), 'dahzextender-portfolio-permalinks' ) ) { // WPCS: input var ok, sanitization ok.

				$permalinks = (array) get_option( 'dahzextender_portfolio_permalinks', array() );

				$permalinks['portfolio_category_base'] = $this->portfolio_sanitize_permalink( wp_unslash( $_POST['dahzextender_portfolio_category_slug'] ) ); // WPCS: input var ok, sanitization ok.
				// Generate portfolio base.
				$portfolio_base = isset( $_POST['portfolio_permalink'] ) ? portfolio_clean( wp_unslash( $_POST['portfolio_permalink'] ) ) : ''; // WPCS: input var ok, sanitization ok.

				if ( 'custom' === $portfolio_base ) {

					if ( isset( $_POST['portfolio_permalink_structure'] ) ) { // WPCS: input var ok.
						$portfolio_base = preg_replace( '#/+#', '/', '/' . str_replace( '#', '', trim( wp_unslash( $_POST['portfolio_permalink_structure'] ) ) ) ); // WPCS: input var ok, sanitization ok.
					} else {
						$portfolio_base = '/';
					}

					// This is an invalid base structure and breaks pages.
					if ( '/%portfolio_categories%/' === trailingslashit( $portfolio_base ) ) {
						$portfolio_base = '/' . _x( 'portfolio', 'slug', 'dahzextender' ) . $portfolio_base;
					}

				} elseif ( empty( $portfolio_base ) ) {

					$portfolio_base = _x( 'portfolio', 'slug', 'dahzextender' );

				}

				$permalinks['portfolio_base'] = $this->portfolio_sanitize_permalink( $portfolio_base );
				// Shop base may require verbose page rules if nesting pages.
				$portfolio_page_id   = $this->get_page_id();

				$portfolio_permalink = ( $portfolio_page_id > 0 && get_post( $portfolio_page_id ) ) ? get_page_uri( $portfolio_page_id ) : _x( 'portfolio', 'default-slug', 'dahzextender' );

				if ( $portfolio_page_id && stristr( trim( $permalinks['portfolio_base'], '/' ), $portfolio_permalink ) ) {
					$permalinks['use_verbose_page_rules'] = true;
				}

				update_option( 'dahzextender_portfolio_permalinks', $permalinks );

			}

		}

		function portfolio_sanitize_permalink( $value ) {

			global $wpdb;

			$value = $wpdb->strip_invalid_text_for_column( $wpdb->options, 'option_value', $value );

			if ( is_wp_error( $value ) ) {
				$value = '';
			}

			$value = esc_url_raw( trim( $value ) );

			$value = str_replace( 'http://', '', $value );

			return untrailingslashit( $value );

		}

		public function dahzextender_get_page_children( $page_id ) {
			$page_ids = get_posts( array(
				'post_parent' => $page_id,
				'post_type'   => 'page',
				'numberposts' => -1, // @codingStandardsIgnoreLine
				'post_status' => 'any',
				'fields'      => 'ids',
			) );

			if ( ! empty( $page_ids ) ) {
				foreach ( $page_ids as $page_id ) {
					$page_ids = array_merge( $page_ids, $this->dahzextender_get_page_children( $page_id ) );
				}
			}

			return $page_ids;
		}

	}

	new DahzExtender_Portfolios();

}