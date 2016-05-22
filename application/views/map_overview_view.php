<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>LabDF-GDF | Bienvenidos</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
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

	#map{
		width: 100%;
		height: calc(100% - 50px );
	}

	.mapcontainer{
		height: 100%;
		margin: 0px !important;
		padding: 0px !important;
	}

	.check{
		margin-top: 20px;
		margin-left: 15px;
	}

	.pleca{
		background: #7e69ac;
	}

	.refresh{
		background: #6ebc44;
		display: block;
		//margin-right: 10px;
	}

	.panel{
		height: 100%;
		overflow-y: scroll; 
	}
	
	.resultados{
		z-index: 1000;
		position: absolute;
		background: #7e69ac;
		height: 70px;
		width: 100%;
		top: calc(100% - 70px);
	}

	.resultados h5{
		color: white;
		padding-left: 20px;
		padding-top: 5px;
	}
	
	</style>
	<script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
</head>
<body>

	<div class="row">
		<div class="large-3 columns collapse panel">
			
			<div class="">
				<img src=" <?php echo base_url();?>img/logo_reportes.png " alt="">
			</div>

			<div class="check">
				<img src="<?php echo base_url();?>img/accidentes.png" alt="" width="150">
				<input type="checkbox" name="accidentes" id="accidentes">
			</div>

			<div class="check">
				<img src="<?php echo base_url();?>img/baches.png" alt="" width="150">
				<input type="checkbox" name="baches" id="baches">
			</div>

			<div class="margenarriba">
				<img src="<?php echo base_url();?>img/tiempo.png" alt="">
			</div>

			<div class="check">
				<img class="margenabajo" src="<?php echo base_url();?>img/horadeldia.png" alt="" width="150">
				
				<div class="row collapse">
					<div class="small-3 large-5 columns">
						<input id="hourtxt" type="text" placeholder="Hora">
					</div>
					<div class="small-1 large-2 columns">
						<span href="#" class="postfix">:</span>
					</div>
					<div class="small-3 large-5 columns">
						<input id="minutetxt" type="text" placeholder="Minuto">
					</div>

					<div class="large-12 columns">
						<a id="refreshHour" class="button tiny refresh" href="#">Refresh</a>
					</div>
					
				</div>

				<img class="margenabajo" src="<?php echo base_url();?>img/fechadeviaje.png" alt="" width="150">

				<div class="row collapse">
					<div class="small-3 large-3 columns margenarriba">
						<input type="text" placeholder="Dia" value="31" disabled>
					</div>
					<div class="small-1 large-1 columns">
						<a href="#" class="postfix" disabled>/</a>
					</div>
					<div class="small-4 large-3 columns">
						<input type="text" placeholder="Mes" value="07" disabled>
					</div>
					<div class="small-1 large-1 columns">
						<a href="#" class="postfix">/</a>
					</div>
					<div class="small-4 large-4 columns">
						<input type="text" placeholder="Año" value="2013" disabled>
					</div>

				</div>

				<div class="row">
					<div class="large-12 columns">
						<a id="refreshDate" class="button tiny refresh" href="#">Refresh</a>
					</div>
				</div>
			</div>

			<div class="">
				<img src="<?php echo base_url();?>img/demografia.png" alt="">
			</div>

			<div class="check">
				<img src="<?php echo base_url();?>img/edad.png" alt="" width="150">
			</div>

			<div class="check">
				<img src="<?php echo base_url();?>img/sexo.png" alt="" width="150">
			</div>
			

		</div>

		<div class="large-9 columns mapcontainer">
			<div class="pleca">
				<img src="<?php echo base_url();?>img/pleca.png" alt="">
			</div>
			<div id="map"></div>
			<div class="resultados">
				<h5>RESULTADOS : <span id="map-resultados"></span></h5>
			</div>
		</div>
	</div>



	<script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/foundation.min.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=visualization"></script>
	<script src="<?php echo base_url(); ?>js/heatmapData.js"></script>
	<script src="<?php echo base_url(); ?>js/heatmapData2.js"></script>
	<script src="<?php echo base_url(); ?>js/map.js"></script>
	<script src="<?php echo base_url(); ?>js/filters.js"></script>

</body>
</html>
