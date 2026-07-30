<?php

namespace App\Repository;

use App\Model\User;
use PDO;

class UserRepo extends DataBaseRepo
{
    protected string $table = 'user';

    public function __construct(
        protected PDO $pdo
    ) {
        parent::__construct($pdo);
    }

    public function findByUsername($username): mixed
    {
        $sql = 'SELECT *
                FROM user
                WHERE username = :username';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('username', $username);

        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new User(...$props));

        if (empty($user[0])) {
            return false;
        }

        $user[0]->setRegistry(Registry::getInstance());

        return $user[0];
    }

    public function createUser($userType, $username, $firstname, $lastname, $birthday, $email, $street, $houseNumber, $city, $postalCode, $latLon, $password): void
    {
        $createdAt = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO user(user_type, username, firstname, lastname, birthday, email, street, house_number, city, postal_code, lat, lon, password, created_at)
                        VALUES(:userType, :username, :firstname, :lastname, :birthday, :email, :street, :houseNumber, :city, :postalCode, :lat, :lon, :password, :createdAt)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam('userType', $userType);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('firstname', $firstname);
        $stmt->bindParam('lastname', $lastname);
        $stmt->bindParam('birthday', $birthday);
        $stmt->bindParam('password', $password);
        $stmt->bindParam('email', $email);
        $stmt->bindParam('street', $street);
        $stmt->bindParam('houseNumber', $houseNumber);
        $stmt->bindParam('city', $city);
        $stmt->bindParam('postalCode', $postalCode);

        $stmt->bindParam('lat', $latLon['lat']);
        $stmt->bindParam('lon', $latLon['lon']);

        $stmt->bindParam('createdAt', $createdAt);

        $stmt->execute();
    }

    public function editUser($id, $profilePicture, $street, $houseNumber, $city, $postalCode, $latLon, $caption): void
    {
        $sql = 'UPDATE user
                SET profile_picture = :profilePicture,
                street = :street,
                house_number = :houseNumber,
                city = :city,
                postal_code = :postalCode, 
                lat = :lat,
                lon = :lon,
                caption = :caption
                WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('profilePicture', $profilePicture);
        $stmt->bindParam('street', $street);
        $stmt->bindParam('houseNumber', $houseNumber);
        $stmt->bindParam('city', $city);
        $stmt->bindParam('postalCode', $postalCode);

        $stmt->bindParam('lat', $latLon['lat']);
        $stmt->bindParam('lon', $latLon['lon']);

        $stmt->bindParam('caption', $caption);
        $stmt->execute();
    }
}
