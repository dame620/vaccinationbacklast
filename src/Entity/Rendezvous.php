<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Controller\RendezvousController;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiFilter(SearchFilter::class, properties={"enfant.numordre": "exact"})
 * @ApiResource(
 *
 * normalizationContext={"groups"={"readertrans"}},
 * denormalizationContext={"groups"={"writertrans"}},
 *
 * collectionOperations={
 * 
 * 
 * "POST"={
 *     "controller"=RendezvousController::class,
 * 
 *      },
 * 
 * "GETALLUSER"={
 * "method"="GET",
 *
 *   }
 * },
 * 
 * itemOperations={
 *    
 * "recuperationadmin"={
 *      "method"="GET",
 *      
 * },
 
 * "PUT"={
 * 
 *   "controller"=RendezvousController::class,
 * },
 * } 
 * )
 * @ORM\Entity(repositoryClass="App\Repository\RendezvousRepository")
 */
class Rendezvous
{
    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Enfant", inversedBy="rendezvouses")
     */
    private $enfant;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Action", inversedBy="rendezvouses",cascade={"persist"})
     */
    private $action;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="rendezvouses")
     */
    private $user;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $daterv;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $etatrv;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $oeudeme;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poidstaille;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tailleage;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poidsage;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taille;


    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $age;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poid;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $milda;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pb;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alaitement;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libactionrv;

    public function __construct()
    {
        $this->etatrv = false;
    }
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnfant(): ?Enfant
    {
        return $this->enfant;
    }

    public function setEnfant(?Enfant $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }

    public function getAction(): ?Action
    {
        return $this->action;
    }

    public function setAction(?Action $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDaterv(): ?\DateTimeInterface
    {
        return $this->daterv;
    }

    public function setDaterv(?\DateTimeInterface $daterv): self
    {
        $this->daterv = $daterv;

        return $this;
    }

    public function getEtatrv(): ?bool
    {
        return $this->etatrv;
    }

    public function setEtatrv(?bool $etatrv): self
    {
        $this->etatrv = $etatrv;

        return $this;
    }

    public function getOeudeme(): ?string
    {
        return $this->oeudeme;
    }

    public function setOeudeme(?string $oeudeme): self
    {
        $this->oeudeme = $oeudeme;

        return $this;
    }

    public function getPoidstaille(): ?string
    {
        return $this->poidstaille;
    }

    public function setPoidstaille(?string $poidstaille): self
    {
        $this->poidstaille = $poidstaille;

        return $this;
    }

    public function getTailleage(): ?string
    {
        return $this->tailleage;
    }

    public function setTailleage(?string $tailleage): self
    {
        $this->tailleage = $tailleage;

        return $this;
    }

    public function getPoidsage(): ?string
    {
        return $this->poidsage;
    }

    public function setPoidsage(?string $poidsage): self
    {
        $this->poidsage = $poidsage;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }


    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPoid(): ?string
    {
        return $this->poid;
    }

    public function setPoid(?string $poid): self
    {
        $this->poid = $poid;

        return $this;
    }

    public function getMilda(): ?string
    {
        return $this->milda;
    }

    public function setMilda(?string $milda): self
    {
        $this->milda = $milda;

        return $this;
    }

    public function getPb(): ?string
    {
        return $this->pb;
    }

    public function setPb(?string $pb): self
    {
        $this->pb = $pb;

        return $this;
    }

    public function getAlaitement(): ?string
    {
        return $this->alaitement;
    }

    public function setAlaitement(?string $alaitement): self
    {
        $this->alaitement = $alaitement;

        return $this;
    }

    public function getLibactionrv(): ?string
    {
        return $this->libactionrv;
    }

    public function setLibactionrv(?string $libactionrv): self
    {
        $this->libactionrv = $libactionrv;

        return $this;
    }

}
