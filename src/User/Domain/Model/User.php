<?php

namespace App\User\Domain\Model;

use App\User\Domain\ValueObject\Name;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\UserId;
use App\User\Domain\ValueObject\Password;

final class User
{
    private UserId $id;
    private Email $email;
    private Password $password;
    private array $roles;
    private Name $firstName;
    private Name $lastName;

    private function __construct(
        UserId $id,
    ) {
        $this->id = $id;
    }

    public static function registerUser(
        Email $email,
        Password $password,
        array $roles,
        Name $firstName,
        Name $lastName,
    ): self {
        $userId = new UserId();
        $user = new self($userId);

        $user->setEmail($email)
            ->setRoles($roles)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setPassword($password);

        return $user;
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    private function setEmail(Email $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    private function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        $roeles = $this->roles;

        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    private function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getFirstName(): Name
    {
        return $this->firstName;
    }

    private function setFirstName(Name $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }
    public function getLastName(): Name
    {
        return $this->lastName;
    }

    private function setLastName(Name $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
