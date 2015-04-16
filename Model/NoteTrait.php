<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use Doctrine\ORM\Mapping as ORM;

trait NoteTrait
{
    /**
     * @ORM\ManyToMany(targetEntity="Ticket", mappedBy="notes")
     */
    private $ticket;
}
