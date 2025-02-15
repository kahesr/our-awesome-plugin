<?php
$ourArgumets = array(
    'post_type'      => 'pet', 
    // 'posts_per_page' => -1, // Get all matching posts
    // 'tax_query'      => array(
    //     array(
    //         'taxonomy' => 'species', // Your custom taxonomy
    //         'field'    => 'slug',
    //         'terms'    => 'dog',
    //     ),
    // ),
    // 'meta_query'     => array(
    //     array(
    //         'key'     => 'weight', // Custom field key
    //         'value'   => 5,
    //         'compare' => '>',
    //         'type'    => 'NUMERIC',
    //     ),
    // ),
);

 // Create the WP-Query object
$petQuery = new WP_Query($ourArgumets); //wp-query is going to give up only the posts that we are looking for based on the argumet that we provided

// Checks if any poste were returned

if ($petQuery->have_posts()) { ?>
	<div class="pets-section alignfull"> <!-- in 2025 theme to have a container to take the whole width you can use "alignfull" class -->
		<div class="pets-section-inner">
			<h2>Our Pets</h2>
			<div class="pet-cards-grid">
					<?php while ($petQuery->have_posts()) {
							$petQuery->the_post(); ?>
								<div class="our-pet">
									<div class="pet-photo">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
									</div>
									<div class="pet-text">
										<h3>
											<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?> 
													(<?php the_field('weight') ?> kg)
											</a>
										</h3>
										<p><?php echo wp_trim_words(get_the_content(), 14) ?>
											<a href="<?php the_permalink(); ?>" class="learn-more">learn more &raquo;</a>
										</p>
									</div>
								</div>
								
								
								<?php }
				wp_reset_postdata();
			} else {
				echo 'No matching pets found.';
			}
			
			?>
			</div>
		</div>
	</div>
