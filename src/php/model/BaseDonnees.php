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

  public function __construct(){
   try{ //On se connecte à notre base avec notre identifiant
      $chaine="mysql:host=localhost;dbname=E155059S";
      $this->connexion = new PDO($chaine,"E155059S","E155059S");
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     }
    catch(PDOException $e){
      $exception=new ConnexionException("problème de connection à la base");
      throw $exception;
    }
  }


// méthode qui permet de se deconnecter de la base
public function deconnexion(){
   $this->connexion=null;
}



// Méthode qui indique si un pseudo est présent dans la table joueurs

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

// Méthode qui renvoie le mot de passe associé à un joueur

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

// Méthode qui insère un tuple dans la table joueurs, après vérification de l'unicité du pseudo

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

// Méthode qui renvoie des statistiques sur le stuples concernant un joueur donné dans la table parties

function getStatsJoueur($pseudo){
  try{
    // Nombre de partie gagnées
    $statement = $this->connexion->prepare("select sum(partieGagnee) from parties where pseudo=? and partieGagnee=1;");
    $statement->bindParam(1, $pseudoParam);
    $pseudoParam=$pseudo;
    $statement->execute();
    $result=$statement->fetch(PDO::FETCH_ASSOC);

    //Nombre de parties jouées
    $statement2 = $this->connexion->prepare("select count(*) from parties where pseudo=?;");
    $statement2->bindParam(1, $pseudoParam);
    $pseudoParam=$pseudo;
    $statement2->execute();
    $result2=$statement2->fetch(PDO::FETCH_ASSOC);

    // Nombre de coups totaux dans les parties gagnées
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


// Méthode qui insère un tuple dans la table parties à partir des données de la partie passée

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

/*
Méthode qui renvoie les 5 tuples possédant le nombre de coups le plus faible dans la table parties
*/
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
