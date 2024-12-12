<?php

declare(strict_types=1);

namespace App\Endpoint\Web;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Spiral\Files\FilesInterface;
use Spiral\Http\Request\InputManager;
use Spiral\Router\Annotation\Route;

class ImageUploadController
{
    public function __construct(
        private readonly FilesInterface $files,
    ) {}

    #[Route(route: '/api/upload', name: 'upload-image', methods: 'POST')]
    public function uploadImage(ServerRequestInterface $request, InputManager $input): ResponseInterface
    {
        $file = $input->file('image');

        if ($file === null) {
            return $this->jsonResponse(["Error" => "No image uploaded"], 400);
        }

        $mediaType = $file->getClientMediaType();
        if (!in_array($mediaType, ['image/jpeg', 'image/png'])) {
            return $this->jsonResponse(['error' => 'Invalid file type'], 400);
        }

        $fileExtension = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);

        $year = date('Y');
        $month = date('m');
        $day = date('d');

        $storagePath = sprintf('public/uploads/%s/%s/%s', $year, $month, $day);

        $fileName = uniqid('image_') . '.' . strtolower($fileExtension);

        $this->files->ensureDirectory($storagePath);

        $file->moveTo(sprintf('%s/%s', $storagePath, $fileName));

        return $this->jsonResponse(['status' => 'success',
            'image_file' => $storagePath . '/' .$fileName,
            'image_name' => $fileName]);
    }

    private function jsonResponse(array $data, int $status = 200): ResponseInterface
    {
        $response = new \Nyholm\Psr7\Response($status);
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
