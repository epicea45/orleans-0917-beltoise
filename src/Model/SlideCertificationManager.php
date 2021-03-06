<?php

namespace Beltoise\Model;


class SlideCertificationManager extends EntityManager
{
    public function findAllCertifications()
    {
        $query = "SELECT * FROM slide_certification WHERE role='CERTIFICATION'";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\SlideCertification::class);
    }

    public function findAllSlides()
    {
        $query = "SELECT * FROM slide_certification WHERE role='SLIDE'";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\SlideCertification::class);
    }

    public function find(int $id) : SlideCertification
    {
        $query = "SELECT * FROM slide_certification WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $slideCertification = $statement->fetchAll(\PDO::FETCH_CLASS, \Beltoise\Model\SlideCertification::class);
        return $slideCertification[0];
    }

    public function delete(SlideCertification $slideCertification)
    {
        $query = "DELETE FROM slide_certification WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $slideCertification->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    public function insert(SlideCertification $slideCertification)
    {
        $query = "INSERT INTO slide_certification 
                  (role, name) 
                  VALUES (:role, :name)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('role', $slideCertification->getRole(), \PDO::PARAM_STR);
        $statement->bindValue('name', $slideCertification->getName(), \PDO::PARAM_STR);
        $statement->execute();
    }
}
