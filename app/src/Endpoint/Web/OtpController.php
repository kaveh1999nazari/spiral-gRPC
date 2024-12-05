<?php

namespace App\Endpoint\Web;

use Cycle\ORM\ORMInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Spiral\Http\Request\InputManager;
use Spiral\Mailer\Message;
use Spiral\Router\Annotation\Route;
use App\Domain\Entity\User;
use Spiral\Mailer\MailerInterface;

class OtpController
{
    private MailerInterface $mailer;

    public function __construct(private readonly ORMInterface $ORM, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    #[Route(route: '/api/send-otp', name: 'OTP-SENDER', methods: ['POST'])]
    public function sendOtp(ServerRequestInterface $request, InputManager $input): ResponseInterface
    {
        $userId = $input->input('user_id');
        $user = $this->ORM->getRepository(User::class)->findByPK($userId);

        if (!$user) {
            return $this->jsonResponse(['error' => 'User not found'], 404);
        }

        $otp = rand(100000, 999999);
        $expiration = new \DateTimeImmutable('+3 minutes');


        $this->ORM->getRepository(User::class)->setOtpForUser($user, $otp, $expiration);

        $this->mailer->send(new Message(
            'emails/otp.email.dark.php',
            $user->getEmail(),
            [
                'name' => $user->getFirstName() . ' ' . $user->getLastName(),
                'otp' => $otp,
            ]
        ));

        return $this->jsonResponse(['message' => 'OTP sent successfully', 'otp_code' => $otp]);
    }

    private function jsonResponse(array $data, int $status = 200): ResponseInterface
    {
        $response = new \Nyholm\Psr7\Response($status);
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
