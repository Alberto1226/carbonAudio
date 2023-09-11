<?php 
	class Dispositivos extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MPRODUCTOS);
		}

		public function Dispositivos()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Dispositivos";
			$data['page_title'] = "DISPOSITIVOS <small>RASTREO SATELITAL</small>";
			$data['page_name'] = "dispositivos";
			$data['page_functions_js'] = "functions_Dispositivos.js";
			$this->views->getView($this,"dispositivos",$data);
		}

		public function getDispositivos()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectDispositivos();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
					//status gps
					if($arrData[$i]['status_gps'] == 1)
					{
						$arrData[$i]['status_gps'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status_gps'] = '<span class="badge badge-danger">Inactivo</span>';
					}
					//status sim
					if($arrData[$i]['status_sim'] == 1)
					{
						$arrData[$i]['status_sim'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status_sim'] = '<span class="badge badge-danger">Inactivo</span>';
					}
					//progreso
					// Calcula la duración en días
					$fechaCompra = new DateTime($arrData[$i]['fecha_compra_sim']);
					$fechaActual = new DateTime();
					$duracion = $fechaCompra->diff($fechaActual)->days;
		
					// Limita la duración a un máximo de 30 días
					$duracion = min($duracion, 30);
		
					// Calcula el ancho de la barra de progreso
					$ancho = ($duracion / 30) * 100;
					// Define el color de la barra de progreso según el nivel alcanzado
					$color = 'success'; // Por defecto, verde

					if ($ancho >= 90) {
						$color = 'danger'; // Rojo
					} elseif ($ancho >= 70) {
						$color = 'warning'; // Naranja
					}
					// Crea el elemento HTML de la barra de progreso
					$progressBar = '<div class="progress"><div class="progress-bar bg-' . $color . '" role="progressbar" style="color:black; width: ' . $ancho . '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> ' . $ancho . '%</div></div>';
		
					$arrData[$i]['duracionBarr'] = $progressBar;

					//$arrData[$i]['precio'] = SMONEY.' '.formatMoney($arrData[$i]['precio']);
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_gps'].')" title="Ver producto"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id_gps'].')" title="Editar producto"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id_gps'].')" title="Eliminar producto"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
        
		/*public function setDisFromCSV(){
			$filePath = $_FILES['csvFileDis']['tmp_name']; // Ruta temporal del archivo CSV
		
			$return = $this->model->insertDisFromCSV($filePath);
		
			if($return > 0){
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
			}
		
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			die();
		}*/

		public function setDisFromCSV()
		{
			$filePath = $_FILES['csvFileDis']['tmp_name']; // Ruta temporal del archivo CSV

			// Validar el archivo CSV
			$valid = $this->validateCSV($filePath);
			
			if (!$valid) {
				$arrResponse = array('status' => false, 'msg' => 'El archivo CSV no es válido. Verifica la estructura del archivo.');
			} else {
				$return = $this->model->insertDisFromCSV($filePath);

				if ($return > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
				}
			}

			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			die();
		}

		private function validateCSV($filePath)
		{
			$valid = true;

			// Definir el número de campos esperados por registro
			$expectedFields = 7; // Cambia este valor según la estructura del CSV

			$file = fopen($filePath, 'r');

			// Iterar sobre cada línea del archivo CSV
			while (($line = fgetcsv($file)) !== false) {
				// Validar el número de campos por registro
				if (count($line) !== $expectedFields) {
					$valid = false;
					break;
				}
			}

			fclose($file);

			return $valid;
		}



	}

 ?>