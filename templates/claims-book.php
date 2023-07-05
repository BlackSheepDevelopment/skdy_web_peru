<?php /* Template Name: Libro de reclamaciones */

set_query_var( 'ENTRY', 'claims_book' );

get_header(); ?>

	<div id="main-container">
		<div class="header">
			<div class="date">
				<b>Fecha:</b> <?php echo date_i18n( 'd-m-Y' ) ?>
			</div>
			<div class="info">
				<span>Black Sheep Peru SAC</span>
				<span>Av.  Mariscal La Mar 1263, Int. 203.</span>
				<span>Miraflores - Lima</span>
			</div>
		</div>
		<?php while ( have_posts() ): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<div class="extra">
			<small>* La formulación del reclamo no impide acudir a otras vias de solución de controversias ni es
				requisito previo para interponer una denuncia ante el INDECOPI.</small>
			<small>* El proveedor deberá dar respuesta al reclamo en un plazo no mayor a (30) días calendario, pudiendo
				ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.</small>
		</div>
	</div>
<?php get_footer();
