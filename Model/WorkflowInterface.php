<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface WorkflowInterface extends IdInterface
{
    /**
     * @return string
     */
    public function getStepName();

    /**
     * @param string $stepName
     * @return $this
     */
    public function setStepName($stepName);

    /**
     * @return integer
     */
    public function getFlowOrder();

    /**
     * @param integer $flowOrder
     * @return $this
     */
    public function setFlowOrder($flowOrder);

    /**
     * @return boolean
     */
    public function getExclusive();

    /**
     * @param boolean $exclusive
     * @return $this
     */
    public function setExclusive($exclusive);

    /**
     * @return ArrayCollection<TicketInterface>
     */
    public function getTickets();

    /**
     * @param TicketInterface $ticket
     * @return $this
     */
    public function addTicket(TicketInterface $ticket);

    /**
     * @param TicketInterface $ticket
     */
    public function removeTicket(TicketInterface $ticket);
}
