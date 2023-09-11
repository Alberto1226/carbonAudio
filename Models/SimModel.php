<?php 

	class SimModel extends Mysql
	{
		public $intIdSim;
		public $strNumerosim;
		public $strOperador;
		public $strFecha;
		public $strStatus;
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectSim(){
			$sql = "SELECT *
					FROM tarjeta_sim";
					$request = $this->select_all($sql);
			return $request;
		}

		public function selectSimin(int $idsim)
		{
			//BUSCAR SIM
			$this->intIdSim = $idsim;
			$sql = "SELECT * FROM tarjeta_sim WHERE id_sim = $this->intIdSim";
			$request = $this->select($sql);
			return $request;
		}
		
		public function insertSim(string $strNumero, string $strOperador, string $strFecha, string $strStatus){
			
			//$this->intIdrol = $intIdrol;
			$this->strNumero = $strNumero;
			$this->strOperador = $strOperador;
			$this->strFecha = $strFecha;
			$this->strStatus = $strStatus;
			
			$return = 0;
			$sql = "SELECT * FROM plan_datos_por_tiempo WHERE descripcion_plan = '{$this->strNumero}'";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$query_insert  = "INSERT INTO tarjeta_sim(id_sim, 
												numero_sim, 
												operador_sim,
												fecha_compra_sim,
												status_sim) 
								  VALUES(null,?,?,?,?)";
	        	$arrData = array(
        						$this->strNumero,
        						$this->strOperador,
        						$this->strFecha,
								$this->strStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function insertSimFromCSV($filePath){
			$return = 0;
		
			if (($handle = fopen($filePath, "r")) !== false) {
				while (($data = fgetcsv($handle, 1000, ",")) !== false) {
					$strNumero = $data[0];
					$strOperador = $data[1];
					$strFecha = $data[2];
					$strStatus = $data[3];
		
					$sql = "SELECT * FROM tarjeta_sim WHERE numero_sim = '{$data[0]}'";
					$request = $this->select_all($sql, array($strNumero));
		
					if(empty($request)){
						$query_insert = "INSERT INTO tarjeta_sim (id_sim,
						 numero_sim,
						 operador_sim, 
						 fecha_compra_sim, 
						 status_sim) VALUES (null, ?, ?, ?, ?)";
						$arrData = array($strNumero, $strOperador, $strFecha, $strStatus);
						$request_insert = $this->insert($query_insert, $arrData);
						$return++;
					}
				}
				fclose($handle);
			}
		
			return $return;
		}
		
		
		public function updateSim(int $sim, string $numero, string $operador, string $fecha, string $status){
			$this->intIdSim = $sim;
			$this->strNumero = $numero;
			$this->strOperador = $operador;
			$this->strFecha = $fecha;
			$this->strStatus = $status;

			$sql = "SELECT * FROM tarjeta_sim WHERE numero_sim = '$this->strNumero' AND id_sim != $this->intIdSim";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tarjeta_sim SET numero_sim = ?, operador_sim = ?, fecha_compra_sim = ?, status_sim = ? WHERE id_sim = $this->intIdSim ";
				$arrData = array($this->strNumero, $this->strOperador, $this->strFecha, $this->strStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}
		/*public function deleteSim(int $idSim)
		{
			$this->intSim = $idSim;
			$sql = "SELECT * FROM plan_datos_por_tiempo WHERE id_planRenta = $this->intSim";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				
			}else{
                $sql = "DELETE FROM plan_datos_por_tiempo WHERE id_planRenta = $this->intSim";
				$arrData = array(0);
				$request = $this->DELETE($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
				//$request = 'exist';
			}
			return $request;
		}*/


	}
 ?>