<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdTrait;
use BlackBoxCode\Pando\Bundle\UserBundle\Model\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

trait TicketTrait
{
    use IdTrait;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", unique=true, options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var TicketStatusTypeInterface
     *
     * @ORM\ManyToOne(targetEntity="TicketStatusType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @var ArrayCollection<UserInterface>
     *
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(
     *     name="ticket_assignee",
     *     joinColumns={@ORM\JoinColumn(nullable=false, unique=true)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false)}
     * )
     */
    private $assignees;

    /**
     * @var ArrayCollection<UserInterface>
     *
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(
     *      name="ticket_subscriber",
     *      joinColumns={@ORM\JoinColumn(nullable=false)},
     *      inverseJoinColumns={@ORM\JoinColumn(nullable=false)}
     * )
     */
    private $subscribers;

    /**
     * @var ArrayCollection<WorkflowInterface>
     *
     * @ORM\ManyToMany(targetEntity="Workflow", mappedBy="tickets")
     */
    private $workflows;

    /**
     * @var ArrayCollection<NoteInterface>
     *
     * @ORM\ManyToMany(targetEntity="Note", inversedBy="tickets")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false, unique=true)}
     * )
     */
    private $notes;
    
    
    /**
     * {@inheritdoc}
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setNumber($number)
    {
        $this->number = $number;
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getSummary()
    {
        return $this->summary;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus(TicketStatusTypeInterface $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedBy(UserInterface $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getAssignee()
    {
        if (is_null($this->assignees)) $this->assignees = new ArrayCollection();
        
        return $this->assignees->first() ?: null;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setAssignee(UserInterface $assignee)
    {
        if (is_null($this->assignees)) $this->assignees = new ArrayCollection();
        $this->assignees->clear();
        $this->assignees->add($assignee);
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getSubscribers()
    {
        if (is_null($this->subscribers)) $this->subscribers = new ArrayCollection();
        
        return $this->subscribers;
    }
    
    /**
     * {@inheritdoc}
     */
    public function addSubscriber(UserInterface $subscriber)
    {
        if (is_null($this->subscribers)) $this->subscribers = new ArrayCollection();
        $this->subscribers->add($subscriber);
    
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function removeSubscriber(UserInterface $subscriber)
    {
        if (is_null($this->subscribers)) $this->subscribers = new ArrayCollection();
        $this->subscribers->removeElement($subscriber);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getWorkflow()
    {
        if (is_null($this->workflows)) $this->workflows = new ArrayCollection();
        
        return $this->workflows->first() ?: null;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setWorkflow(WorkflowInterface $workflow)
    {
        if (is_null($this->workflows)) $this->workflows = new ArrayCollection();
        $this->workflows->clear();
        $this->workflows->add($workflow);
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getNotes()
    {
        if (is_null($this->notes)) $this->notes = new ArrayCollection();
        
        return $this->notes;
    }
    
    /**
     * {@inheritdoc}
     */
    public function addNote(NoteInterface $note)
    {
        if (is_null($this->notes)) $this->notes = new ArrayCollection();
        $this->notes->add($note);
    
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function removeNote(NoteInterface $note)
    {
        if (is_null($this->notes)) $this->notes = new ArrayCollection();
        $this->notes->removeElement($note);
    }
}
