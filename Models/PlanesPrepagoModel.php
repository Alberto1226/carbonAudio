<?php 

	class PlanesPrepagoModel extends Mysql
	{
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectPlanesPrepago(){
			$sql = "SELECT *
					FROM plan_datos_por_tiempo";
					$request = $this->select_all($sql);
			return $request;
		}
        
        public function selectPlan(int $idrol)
		{
			//BUSCAR ROLE
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM plan_datos_por_tiempo WHERE id_planRenta = $this->intIdrol";
			$request = $this->select($sql);
			return $request;
		}
        
		public function insertPlanes(string $strRol, string $strDescipcion, string $strDuracion){
			//$strDuracion = strClean($_POST['txtDuracion']);
			//$this->intIdrol = $intIdrol;
			$this->strRol = $strRol;
			$this->strDescipcion = $strDescipcion;
			$this->strDuracion = $strDuracion;
			
			$return = 0;
			$sql = "SELECT * FROM plan_datos_por_tiempo WHERE descripcion_plan = '{$this->strRol}'";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$query_insert  = "INSERT INTO plan_datos_por_tiempo
                                        (id_planRenta,
                                         descripcion_plan,
                                        monto_plan,
                                        duracion) 
								  VALUES(null,?,?,?)";
	        	$arrData = array(
        						$this->strRol,
        						$this->strDescipcion,
                                $this->strDuracion);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

        public function deletePlanes(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM plan_datos_por_tiempo WHERE id_planRenta = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				
			}else{
                $sql = "DELETE FROM plan_datos_por_tiempo WHERE id_planRenta = $this->intIdrol";
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
		}


        //Edite plan
       
        public function updatePlan(int $idrol, string $rol, string $descripcion, int $duracion){
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->strDuracion = $duracion;

			$sql = "SELECT * FROM plan_datos_por_tiempo WHERE descripcion_plan = '$this->strRol' AND id_planRenta != $this->intIdrol";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE plan_datos_por_tiempo SET descripcion_plan = ?, monto_plan = ?, duracion = ? WHERE id_planRenta = $this->intIdrol ";
				$arrData = array($this->strRol, $this->strDescripcion, $this->strDuracion);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}
        
	}
 ?>