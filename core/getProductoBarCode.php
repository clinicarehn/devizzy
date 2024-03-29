<?php
$peticionAjax = true;
require_once "configGenerales.php";
require_once "mainModel.php";

$insMainModel = new mainModel();

$data = [
    "barcode" => $_POST['barcode'],
    "bodega" => '' 	
];

$datos = array(); // Inicializamos $datos como un array vacío

$result = $insMainModel->getProductosCantidad($data);

while($row = $result->fetch_assoc()){	
    $result_productos = $insMainModel->getCantidadProductos($row['productos_id']);	
    if($result_productos->num_rows>0){
        while($consulta = $result_productos->fetch_assoc()){
            $id_producto_superior = intval($consulta['id_producto_superior']);
            if($id_producto_superior != 0 || $id_producto_superior != 'null'){
                $datosH = [
                    "tipo_producto_id" => "",
                    "productos_id" => $id_producto_superior,
                    "bodega" => $row['almacen_id'],	
                ];
                //agregos el producto hijo y las cantidades del padre
                $resultPadre = $insMainModel->getTranferenciaProductos($datosH);
                if($resultPadre->num_rows>0){
                    $rowP = $resultPadre->fetch_assoc();

                    $entradaH = 0;
                    $salidaH = 0;
                    $medidaName = strtolower($row['medida']);
                    if($medidaName == "ton"){ // Medida en Toneladas
                        $entradaH = $rowP['entrada'] / 2205;
                        $salidaH = $rowP['salida'] / 2205;
                    }

                    $datos = array(
                        0 => $row['nombre'],
                        1 => $row['precio_venta'],
                        2 => $row['productos_id'],
                        3 => $row['impuesto_venta'],
                        4 => $row['cantidad_mayoreo'],	
                        5 => $row['precio_mayoreo'],
                        6 => number_format($entradaH - $salidaH, 2),
                        7 => $row['almacen_id'],
                        8 => $row['medida'],
                        9 => $row['tipo_producto_id'],
                        10 => $row['precio_compra']
                    );	
                }
            } else {
                $datos = array(
                    0 => $row['nombre'],
                    1 => $row['precio_venta'],
                    2 => $row['productos_id'],
                    3 => $row['impuesto_venta'],
                    4 => $row['cantidad_mayoreo'],	
                    5 => $row['precio_mayoreo'],
                    6 => $row['cantidad'],
                    7 => $row['almacen_id'],
                    8 => $row['medida'],
                    9 => $row['tipo_producto_id'],
                    10 => $row['precio_compra']
                );
            }
        }
    }			
}

echo json_encode($datos);