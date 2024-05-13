<?PHP
	class reclamation
	{
		private $id_r;
		private $nom;
		private $mail;
        private $tel;
		private $objet;
		private $message;
        private $retour;
        private $etat;
        private $date;
		private $id_retour;

		
		function __construct($nom ,$mail,$tel,$objet,$message,$retour,$date)
        {
            $this->nom = $nom;
			$this->mail = $mail;
			$this->tel = $tel;
            $this->objet = $objet;
            $this->message = $message;
			$this->retour = $retour;
			$this->etat = "non traitée";
			$this->date = $date;
			$this->id_retour =$this->get_id();

		}
		//getters
		function get_id(){
			return $this->id_r;
		}

		function get_nom(){
			return $this->nom;
		}
		function get_mail(){
			return $this->mail;
		}
		
        function get_tel(){
			return $this->tel;
		}
        function get_objet(){
			return $this->objet;
		}
        function get_message(){
			return $this->message;
		}
		function get_retour(){
			return $this->retour;
		}
		function get_etat(){
			return $this->etat;
		}
		function get_date(){
			return $this->date;
		}
		function get_id_retour(){
			return $this->id_retour;
		}
		
		//setters
		
	   function set_id($id): void
	   {
		$this->id_r=$id;
	   }
	   function set_nom($nom): void
	   {
		$this->nom=$id;
	   }
	   function set_mail($mail): void
	   {
		$this->mail=$mail;
	   }
	   function set_tel($tel): void
	   {
		$this->tel=$tel;
	   }
	   function set_massage($msg): void
	   {
		$this->message=$msg;
	   }
	   function set_retour($retour): void
	   {
		$this->retour=$retour;
	   }
	   function set_etat($etat): void
	   {
		$this->etat=$etat;
	   }
	   function set_date($date): void
	   {
		$this->date=$date;
	   }
	   function set_objet($obj): void
	   {
		$this->objet=$obj;
	   }
		function set_id_retour($id): void
		{
			$this->id_retour = $this->$id;
		}

	   
	}

?>