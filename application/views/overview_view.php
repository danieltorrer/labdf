<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>LabDF-GDF | Bienvenidos</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/jplot/jquery.jqplot.min.css" />
	
	<style>
	html,body{
		width: 100%;
		height: 100%;
	}

	.row{
		height: 100%;
	}

	.row>.large-3{
		min-height: 100%;
		margin: 0px;
		padding: 0px;
		overflow-y: auto;
		overflow-x: hidden;
	}
	</style>

	<script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
</head>
<body>

	<div class="row">
		<div class="large-3 columns collapse">

			<img src="<?= base_url()?>img/titulo_usuarios.png" alt="">
			<form>
				<label>Sexo</label>
				<input type="radio" name="sexo" value="M" id="hombre"><label for="hombre">Hombre</label>
				<input type="radio" name="sexo" value="F" id="mujer"><label for="mujer">Mujer</label>
				<input type="radio" name="sexo" value="ambos" id="ambos" checked><label for="ambos">Ambos</label>
			</form>
		</div>

		<div class="large-9 columns">
			<div class="total">
				<h3>Total:</h3>
				<h4></h4>
			</div>
		</div>

		<div class="large-6 columns">
			<div class="usos">
				<h3>Promedio de uso:</h3>
				<h4></h4>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="large-12 columns">
			<div class="delegacion">
				<h3>Delegación:</h3>
				<br>
				<span id="info2"></span>
				<div id="graphDelegacion">

				</div>
					<!--<input type="submit" id="graphDelegacionSave" value="Guardar Imagen">
					<div class="graphDelegacionImage">
						
					</div>-->
				</div>
			</div>
		</div>
	</div>

	<!--<div>
		<textarea id="text"></textarea>
		<input type="submit" id="run">
	</div>
-->

<script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/foundation.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/jquery.jqplot.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.highlighter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.pointLabels.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.highlighter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.cursor.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jplot/plugins/jqplot.toImage.js"></script>

<script src="<?php echo base_url(); ?>js/graph.js"></script>

</body>
</html>
