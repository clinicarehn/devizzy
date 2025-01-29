<div class="container-fluid">
    <ol class="breadcrumb mt-2 mb-4">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo htmlspecialchars(SERVERURL, ENT_QUOTES, 'UTF-8'); ?>dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item active">Impresora</li>
    </ol>
    <div class="card mb-4">
		<div class="card mb-4">
			<div class="card-header">
				<i class="fab fas fa-print mr-1"></i>
				Impresora
			</div>
			<div class="card-body"> 
				<div class="table-responsive">
					<table id="dataTableConfImpresora" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead>
							<tr>
								<th>Descripcion</th>
                                <th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
					</table>  
				</div>                   
				</div>
			<div class="card-footer small text-muted">
 			<?php
				require_once "./core/mainModel.php";
				
				$insMainModel = new mainModel();
				$entidad = "impresora";
				
				if($insMainModel->getlastUpdate($entidad)->num_rows > 0){
					$consulta_last_update = $insMainModel->getlastUpdate($entidad)->fetch_assoc();
					$fecha_registro = htmlspecialchars($consulta_last_update['fecha_registro'], ENT_QUOTES, 'UTF-8');
					$hora = htmlspecialchars(date('g:i:s a', strtotime($fecha_registro)), ENT_QUOTES, 'UTF-8');
					echo "Última Actualización ".htmlspecialchars($insMainModel->getTheDay($fecha_registro, $hora), ENT_QUOTES, 'UTF-8');
				} else {
					echo "No se encontraron registros ";
				}		
			?>
			</div>
		</div>
	</div>	
<?php
	$insMainModel->guardar_historial_accesos("Ingreso al modulo Configurar Almacén");
?>