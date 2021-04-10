<?php
/**
 * Template part l'affichage des blocs de cours dans front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */
global $tPropriete;
?>
  
<article class="slide__conteneur">
	<a href="<?php echo get_permalink(); ?>" class="slide">
		<?php get_the_post_thumbnail('page');?>
		<div class="slide__info">
			<p><?php echo $tPropriete['sigle'] . " - " . $tPropriete['typeCours'] . " - " . $tPropriete['nbHeure']; ?></p>
			<p><?php echo $tPropriete['titrePartiel']; ?></p>
			<p>Session : <?php echo $tPropriete['session']; ?></p>
		</div>
	</a>
</article>      
