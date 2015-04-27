<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdInterface;
use BlackBoxCode\Pando\Bundle\UserBundle\Model\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(indexes={
 *     @ORM\Index(columns={"createdOn"}),
 *     @ORM\Index(columns={"updatedOn"})
 * })
 */
interface TicketInterface extends IdInterface
{
    /**
     * @return integer
     */
    public function getNumber();

    /**
     * @param integer $number
     * @return $this
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getSummary();

    /**
     * @param string $summary
     * @return $this
     */
    public function setSummary($summary);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return \DateTime
     */
    public function getCreatedOn();

    /**
     * @param \DateTime $createdOn
     * @return $this
     */
    public function setCreatedOn(\DateTime $createdOn);

    /**
     * @return \DateTime
     */
    public function getUpdatedOn();

    /**
     * @param \DateTime $updatedOn
     * @return $this
     */
    public function setUpdatedOn(\DateTime $updatedOn);

    /**
     * @return TicketStatusTypeInterface
     */
    public function getStatus();

    /**
     * @param TicketStatusTypeInterface $status
     * @return $this
     */
    public function setStatus(TicketStatusTypeInterface $status);

    /**
     * @return UserInterface
     */
    public function getCreatedBy();

    /**
     * @param UserInterface $createdBy
     * @return $this
     */
    public function setCreatedBy(UserInterface $createdBy);

    /**
     * @return UserInterface
     */
    public function getAssignee();

    /**
     * @param UserInterface $assignee
     * @return $this
     */
    public function setAssignee(UserInterface $assignee);

    /**
     * @return ArrayCollection<UserInterface>
     */
    public function getSubscribers();

    /**
     * @param UserInterface $subscriber
     * @return $this
     */
    public function addSubscriber(UserInterface $subscriber);

    /**
     * @param UserInterface $subscriber
     */
    public function removeSubscriber(UserInterface $subscriber);

    /**
     * @return WorkflowInterface
     */
    public function getWorkflow();

    /**
     * @param WorkflowInterface $workflow
     * @return $this
     */
    public function setWorkflow(WorkflowInterface $workflow);

    /**
     * @return ArrayCollection<NoteInterface>
     */
    public function getNotes();

    /**
     * @param NoteInterface $note
     * @return $this
     */
    public function addNote(NoteInterface $note);

    /**
     * @param NoteInterface $note
     */
    public function removeNote(NoteInterface $note);
}
