<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $httpClient;

    public function __construct(
        Client $client
    )
    {
        $this->httpClient = $client;
    }

    public function loginViaApi(Request $request)
    {
        $oauthTokenUrl     = config('services.oauth.domain') . '/oauth/token';
        $oauthGrantType    = config('services.oauth.grant_type');
        $oauthClientId     = config('services.oauth.client_id');
        $oauthClientSecret = config('services.oauth.client_secret');

        $username = $request->get('login', '');
        $password = $request->get('pincode', '');

        $form = [
            'grant_type'    => $oauthGrantType,
            'client_id'     => $oauthClientId,
            'client_secret' => $oauthClientSecret,
            'username'      => $username,
            'password'      => $password,
        ];

        try {
            $response = $this->httpClient->post($oauthTokenUrl, ['form_params' => $form]);
            return $response->getBody();
        } catch (BadResponseException $e) {
            $error = 'Your credentials are incorrect. Please try again';

            return response()->json(['error' => $error], 422);
        }
    }

    public function getCurrentUser(Request $request, AuthService $service): JsonResponse
    {
        return response()->json([
            'user' => $service->getCurrentAuthenticatedUser($request)
        ]);
    }

    public function logout(Request $request, AuthService $service) {
        $service->logout();
        return response()->json([
            'message' => 'Logged out successfully!'
        ], 200);
    }
}
