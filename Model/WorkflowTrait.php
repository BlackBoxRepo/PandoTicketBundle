<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait WorkflowTrait
{
    use BaseTrait;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $stepName;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $flowOrder;

    /**
     * @ORM\Column(type="boolean")
     */
    private $exclusive;

    /**
     * @ORM\ManyToMany(targetEntity="Note", inversedBy="employee")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false, unique=true)}
     * )
     */
    private $tickets;
}
