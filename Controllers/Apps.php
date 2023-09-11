<?php 
	class Apps extends Controllers{
		public function __construct()
		{
            session_start();
			parent::__construct();
			getPermisos(MDPAGINAS);
		}

		public function apps()
		{
			$pageContent = getPageRout('apps');
			
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - "."Descargas";
				$data['page_name'] = "Descargas";
				$data['page'] = $pageContent;
				$this->views->getView($this,"apps",$data);  
            

		}

	}
 ?>