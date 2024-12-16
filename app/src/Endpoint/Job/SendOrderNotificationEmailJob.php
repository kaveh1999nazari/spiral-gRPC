<?php

namespace App\Endpoint\Job;

use App\Domain\Entity\Order;
use Spiral\Core\Attribute\Proxy;
use Spiral\Core\InvokerInterface;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Spiral\Queue\JobHandler;

class SendOrderNotificationEmailJob extends JobHandler
{
    public function __construct(#[Proxy] InvokerInterface $invoker,
                                    private readonly MailerInterface $mailer)
    {
        parent::__construct($invoker);
    }

    public function invoke(Order $order, string $status): void
    {
        $this->sendOrderStatusEmail($order, $status);
    }

    private function sendOrderStatusEmail(Order $order, string $status): void
    {
        $this->mailer->send(new Message(
            'emails/orderStatus.email.dark.php',
            $order->getUser()->getEmail(),
            [
                'first_name' => $order->getUser()->getFirstName(),
                'last_name' => $order->getUser()->getLastName(),
                'order_id' => $order->getId(),
                'order_status' => $order->getStatus(),
                'order_create' => $order->getCreatedAt()->format('Y-m-d H:i:s')
            ]
        ));
    }

}
