<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait TicketTrait
{
    use BaseTrait;

    /**
     * @ORM\Column(type="integer", unique=true, options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $number;

    /**
     * @ORM\Column(type="string")
     */
    private $summary;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="TicketStatusType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(
     *     name="ticket_assignee",
     *     joinColumns={@ORM\JoinColumn(nullable=false, unique=true)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false)}
     * )
     */
    private $assignedTo;

    /**
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(
     *      name="ticket_subscriber",
     *      joinColumns={@ORM\JoinColumn(nullable=false)},
     *      inverseJoinColumns={@ORM\JoinColumn(nullable=false)}
     * )
     */
    private $subscribers;

    /**
     * @ORM\ManyToMany(targetEntity="Workflow", mappedBy="tickets")
     */
    private $workflow;

    /**
     * @ORM\ManyToMany(targetEntity="Note", inversedBy="ticket")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false, unique=true)}
     * )
     */
    private $notes;
}
