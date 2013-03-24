<?php
namespace Hey\AccountBundle\Models;
use Symfony\Component\HttpFoundation\File\UploadedFile;

ini_set('memory_limit', '64M'); 
class Fichier
{
	public $file;
	public $dossier ="";
	//public $fichier = array('name','tmp_name','taille','extension');
	public $tailleMax = 10000000;
	public $x = 150;
	//public $y = 150;
	public $deltaY = 0;
	
	public $extension = array('png', 'gif', 'jpg', 'jpeg');
	public $objet = array();
	public $doResize = false;
	public $fileName;
	public function __construct($params = array())
	{
		if(!isset($params["dossier"]))
		$this->dossier = $_SERVER['DOCUMENT_ROOT']."/bundles/heysite/images/profils/1/Avatar";
		else 
		$this->dossier = $params['dossier'];
		
		$this->file = $params['fichier'];
	
		$ext = substr(strtolower(strrchr(basename($this->file['name']), ".")), 1);
		$this->file['extension'] = $ext;
		
		if(isset($params['tailleMax']))
		$this->tailleMax = $params['tailleMax'];
		
		if(isset($params['extension']))
		$this->extension = $params['extension'];
		
		if(isset($params['objet']))
                {
		$this->fileName = $params['objet']->getId();
                
                }
                
                if(isset($params['fileName']))
                {
		$this->fileName = $params['fileName'];
                
                }
                
		$this->file['name'] = $this->fileName.'.'.$this->file['extension'];
		$this->file['path'] = $this->dossier.'/'.$this->fileName.'.'.$this->file['extension'];
		
	}
	public function upload()
	{
            
		$erreur = null;
	
		if(!in_array($this->file['extension'], $this->extension)) //Si l'extension n'est pas dans le tableau
		{
		     $erreur = 'Vous devez uploader un fichier de type';
		     	
		     foreach ($this->extension as $value):
		     $erreur .=', '.$value;
		     endforeach;

		     
		}
		if($this->file['size']>$this->tailleMax)
		{
		     $erreur = 'Le fichier est trop gros...';
		}
		
		if($erreur == null) //S'il n'y a pas d'erreur, on upload
		{
		     
		   if(is_dir($this->dossier)) 
		   {
		    
		 
		    	if($this->doResize)
		    	{
		    		try {
			    		//$erreur =$this->resizeThumb(400,400);
			    		//$erreur =$this->resizeThumb(50,50);
			    		
			    		if($erreur==null)
			    		return 'OK';
			    		else
			    		return $erreur;
			    		
		    		} catch (Exception $e) {
		    			return 'Echec de l\'upload '.$e->getMessage();
		    		}
		    		
		    		
		    	}else
		    	{
		    		
				    if(move_uploaded_file($this->file['tmp_name'],$this->dossier.'/'.$this->file['name']))
				    {
				    	
				         // return 'Upload effectué avec succès dans le dossier '.$this->dossier.' !';
				         return 'OK';
				     }
				     else //Sinon (la fonction renvoie FALSE).
				     {
				          return 'Echec de l\'upload !';
				     }
		    	}
		    
	
		   }
		   else
		    return 'Le dossier '.$this->dossier.' n\'existe pas';
		}
		else
		{
		     return $erreur;
		}
	}
	
	public function resizeThumb($width,$height)
	{
		$file = $this->file['tmp_name'];
		
		if($file==null)
		return 'Echec de l\'upload, essayer avec une photo moins lourde';
		
		$size = getimagesize($file);
		
		if(($size[0]<$width && $size[1]>$height) || ($size[0]<$width && $size[1]<$height))
		{
			
			$w = $size[0]* ($width/$size[1]);
			$h = $height;
		}
		if($size[0]>$width && $size[1]<$height)
		{
			
			
			$h = $size[1]* ($height/$size[0]);
			$w = $width;
		}
		else
		{
			$w = $width;
			$h = $height;
		}
		
		
					require_once __DIR__.'/phpthumb/ThumbLib.inc.php';
					
			    	$thumb = \PhpThumbFactory::create($file);
					$thumb->adaptiveResize($w, $h);
					$thumb->save($this->dossier.'/'.$this->fileName.'.png','png');
	}
	public function resize()
	{
		//$file = 'image.jpg' ; # L'emplacement de l'image à redimensionner. L'image peut être de type jpeg, gif ou png
		
		//$x = 125;
		
	//	$y = 75; # Taille en pixel de l'image redimensionnée
		
		$size = getimagesize($this->file['path']);
		
		if ( $size) {
		//echo 'Image en cours de redimensionnement...';
		$this->getSize($size);
		
		if ($size['mime']=='image/jpeg' ) {

		
		
		
		$img_big = imagecreatefromjpeg($this->file['path']); # On ouvre l'image d'origine
		$img_new = imagecreate($this->x, $this->y);
		# création de la miniature
		$img_mini = imagecreatetruecolor($this->x, $this->y);
		//or   $img_mini = imagecreate($this->x, $this->y);
		
		
		// copie de l'image, avec le redimensionnement.
		imagecopyresized($img_mini,$img_big,0,0,0,0,$this->x,$this->y,$size[0],$size[1]);
		
		//imagejpeg($img_mini,$this->file['path'] );
		imagejpeg($img_mini,$this->file['path'] );
		
		
		}
		elseif ($size['mime']=='image/png' ) {
		$img_big = imagecreatefrompng($this->file['path']); # On ouvre l'image d'origine
		$img_new = imagecreate($this->x, $this->y);
		# création de la miniature
		$img_mini = imagecreatetruecolor($this->x, $this->y);
		//or   $img_mini = imagecreate($x, $y);
		
		//imagecopy($img_mini,$img_big,0,0,100,100,$this->x, $this->y);
		

		// copie de l'image, avec le redimensionnement.
		imagecopyresized($img_mini,$img_big,0,0,0,0,$this->x,$this->y,$size[0],$size[1]);
		
		imagepng($img_mini,$this->file['path'] );
		
		}
		elseif ($size['mime']=='image/gif' ) {
		$img_big = imagecreatefromgif($this->file['path']); # On ouvre l'image d'origine
		$img_new = imagecreate($this->x, $this->y);
		# création de la miniature
		$img_mini = imagecreatetruecolor($this->x, $this->y);
		//or   $img_mini = imagecreate($this->x, $this->y);
		
		// copie de l'image, avec le redimensionnement.
		imagecopyresized($img_mini,$img_big,0,0,0,0,$this->x,$this->y,$size[0],$size[1]);
		
		imagegif($img_mini,$this->file['path'] );
		
		}
		
		//echo 'Image redimensionnée !'; 
		}
	}
	public function getSize($size)
	{
		$this->y = $size[1] * ($this->x / $size[0]);
	}
	
	public static function getFileDir($dir,$list_tri="DESC")
	{
				
		// *******************************************************/
		// Lister un repertoire par ordre alphabétique avec la fonction readdir()
		// Code qui passe sur tous les serveurs
		
		    
		if(!is_dir($dir))
		return false;
		
		//die($dir);
		// ouvre le rep
		  $dp = opendir($dir);
		
		  $i=0;
		 
		  while ( $file = readdir($dp) )
		  {
		  	
		    // enleve les fichiers . et ..
		    if ($file != '.' && $file != '..')
		    {
		            // on passe les datas dans un tableau
		            $ListFiles[$i][substr(strtolower(strrchr(basename($file), ".")), 1)]=$file;
		            $i++;
		    }
		 }
		  closedir($dp);
		
		
		// tri par ordre decroissant
		 /* if(count($ListFiles)!=0)
		  {
		     if($list_tri == 'DESC')
		     {
		         rsort($ListFiles);
		     }
		     else
		     {
		         sort($ListFiles);
		     }
		  }
		*/
		
		return $ListFiles;
    }

  
}