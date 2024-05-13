<?PHP
	class retour
	{
		private $id_retour;
		private $message_retour;
        
		
		function __construct($id,$retour)
        {
            $this->message_retour = $retour;
			$this->id_retour = $id;

		}
        
		//getters
		
		function get_retour()
        {
			return $this->message_retour;
		}
        function get_id_r()
        {
			return $this->id_retour;
		}
		
		
		//setters
		
	   function set_retour($retour): void
	   {
		$this->message_retour=$retour;
	   }
       function set_id_r($retour): void
	   {
		$this->id_r=$retour;
	   }
	   
	}

?>