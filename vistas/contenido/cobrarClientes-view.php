	<div class="container-fluid">
    <ol class="breadcrumb mt-2 mb-4">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo htmlspecialchars(SERVERURL, ENT_QUOTES, 'UTF-8'); ?>dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item active">Cuentas por Cobrar Clientes</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">		
			<form class="form-inline" id="form_main_cobrar_clientes">
				<div class="form-group mx-sm-3 mb-1">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text"><div class="sb-nav-link-icon"></div>Estado</span>
							<select id="cobrar_clientes_estado" name="cobrar_clientes_estado" class="selectpicker" title="Estado" data-live-search="true">
								<option value="1">Pendientes</option>
								<option value="2">Pagadas</option>
							</select>
						</div>	
					</div>		
				</div>	
				<div class="form-group mx-sm-3 mb-1">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text"><div class="sb-nav-link-icon"></div>Clientes</span>
							<select id="cobrar_clientes" name="cobrar_clientes" class="selectpicker" title="Clientes" data-live-search="true">
								<option value="">Seleccione</option>
								</select>
						</div>	
					</div>
				</div>								
				<div class="form-group mx-sm-3 mb-1">
					<div class="input-group">				
						<div class="input-group-append">				
							<span class="input-group-text"><div class="sb-nav-link-icon"></div>Fecha Inicio</span>
						</div>
						<input type="date" required id="fechai" name="fechai" value="<?php echo date ("Y-m-d");?>" class="form-control" data-toggle="tooltip" data-placement="top" title="Fecha Inicio">
					</div>
				  </div>	
				  <div class="form-group mx-sm-3 mb-1">
				 	<div class="input-group">				
						<div class="input-group-append">				
							<span class="input-group-text"><div class="sb-nav-link-icon"></div>Fecha Fin</span>
						</div>
						<input type="date" required id="fechaf" name="fechaf" value="<?php echo date ("Y-m-d");?>" class="form-control" data-toggle="tooltip" data-placement="top" title="Fecha Fin">
					</div>
				  </div>				  
			</form>   			
        </div>
    </div>    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-sliders-h mr-1"></i>
            Cuentas por Cobrar Clientes
        </div>
        <div class="card-body"> 
            <div class="table-responsive">
                <table id="dataTableCuentasPorCobrarClientes" class="table table-striped table-condensed table-hover" style="width:100%">
                    <thead>
                        <tr>
							<th>Fecha</th>
                            <th>Cliente</th>
                            <th>Factura</th>
                            <th>Crédito</th>
                            <th>Abonos</th>
                            <th>Saldo</th>		
							<th>Vendedor</th>
                            <th>Abonar</th>
							<th>Abonos Realizados</th>							
							<th>Factura</th>				
                        </tr>
                    </thead>
					<tfoot class="bg-info text-white font-weight-bold">
						<tr>
							<td colspan='1'>Total</td>
							<td colspan="2"></td>
							<td id="credito-cxc"></td>
							<td id="abono-cxc"></td>
							<td colspan='1' id='total-footer-cxc'></td>
							<td colspan="4"></td>
						</tr>
					</tfoot>
                </table>  
            </div>                   
        </div>
        <div class="card-footer small text-muted">
 			<?php
				require_once "./core/mainModel.php";
				
				$insMainModel = new mainModel();
				$entidad = "cobrar_clientes";
				
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
	$insMainModel->guardar_historial_accesos("Ingreso al modulo Cuentas por Cobrar Clientes");
?>