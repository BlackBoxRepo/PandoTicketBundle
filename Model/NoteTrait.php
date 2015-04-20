<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

trait NoteTrait
{
    /**
     * @var ArrayCollection<TicketInterface>
     *
     * @ORM\ManyToMany(targetEntity="Ticket", mappedBy="notes")
     */
    private $tickets;

    /**
     * {@inheritdoc}
     */
    public function getTicket()
    {
        if (is_null($this->tickets)) $this->tickets = new ArrayCollection();
        return $this->tickets->first() ?: null;
    }

    /**
     * {@inheritdoc}
     */
    public function setTicket(TicketInterface $ticket)
    {
        if (is_null($this->tickets)) $this->tickets = new ArrayCollection();
        $this->tickets->clear();
        $this->tickets->add($ticket);

        return $this;
    }
}
