<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>
			<section class="cours">
			<?php
            $precedent = "XXXXXX";
			$chaine_bouton_radio = '';
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriete);
				if ($tPropriete['typeCours'] != $precedent): 
					if ("XXXXXX" != $precedent)	: ?>
						</section>
						<?php if (in_array($precedent, ["Web", "Jeu", "Spécifique"])) : ?>
							<section class="ctrl-carrousel">
								<?php echo $chaine_bouton_radio; 
								$chaine_bouton_radio = '';?>		
							</section>
						<?php endif; ?>
					<?php endif; ?>	
					<h2><?php echo $tPropriete['typeCours'] ?></h2>
					<section <?php echo (in_array($tPropriete['typeCours'], ["Web", "Jeu", "Spécifique"])? 'class="carrousel-2"':'class="bloc"'); ?>>
				<?php endif ?>	

				<?php if (in_array($tPropriete['typeCours'], ["Web", "Jeu", "Spécifique"])) : 
						get_template_part( 'template-parts/content', 'cours-carrousel' ); 
						$chaine_bouton_radio .= '<input class="rad-carrousel"  type="radio" name="rad-carrousel">';
				else :		
						get_template_part( 'template-parts/content', 'cours-article' ); 
				endif;	
				$precedent = $tPropriete['typeCours'];
			endwhile;?>
			</section> <!-- fin section cours -->
		<?php endif; ?>


	

	</main>

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriete)
{


	$tPropriete['titre'] = get_the_title(); 
	$tPropriete['sigle'] = substr($tPropriete['titre'], 0, 7);
	$tPropriete['nbHeure'] = substr($tPropriete['titre'],-4,3);
	$tPropriete['titrePartiel'] = substr($tPropriete['titre'],8,-6);
	$tPropriete['session'] = substr($tPropriete['titre'], 4,1);
	$tPropriete['typeCours'] = get_field('type_de_cours');
}
