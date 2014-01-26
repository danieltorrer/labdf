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
		background: #ccffcc;
	}

	.asd{
		margin-top: 20px;
		padding-left: 30px;
	}

	</style>

	<script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
</head>
<body>

	<div class="row">
		<div class="large-3 columns collapse">

			<div class="">
				<img src="<?= base_url()?>img/titulo_usuarios.png" alt="">
			</div>

			<div class="asd">
				<div class="check">
					<img class="marginarriba" src="<?php echo base_url();?>img/hombre_usuarios.png" alt="">
					<input type="radio" name="sexo" value="M" id="hombre"><label for="hombre">
				</div>

				<div class="check">
					<img src="<?php echo base_url();?>img/mujer_usuario.png" alt="">
					<input type="radio" name="sexo" value="F" id="mujer">
				</div>

				<div class="check">
					<img src="<?php echo base_url();?>img/ambos_usuarios.png" alt="">
					<input type="radio" name="sexo" value="ambos" id="ambos" checked>
				</div>
			</div>
		</div>

		<div class="large-9 columns">
			<div class="row">
				
				<div class="large-12 columns">
					<div class="total">
						<h3>Usuarios:</h3>
						<h4></h4>
					</div>
				</div>

				<hr>

				<div class="large-12 columns">
					<h3>Delegación:</h3>
					<span id="info2"></span>
					<div id="graphDelegacion"></div>
				</div>

				<div class="large-12 columns">
					<div class="usos">
						<h3>El usuario promedio ha utilizado <span> </span> veces la bicicleta</h3>
					</div>
				</div>

			</div>

			<hr>

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
