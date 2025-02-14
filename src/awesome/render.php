<?php
$ourArgumets = array(
    'post_type'      => 'pet', 
    'posts_per_page' => -1, // Get all matching posts
    'tax_query'      => array(
        array(
            'taxonomy' => 'species', // Your custom taxonomy
            'field'    => 'slug',
            'terms'    => 'dog',
        ),
    ),
    'meta_query'     => array(
        array(
            'key'     => 'weight', // Custom field key
            'value'   => 5,
            'compare' => '>',
            'type'    => 'NUMERIC',
        ),
    ),
);

 // Create the WP-Query object
$bigDogsQuery = new WP_Query($ourArgumets); //wp-query is going to give up only the posts that we are looking for based on the argumet that we provided

// Checks if any poste were returned
if ($bigDogsQuery->have_posts()) {
    while ($bigDogsQuery->have_posts()) {
        $bigDogsQuery->the_post(); ?>
		<div class="our-pet">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>


		
   <?php }
    wp_reset_postdata();
} else {
    echo 'No matching pets found.';
}

?>
