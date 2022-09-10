<?php

declare(strict_types=1);

/*
 * This file is part of the Clivern/Midway project.
 * (c) Clivern <hello@clivern.com>
 */

namespace App\Entity;

use App\Repository\NewsletterMetaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * NewsletterMeta Entity.
 */
#[ORM\Entity(repositoryClass: NewsletterMetaRepository::class)]
class NewsletterMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $key = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value = null;

    #[ORM\OneToOne(targetEntity: Newsletter::class, mappedBy: 'newsletter')]
    private $newsletter;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * Get ID.
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get a Key.
     *
     * @return string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Set a Key.
     *
     * @param string
     *
     * @return Option
     */
    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get a Value.
     *
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Set a Value.
     *
     * @param string
     *
     * @return Option
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get Newsletter.
     *
     * @return Newsletter
     */
    public function getNewsletter(): ?Newsletter
    {
        return $this->newsletter;
    }

    /**
     * Set Newsletter.
     *
     * @param Newsletter
     *
     * @return NewsletterMeta
     */
    public function setNewsletter(?Newsletter $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get CreatedAt.
     *
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    /**
     * Set Created At.
     *
     * @param \DateTimeImmutable
     *
     * @return DateTimeImmutable
     */
    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get Updated At.
     *
     * @return DateTimeImmutable
     */
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    /**
     * Set Updated At.
     *
     * @param \DateTimeImmutable
     *
     * @return NewsletterMeta
     */
    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Create an option from an array.
     */
    public static function fromArray(array $data): NewsletterMeta
    {
        return (new NewsletterMeta())
            ->setKey($data['key'])
            ->setValue($data['value'])
            ->setNewsletter($data['newsletter'])
            ->setCreatedAt($data['createdAt'])
            ->setUpdatedAt($data['updatedAt']);
    }
}