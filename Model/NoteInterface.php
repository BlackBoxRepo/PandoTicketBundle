<?php
namespace BlackBoxCode\Pando\TicketBundle\Model;

interface NoteInterface extends \BlackBoxCode\Pando\NoteBundle\Model\NoteInterface
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
