<?php 

	class DispositivosModel extends Mysql
	{
		public $intIndgps;
		public $strModelo;
		public $strSerie;
		public $strFechaCompra;
		public $strStatus;
		public $strIdSim;
		public $strIdPlan;
		public $strIdPersona;															
		
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectDispositivos(){
			$sql = "SELECT g.id_gps, g.serie_gps, g.modelo_gps, g.fecha_compra, g.status_gps, ts.numero_sim, ts.operador_sim, ts.fecha_compra_sim, ts.status_sim, p.nombres, p.apellidos, pl.duracion
			FROM gps_activos g 
			INNER JOIN tarjeta_sim ts ON g.id_sim = ts.id_sim
			INNER JOIN plan_datos_por_tiempo pl ON g.id_planRenta = pl.id_planRenta
			INNER JOIN persona p ON p.idpersona = g.idpersona";
					$request = $this->select_all($sql);
			return $request;
		}	
        
		public function insertDisFromCSV($filePath){
			$return = 0;
		
			if (($handle = fopen($filePath, "r")) !== false) {
				while (($data = fgetcsv($handle, 1000, ",")) !== false) {
					$strModelo = $data[0];
					$strSerie = $data[1];
					$strFechaCompra = $data[2];
					$strStatus = $data[3];
					$strIdSim = $data[4];
					$strIdPlan = $data[5];
					$strIdPersona = $data[6];
					
		
					$sql = "SELECT * FROM gps_activos WHERE serie_gps = '{$data[0]}'";
					$request = $this->select_all($sql, array($strModelo));
					
					if(empty($request)){
						$query_insert = "INSERT INTO gps_activos (id_gps,
						 modelo_gps,
						 serie_gps, 
						 fecha_compra, 
						 status_gps, 
						 id_sim, 
						 id_planRenta, 
						 idpersona ) VALUES (null, ?, ?, ?, ?, ?, ?, ?)";
						$arrData = array($strModelo, 
						$strSerie, 
						$strFechaCompra, 
						$strStatus, 
						$strIdSim, 
						$strIdPlan, 
						$strIdPersona);
						$request_insert = $this->insert($query_insert, $arrData);
						$return++;
					}
				}
				fclose($handle);
			}
		
			return $return;
		}
		
	}
 ?>