<?php 
	class Distribuidor extends Controllers{
		public function __construct()
		{
            session_start();
			parent::__construct();
			getPermisos(MDPAGINAS);
		}

		public function distribuidor()
		{
			$pageContent = getPageRout('distribuidor');
			
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - "."Distribuidor";
				$data['page_name'] = "Distribuidor";
				$data['page'] = $pageContent;
				$this->views->getView($this,"distribuidor",$data);  
            

		}

	}
 ?>