<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MyEntity.
 *
 * @ORM\Table(name="my_entity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MyEntityRepository")
 * @Assert\GroupSequence({"MyEntity", "group1", "group2", "group3"})
 */
class MyEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="onefield", type="string", length=255)
     * @Assert\Regex("/[a-z]+/", message="message1", groups={"group1"})
     * @Assert\Regex("/[a-z]+[0-9]+/", message="message2", groups={"group2"})
     * @Assert\Regex("/[a-z]+[0-9]+[-]+/", message="message3", groups={"group3"})
     */
    private $onefield;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set onefield.
     *
     * @param string $onefield
     *
     * @return MyEntity
     */
    public function setOnefield($onefield)
    {
        $this->onefield = $onefield;

        return $this;
    }

    /**
     * Get onefield.
     *
     * @return string
     */
    public function getOnefield()
    {
        return $this->onefield;
    }
}
