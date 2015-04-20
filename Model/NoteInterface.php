<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

interface NoteInterface extends \BlackBoxCode\Pando\Bundle\NoteBundle\Model\NoteInterface
{
    /**
     * @return TicketInterface
     */
    public function getTicket();

    /**
     * @param TicketInterface $ticket
     * @return $this
     */
    public function setTicket(TicketInterface $ticket);
}
