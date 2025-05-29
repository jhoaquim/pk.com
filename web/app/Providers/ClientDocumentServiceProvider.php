<?php

namespace App\Providers;

use App\Services\ClientDocumentService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ClientDocumentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(abstract:ClientDocumentService::class, concrete:function ($app): ClientDocumentService {
            return new ClientDocumentService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Você pode adicionar lógica de "booting" aqui, se necessário.
        // Por exemplo, registrar validações personalizadas.
        Validator::extend(rule :'cpf', extension: function ($attribute, $value, $parameters, $validator): bool {
            return $this->app->make(abstract : ClientDocumentService::class)->validateCpf(cpf:$value);
        });

        Validator::extend('cnpj', function ($attribute, $value, $parameters, $validator) {
            return $this->app->make(ClientDocumentService::class)->validateCnpj($value);
        });
    }
}
