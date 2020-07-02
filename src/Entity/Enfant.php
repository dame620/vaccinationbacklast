<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Controller\EnfantController;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiFilter(SearchFilter::class, properties={"numordre": "exact"})
 * @ApiResource(
 * collectionOperations={
 * 
 * 
 * "POST"={
 *     "controller"=EnfantController::class,
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
 * 
 * "PUT"={ 
 * },
 * } 
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EnfantRepository")
 */
class Enfant
{
    /**
     * @Groups({"readertrans", "writertrans"})
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenommere;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nommere;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numetatcivil;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $telmere;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numordre;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomchefquartier;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomchefquartier;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telchefquartier;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telbadiennegokh;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etatentree;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etatsortie;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="text", nullable=true)
     */
    private $motifsortie;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenombadienegokh;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombadienegokh;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rendezvous", mappedBy="enfant")
     */
    private $rendezvouses;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="enfants")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telpere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numvilla;

    public function __construct()
    {
        $this->rendezvouses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPrenommere(): ?string
    {
        return $this->prenommere;
    }

    public function setPrenommere(?string $prenommere): self
    {
        $this->prenommere = $prenommere;

        return $this;
    }

    public function getNommere(): ?string
    {
        return $this->nommere;
    }

    public function setNommere(?string $nommere): self
    {
        $this->nommere = $nommere;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumetatcivil(): ?string
    {
        return $this->numetatcivil;
    }

    public function setNumetatcivil(?string $numetatcivil): self
    {
        $this->numetatcivil = $numetatcivil;

        return $this;
    }

    public function getTelmere(): ?int
    {
        return $this->telmere;
    }

    public function setTelmere(?int $telmere): self
    {
        $this->telmere = $telmere;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getNumordre(): ?string
    {
        return $this->numordre;
    }

    public function setNumordre(?string $numordre): self
    {
        $this->numordre = $numordre;

        return $this;
    }

    public function getNomchefquartier(): ?string
    {
        return $this->nomchefquartier;
    }

    public function setNomchefquartier(?string $nomchefquartier): self
    {
        $this->nomchefquartier = $nomchefquartier;

        return $this;
    }

    public function getPrenomchefquartier(): ?string
    {
        return $this->prenomchefquartier;
    }

    public function setPrenomchefquartier(?string $prenomchefquartier): self
    {
        $this->prenomchefquartier = $prenomchefquartier;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelchefquartier(): ?int
    {
        return $this->telchefquartier;
    }

    public function setTelchefquartier(?int $telchefquartier): self
    {
        $this->telchefquartier = $telchefquartier;

        return $this;
    }

    public function getTelbadiennegokh(): ?int
    {
        return $this->telbadiennegokh;
    }

    public function setTelbadiennegokh(?int $telbadiennegokh): self
    {
        $this->telbadiennegokh = $telbadiennegokh;

        return $this;
    }

    public function getEtatentree(): ?string
    {
        return $this->etatentree;
    }

    public function setEtatentree(?string $etatentree): self
    {
        $this->etatentree = $etatentree;

        return $this;
    }

    public function getEtatsortie(): ?string
    {
        return $this->etatsortie;
    }

    public function setEtatsortie(?string $etatsortie): self
    {
        $this->etatsortie = $etatsortie;

        return $this;
    }

    public function getMotifsortie(): ?string
    {
        return $this->motifsortie;
    }

    public function setMotifsortie(?string $motifsortie): self
    {
        $this->motifsortie = $motifsortie;

        return $this;
    }

    public function getPrenombadienegokh(): ?string
    {
        return $this->prenombadienegokh;
    }

    public function setPrenombadienegokh(?string $prenombadienegokh): self
    {
        $this->prenombadienegokh = $prenombadienegokh;

        return $this;
    }

    public function getNombadienegokh(): ?string
    {
        return $this->nombadienegokh;
    }

    public function setNombadienegokh(?string $nombadienegokh): self
    {
        $this->nombadienegokh = $nombadienegokh;

        return $this;
    }


    /**
     * @return Collection|Rendezvous[]
     */
    public function getRendezvouses(): Collection
    {
        return $this->rendezvouses;
    }

    public function addRendezvouse(Rendezvous $rendezvouse): self
    {
        if (!$this->rendezvouses->contains($rendezvouse)) {
            $this->rendezvouses[] = $rendezvouse;
            $rendezvouse->setEnfant($this);
        }

        return $this;
    }

    public function removeRendezvouse(Rendezvous $rendezvouse): self
    {
        if ($this->rendezvouses->contains($rendezvouse)) {
            $this->rendezvouses->removeElement($rendezvouse);
            // set the owning side to null (unless already changed)
            if ($rendezvouse->getEnfant() === $this) {
                $rendezvouse->setEnfant(null);
            }
        }

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

    public function getTelpere(): ?int
    {
        return $this->telpere;
    }

    public function setTelpere(?int $telpere): self
    {
        $this->telpere = $telpere;

        return $this;
    }

    public function getNumvilla(): ?string
    {
        return $this->numvilla;
    }

    public function setNumvilla(?string $numvilla): self
    {
        $this->numvilla = $numvilla;

        return $this;
    }
}
