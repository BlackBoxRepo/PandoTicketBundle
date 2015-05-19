<?php
namespace BlackBoxCode\Pando\TicketBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\TypeTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait TicketStatusTypeTrait
{
    use TypeTrait;
}
