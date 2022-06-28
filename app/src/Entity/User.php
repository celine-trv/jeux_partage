<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 * 		fields={"email"},
 * 		message="Un compte existe déjà avec cet email",
 * 		groups={"registration"}
 * )
 * @UniqueEntity(
 * 		fields={"username"},
 * 		message="Ce nom d'utilisateur existe déjà",
 * 		groups={"registration"}
 * )
 * 
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir un nom d'utilisateur"
	 * )
     * 
     * @Assert\Length(
	 * 		min="4", 
	 * 		minMessage="Merci de saisir un nom d'utilisateur d'au moins 4 caractères",
	 * 		groups={"registration"}
	 * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir un email",
	 * 		groups={"registration"}
	 * )
	 * 
	 * @Assert\Email(
	 * 		message="Merci de saisir un email valide",
	 * 		groups={"registration"}
	 * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
	 * 
     * @Assert\Length(
	 * 		min="8", 
	 * 		minMessage="8 caractères minimum",
	 * 		groups={"registration"}
	 * )
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir un mot de passe",
	 * 		groups={"registration"}
	 * )
     */
    private $password;

    /**
	 * @Assert\NotBlank(
	 * 		message="Merci de confirmer le mot de passe",
	 * 		groups={"registration"}
	 * )
     * @Assert\EqualTo(
     * 		propertyPath="password",
     *      message="Mots de passe non identiques",
	 * 		groups={"registration"}
     * )
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir votre prénom",
	 * 		groups={"profil"}
	 * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir votre nom",
	 * 		groups={"profil"}
	 * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir votre adresse",
	 * 		groups={"profil"}
	 * )
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir votree code postal",
	 * 		groups={"profil"}
	 * )
	 *  
	 * @Assert\Regex(
     *     pattern="/^78[0-9]{3}$/",
     *     message="Votre code postal doit commencer par 78",
	 * 	   groups={"profil"}
	 * )
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * 
	 * @Assert\NotBlank(
	 * 		message="Merci de saisir votre ville",
	 * 		groups={"profil"}
	 * )
     */
    private $city;

	/**
     * @ORM\Column(type="boolean")
     */
    private $isRegistered;

	/**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="owner", orphanRemoval=true)
     */
    private $games;

    /**
     * @ORM\Column(
	 * 		type="boolean",
	 * 		options={"default":0}
	 * )
     */
    private $isArchived = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

	public function eraseCredentials()
                      {
                  
                      }

    public function getSalt()
    {

    }

    public function getRoles(): array
    {
        // return ['ROLE_USER'];
		return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getIsRegistered(): ?bool
    {
        return $this->isRegistered;
    }

    public function setIsRegistered(bool $isRegistered): self
    {
        $this->isRegistered = $isRegistered;

        return $this;
    }

	/**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->setOwner($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            // set the owning side to null (unless already changed)
            if ($game->getOwner() === $this) {
                $game->setOwner(null);
            }
        }

        return $this;
    }

    public function getIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(bool $isArchived): self
    {
        $this->isArchived = $isArchived;

        return $this;
    }

}
