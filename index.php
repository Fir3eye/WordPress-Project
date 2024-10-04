<?php get_header(); ?>

<div class="content">
    <h1>Welcome to My Simple WordPress Project</h1>
    <p>This is a simple project using WordPress!</p>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div><?php the_excerpt(); ?></div>
    <?php endwhile; else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
