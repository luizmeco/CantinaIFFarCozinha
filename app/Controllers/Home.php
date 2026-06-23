<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $client = \Config\Services::curlrequest();
        $token = env('API_TOKEN');
        $apiUrl = rtrim(env('API_BASE_URL'), '/');
        
        try {
            // Realiza a requisição GET para a API para buscar pedidos efetuados
            $response = $client->request('GET', $apiUrl . '/api/pedidosEfetuados', [
                'headers' => [
                    'apiKey' =>  $token,
                    'Accept' => 'application/json',
                ]
            ]);
            
            $pedidos = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            $pedidos = [];
            log_message('error', 'Erro ao recuperar pedidos efetuados da API: ' . $e->getMessage());
        }

        $data = [
            'titulo'  => 'Painel da Cozinha - Cantina IFFar',
            'pedidos' => $pedidos ?? []
        ];

        return view('cozinha/painel', $data);
    }

    public function marcarComoFeito($idPedido)
    {
        $client = \Config\Services::curlrequest();
        $token = env('API_TOKEN');
        $apiUrl = rtrim(env('API_BASE_URL'), '/');

        try {
            // Realiza a requisição POST para a API para marcar o pedido como feito
            $response = $client->request('POST', $apiUrl . '/api/marcarComoFeito', [
                'headers' => [
                    'apiKey' =>  $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'id_pedido' => $idPedido
                ]
            ]);
            
            $resultado = json_decode($response->getBody(), true);
            
            if (isset($resultado['status']) && $resultado['status']) {
                return redirect()->to('/')->with('mensagem', 'Pedido #' . str_pad($idPedido, 3, '0', STR_PAD_LEFT) . ' pronto!');
            }
        } catch (\Exception $e) {
            log_message('error', 'Erro ao marcar pedido como feito na API: ' . $e->getMessage());
        }

        return redirect()->to('/')->with('erro', 'Erro ao atualizar status do pedido.');
    }
}
