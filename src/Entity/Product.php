<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 *
 * @package   App\Entity
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 *
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * Description $id field
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @var int $id
     */
    private int $id;
    /**
     * Description $sku field
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string $sku
     */
    private string $sku;
    /**
     * Description $title field
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string $title
     */
    private string $title;
    /**
     * Description $isEnabled field
     *
     * @ORM\Column(type="boolean")
     *
     * @var bool $isEnabled
     */
    private bool $isEnabled = false;
    /**
     * Description $price field
     *
     * @ORM\Column(type="float")
     *
     * @var float $price
     */
    private float $price;
    /**
     * Description $currency field
     *
     * @ORM\Column(type="string", length=2)
     *
     * @var string $currency
     */
    private string $currency;
    /**
     * Description $description field
     *
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string|null $description
     */
    private ?string $description;
    /**
     * Description $createdAt field
     *
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime $createdAt
     */
    private \DateTime $createdAt;

    /**
     * Product constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Description getId function
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Description getSku function
     *
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * Description setSku function
     *
     * @param string $sku
     *
     * @return $this
     */
    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Description getTitle function
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Product
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Description getIsEnabled function
     *
     * @return bool|null
     */
    public function getIsEnabled(): ?bool
    {
        return $this->isEnabled;
    }

    /**
     * Description setIsEnabled function
     *
     * @param bool $isEnabled
     *
     * @return $this
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Description getPrice function
     *
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * Description setPrice function
     *
     * @param float $price
     *
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Description getCurrency function
     *
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Description setCurrency function
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Description getDescription function
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Description setDescription function
     *
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Description getCreatedAt function
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Description setCreatedAt function
     *
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
