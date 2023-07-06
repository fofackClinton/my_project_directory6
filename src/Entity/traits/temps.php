<?php
namespace App\Entity\traits;
use Doctrine\ORM\Mapping as ORM;


trait temps
{
    
    #[ORM\Column]
    private ?\DateTimeImmutable $ceatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;


    public function getCeatedAt(): ?\DateTimeImmutable
    {
        return $this->ceatedAt;
    }

    public function setCeatedAt(\DateTimeImmutable $ceatedAt): static
    {
        $this->ceatedAt = $ceatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]   
    public function updatemethode()
    {
        if( $this->getceatedAt() === null)
        {
            $this->setCeatedAt(new \DateTimeImmutable);
        } 
        $this->setUpdatedAt(new \DateTimeImmutable);
    }
}