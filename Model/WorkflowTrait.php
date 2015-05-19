<?php
namespace BlackBoxCode\Pando\TicketBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(indexes={@ORM\Index(columns={"flowOrder"})})
 */
trait WorkflowTrait
{
    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $stepName;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $flowOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $exclusive;

    /**
     * @var ArrayCollection<TicketInterface>
     *
     * @ORM\ManyToMany(targetEntity="Ticket", inversedBy="workflows")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false, unique=true)}
     * )
     */
    private $tickets;
    
    
    /**
     * {@inheritdoc}
     */
    public function getStepName()
    {
        return $this->stepName;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setStepName($stepName)
    {
        $this->stepName = $stepName;
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFlowOrder()
    {
        return $this->flowOrder;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setFlowOrder($flowOrder)
    {
        $this->flowOrder = $flowOrder;
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getExclusive()
    {
        return $this->exclusive ? true : false;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setExclusive($exclusive)
    {
        $this->exclusive = $exclusive;
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTickets()
    {
        if (is_null($this->tickets)) $this->tickets = new ArrayCollection();

        return $this->tickets;
    }

    /**
     * {@inheritdoc}
     */
    public function addTicket(TicketInterface $ticket)
    {
        if (is_null($this->tickets)) $this->tickets = new ArrayCollection();
        $this->tickets->add($ticket);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTicket(TicketInterface $ticket)
    {
        if (is_null($this->tickets)) $this->tickets = new ArrayCollection();
        $this->tickets->removeElement($ticket);
    }
}
