<?php 
	class Sim extends Controllers{
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

		public function Sim()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Sim";
			$data['page_title'] = "SIM <small>RASTREO SATELITAL</small>";
			$data['page_name'] = "sim";
			$data['page_functions_js'] = "functions_sim.js";
			$this->views->getView($this,"sim",$data);
		}

		public function getSim()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectSim();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
					if($arrData[$i]['status_sim'] == 1)
					{
						$arrData[$i]['status_sim'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status_sim'] = '<span class="badge badge-danger">Inactivo</span>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditSim" onClick="fntEditSim('.$arrData[$i]['id_sim'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

        public function setSim(){

			$intIdSim = intval($_POST['idSim']);
			$strNumero =  strClean($_POST['txtNumero']);
			$strOperador = strClean($_POST['txtOperador']);
			$strFecha = strClean($_POST['txtFechaHora']);
			$strStatus = strClean($_POST['txtSelelct']);
			
			$request_rol = "";
			if($intIdSim == 0)
			{
				//Crear
				if($_SESSION['permisosMod']['w']){
					$request_rol = $this->model->insertSim($strNumero, $strOperador,$strFecha,$strStatus);
					$option = 1;
				}
			}else{
				//Actualizarint $idsim, string $numero, string $operador, string $fecha, string $status){
                  
				if($_SESSION['permisosMod']['u']){
					$request_rol = $this->model->updateSim($intIdSim,$strNumero, $strOperador, $strFecha, $strStatus);
					$option = 2;
				}
			}

			if($request_rol > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				}
			}else if($request_rol == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! El Plan ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	}
       
	public function setSimFromCSV()
	{
		$filePath = $_FILES['csvFile']['tmp_name']; // Ruta temporal del archivo CSV

		// Validar el archivo CSV
		$valid = $this->validateCSV($filePath);
		
		if (!$valid) {
			$arrResponse = array('status' => false, 'msg' => 'El archivo CSV no es válido. Verifica la estructura del archivo.');
		} else {
			$return = $this->model->insertSimFromCSV($filePath);

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
		$expectedFields = 4; // Cambia este valor según la estructura del CSV

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

        public function getsimin(int $idsim)
		{
			if($_SESSION['permisosMod']['r']){
				$intIdSim = intval(strClean($idsim));
				if($intIdSim > 0)
				{
					$arrData = $this->model->selectSimin($intIdSim);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}


         /*public function delSim()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdrol = intval($_POST['idSim']);
					$requestDelete = $this->model->deletePlanes($intIdrol);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Plan');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el Plan.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Plan.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}*/


	}

 ?>