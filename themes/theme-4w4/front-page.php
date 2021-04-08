<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

get_header();
?>
	<main id="primary" class="site-main">
	<section class="ctrl-carrousel">
		<input type="radio" class="rad-carrousel" name="rad-carrousel">
		<input type="radio" class="rad-carrousel" name="rad-carrousel">
		<input type="radio" class="rad-carrousel" name="rad-carrousel">
	</section>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			while ( have_posts() ) :
				the_post();
				convertirTableau($tPropriete);
				if ($tPropriete['typeCours'] != $precedent): 
					if ("XXXXXX" != $precedent): ?>
						</section>
					<?php endif;?>
					<section <?php echo($tPropriete['typeCours']== 'Web' ? 'class="carrousel-2"':'') ?>>
					<h2><?php echo $tPropriete['typeCours']; ?></h2>
				<?php endif; ?>
				<?php
				if($tPropriete['typeCours'] == 'Web') :
					get_template_part( 'template-parts/content', 'cours-carrousel');
				else :
					get_template_part( 'template-parts/content', 'cours-article');
				endif;
				$precedent = $tPropriete['typeCours'];
			endwhile; ?>
			</section>	<!-- fin section cours -->
		<?php endif;?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();


function convertirTableau(&$tPropriete)
{
/* 
	$titre = get_the_title();
	//	582-1W1 Mise en page Web (75h)
	$sigle = substr($titre, 0, 7);
	$nbHeure = substr($titre, -4, 3);
	$titrePartiel = substr($titre, 8, -6);
	$session = substr($titre, 4,1);
	$typeCours = get_field('type_de_cours');
*/

	$tPropriete['titre'] = get_the_title();
	$tPropriete['sigle'] = substr($tPropriete['titre'], 0, 7);
	$tPropriete['nbHeure'] = substr($tPropriete['titre'], -4, 3);
	$tPropriete['titrePartiel'] = substr($tPropriete['titre'], 8, -6);
	$tPropriete['session'] = substr($tPropriete['titre'], 4,1);
	$tPropriete['typeCours'] = get_field('type_de_cours');
}
