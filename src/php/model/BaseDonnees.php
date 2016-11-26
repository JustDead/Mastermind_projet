<?php




// Classe generale de definition d'exception
class MonException extends Exception{
  private $chaine;
  public function __construct($chaine){
    $this->chaine=$chaine;
  }

  public function afficher(){
    return $this->chaine;
  }

}


// Exception relative à un probleme de connexion
class ConnexionException extends MonException{
}

// Exception relative à un probleme d'accès à une table
class TableAccesException extends MonException{
}


// Classe qui gère les accès à la base de données

class BaseDonnees{
private $connexion;

// Constructeur de la classe
// remplacer X par les informations qui vous concernent

  public function __construct(){
   try{
      $chaine="mysql:host=localhost;dbname=E155059S";
      $this->connexion = new PDO($chaine,"E155059S","E155059S");
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     }
    catch(PDOException $e){
      $exception=new ConnexionException("problème de connection à la base");
      throw $exception;
    }
  }




// A développer
// méthode qui permet de se deconnecter de la base
public function deconnexion(){
   $this->connexion=null;
}


//A développer
// utiliser une requête classique
// méthode qui permet de récupérer les pseudos dans la table pseudo
// post-condition:
//retourne un tableau à une dimension qui contient les pseudos.
// si un problème est rencontré, une exception de type TableAccesException est levée

public function getPseudos(){
 try{

$statement=$this->connexion->query("SELECT pseudo from joueurs;");

while($ligne=$statement->fetch()){
$result[]=$ligne['pseudo'];
}
return($result);
}
catch(PDOException $e){
    throw new TableAccesException("problème avec la table joueurs");
  }
}



//A développer
// utiliser une requête préparée
//vérifie qu'un pseudo existe dans la table pseudonyme
// post-condition retourne vrai si le pseudo existe sinon faux
// si un problème est rencontré, une exception de type TableAccesException est levée
public function exists($pseudo){
try{
	$statement = $this->connexion->prepare("select pseudo from joueurs where pseudo=?;");
	$statement->bindParam(1, $pseudoParam);
	$pseudoParam=$pseudo;
	$statement->execute();
	$result=$statement->fetch(PDO::FETCH_ASSOC);

	if ($result["pseudo"]!=null){
	return true;
	}
	else{
	return false;
	}
}
catch(PDOException $e){
    $this->deconnexion();
    throw new TableAccesException("problème avec la table joueurs");
    }
}

public function getMdp($pseudo){
try{
	$statement = $this->connexion->prepare("select motDePasse from joueurs where pseudo=?;");
	$statement->bindParam(1, $pseudoParam);
	$pseudoParam=$pseudo;
	$statement->execute();
	$result=$statement->fetch(PDO::FETCH_ASSOC);

	return $result['motDePasse'];
	}
catch(PDOException $e){
    $this->deconnexion();
    throw new TableAccesException("problème avec la table joueurs");
    }
}

public function inscrireJoueur($pseudo, $psw){
  if ($this->exists($pseudo)){ // Pseudo déjà dedans
    return false;
  }
  else{
    try{
      $statement = $this->connexion->prepare("INSERT INTO joueurs (pseudo, motDePasse) VALUES (?,?);");
      $statement->bindParam(1, $pseudo);
      $statement->bindParam(2, crypt($pseudo));
      $statement->execute();
      return true;
    }
    catch(PDOException $e){
      $this->deconnexion();
      throw new TableAccesException("problème avec la table joueurs");
      return false;
    }
  }
}

function getStatsJoueur($pseudo){
  try{
    $statement = $this->connexion->prepare("select sum(partieGagnee) from parties where pseudo=? and partieGagnee=1;");
    $statement->bindParam(1, $pseudoParam);
    $pseudoParam=$pseudo;
    $statement->execute();
    $result=$statement->fetch(PDO::FETCH_ASSOC);

    $statement2 = $this->connexion->prepare("select count(*) from parties where pseudo=?;");
    $statement2->bindParam(1, $pseudoParam);
    $pseudoParam=$pseudo;
    $statement2->execute();
    $result2=$statement2->fetch(PDO::FETCH_ASSOC);

    $statement3 = $this->connexion->prepare("select sum(nombreCoups) from parties where pseudo=? and partieGagnee=1;");
    $statement3->bindParam(1, $pseudoParam);
    $pseudoParam=$pseudo;
    $statement3->execute();
    $result3=$statement3->fetch(PDO::FETCH_ASSOC);

    return array($result['sum(partieGagnee)'],$result2['count(*)'],$result3['sum(nombreCoups)']);

  }
  catch(PDOException $e){
    $this->deconnexion();
    throw new TableAccesException("problème avec la table parties");
  }
}




//A développer
// utiliser uen requête préparée
// ajoute un message sur le salon => pseudonyme + message
// precondition: le pseudo existe dans la table pseudonyme
// post-condition: le message est ajouté dans la table salon
// si un problème est rencontré, une exception de type TableAccesException est levée

public function majParties($partie){
      try{
	$statement = $this->connexion->prepare("INSERT INTO parties (pseudo, partieGagnee, nombreCoups) VALUES (?,?,?);");
	$statement->bindParam(1, $partie->getPseudoJoueur());
	$statement->bindParam(2, $partie->getPartieGagnee());
  $statement->bindParam(3, $partie->getNbCoups());
	$statement->execute();

	}
    catch(PDOException $e){
    $this->deconnexion();
    throw new TableAccesException("problème avec la table parties");
    }
}






//A développer
//utiliser une requête classique
// méthode qui permet de récupérer les 10 derniers messages émis sur le salon
// post-condition:
//retourne un tableau à deux dimensions dont le premier indice est un entier (commence à 0) qui correspond au numéro de ligne du résultat
// c'est en fait simplement le résultat de l'application de la méthode fetchAll() avec le bon paramètre
// le second indice est une chaine de caractère qui correspond au nom de la colonne dans la table
// si un problème est rencontré, une exception de type TableAccesException est levée

public function getHighScores(){

      try{

$statement=$this->connexion->query("SELECT joueurs.pseudo,nombreCoups FROM joueurs, parties where joueurs.pseudo=parties.pseudo and parties.partieGagnee=1 ORDER BY parties.nombreCoups ASC LIMIT 0, 5;");
	return($statement->fetchAll(PDO::FETCH_ASSOC));
    }
  catch(PDOException $e){
    $this->deconnexion();
    throw new TableAccesException("problème avec la table parties");
  }
}


}

?>
