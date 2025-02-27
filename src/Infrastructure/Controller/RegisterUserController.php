<?php

namespace Infrastructure\Controller;

use Application\UseCase\RegisterUserUseCase;
use Application\DTO\RegisterUserRequest;
use Application\DTO\UserResponseDTO;
use Exception;

class RegisterUserController
{
    private RegisterUserUseCase $registerUserUseCase;

    public function __construct(RegisterUserUseCase $registerUserUseCase)
    {
        $this->registerUserUseCase = $registerUserUseCase;
    }

    public function handleRequest(): void
    {
        header('Content-Type: application/json');

        try {
            $data = json_decode(file_get_contents('php://input'), true);

            if (!isset($data['name'], $data['email'], $data['password'])) {
                throw new Exception('Datos de solicitud inválidos', 400);
            }

            $request = new RegisterUserRequest($data['name'], $data['email'], $data['password']);
            $userDTO = $this->registerUserUseCase->execute($request);

            echo json_encode([
                'success' => true,
                'user' => $userDTO->toArray(),
            ]);
        } catch (Exception $e) {
            http_response_code($e->getCode() ?: 500);
            echo json_encode([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
