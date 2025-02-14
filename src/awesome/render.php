<!-- <div class="services">
	<div class="feature">
		<h3>Service #1</h3>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sed omnis necessitatibus quisquam reiciendis amet corporis fuga? </p>
	</div>
	<div class="feature">
		<h3>Service #2</h3>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sed omnis necessitatibus quisquam reiciendis amet corporis fuga? </p>
	</div>
	<div class="feature">
		<h3>Service #3</h3>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, sed omnis necessitatibus quisquam reiciendis amet corporis fuga? </p>
	</div>
</div> -->

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
        $bigDogsQuery->the_post(); 
        // echo '<h2>' . get_the_title() . '</h2>'; // Use if you need to manipulate the title before displaying it.
		// the_title('<h2>', '</h2>'); // Use if you only want to display the title.
        // echo '<p>Weight: ' . get_post_meta(get_the_ID(), 'weight', true) . ' kg</p>';
		// the_content(); ?>
		<div class="our-pet">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>	
        <div></div>


		
   <?php }
    wp_reset_postdata();
} else {
    echo 'No matching pets found.';
}

?>
