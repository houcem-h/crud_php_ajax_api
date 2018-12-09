<?php
require_once 'dbconnect.class.php';
class compte
{
    private $cnx;

    public function __construct()
    {
        $bd = new Database;
        $connect = $bd->connectDB();
        $this->cnx = $connect;
    }

    public function execReq($sql)
    {
        $stmt = $this->cnx->prepare($sql);
        return $stmt;
    }

    public function createAccount($titulaire, $solde, $devise)
    {
        try {
            $id = mt_rand(10000000000, 99999999999);
            $codeBank = mt_rand(10000, 99999);
            $codeGuichet = mt_rand(10000, 99999);
            $clerib = mt_rand(10, 99);
            $datecreation = date("j-n-Y");
            $sql = "INSERT INTO comptes(id,codebank,codeguichet,clerib,titulaire,solde,devise,datecreation) VALUES (:compte_id,:compte_codeBank,:compte_codeGuichet,:compte_clerib,:compte_titulaire,:compte_solde,:compte_devise,:compte_datecreation)";
            $result = $this->execReq($sql);
            $result->bindparam(":compte_id", $id);
            $result->bindparam(":compte_codeBank", $codeBank);
            $result->bindparam(":compte_codeGuichet", $codeGuichet);
            $result->bindparam(":compte_clerib", $clerib);
            $result->bindparam(":compte_titulaire", $titulaire);
            $result->bindparam(":compte_solde", $solde);
            $result->bindparam(":compte_devise", $devise);
            $result->bindparam(":compte_datecreation", $datecreation);
            $result->execute();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function readAllAccounts()
    {
        try {
            $sql = 'SELECT * FROM comptes ORDER BY datecreation,id DESC ';
            $result = $this->execReq($sql);
            $result->execute();
            return $result;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function readSpecificAccount($id)
    {
        try {
            $sql = 'SELECT * FROM comptes WHERE id = :compte_id';
            $req = $this->execReq($sql);
            $req->bindparam(":compte_id", $id);
            $req->execute();
            return $req;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    public function readSpecificTitulaire($titulaire)
    {
        try {
            $sql = 'SELECT * FROM comptes WHERE titulaire = :compte_titulaire';
            $req = $this->execReq($sql);
            $req->bindparam(":compte_titulaire", $titulaire);
            $req->execute();
            return $req;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateAccount($id, $devise)
    {
        try {
            $sql = 'UPDATE comptes SET nom = :compte_devise WHERE id = :compte_id';
            $result = $this->execReq($sql);
            $result->bindparam(":compte_id", $id);
            $result->bindparam(":compte_devise", $devise);
            $result->execute();
            return $result;

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function deactivateAccount($id)
    {
        try {
            $sql = 'UPDATE comptes SET etat = "Inactif" WHERE id = :compte_id';
            $result = $this->execReq($sql);
            $result->bindparam(":compte_id", $id);
            $result->execute();
            return $result;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    private function getSolde($id)
    {
        try {
            $sql = 'SELECT solde FROM comptes WHERE titulaire = :compte_id';
            $result = $this->execReq($sql);
            $result->bindparam(":compte_id", $id);
            $result->execute();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function updateSolde($compte, $montant)
    {
        try {
            $sql = 'UPDATE comptes SET solde = :compte_solde WHERE titulaire = :compte_titulaire';
            $result = $this->execReq($sql);
            $result->bindparam(":compte_solde", $montant);
            $result->bindparam(":compte_titulaire", $compte);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function credit($titulaire, $montant)
    {
        try {
            $query = $this->getSolde($titulaire);
            $solde = $query->fetchColumn();
            $solde += $montant;
            $this->updateSolde($titulaire, $solde);
        } catch (Exception $e) {
            echo $e->getMessage();;
        }
    }

    public function debit($titulaire, $montant)
    {
        try {
            $query = $this->getSolde($titulaire);
            $solde = $query->fetchColumn();
            $solde -= $montant;
            $this->updateSolde($titulaire, $solde);
        } catch (Exception $e) {
            echo $e->getMessage();;
        }
    }

  // public function updateAccount($id,$devise)
  // {
  //     try
  //     {
  //         $sql = 'UPDATE comptes SET nom = :compte_devise WHERE id = :compte_id';
  //         $result = $this->execReq($sql);
  //         $result->bindparam(":compte_id",$id);
  //         $result->bindparam(":compte_devise",$devise);
  //         $result->execute();
  //         return $result;
  //
  //     }
  //     catch (PDOException $exception)
  //     {
  //         echo $exception->getMessage();
  //     }
  // }
}
?>
