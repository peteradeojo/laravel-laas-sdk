<?php

namespace OneZero\Laas;

use Illuminate\Support\Facades\Http;

class Laas
{
    private string $app_token;

    public function __construct()
    {
        $this->app_token = config('laas.app_token');
    }

    public function info(string $message, array $context = null)
    {
        return $this->log("info", $message, $context);
    }

    public function error(string $message, array $context = null)
    {
        return $this->log("error", $message, $context);
    }

    public function warning(string $message, array $context = null)
    {
        return $this->log("warn", $message, $context);
    }

    public function debug(string $message, array $context = null)
    {
        return $this->log("debug", $message, $context);
    }

    public function emergency(string $message, array $context = null)
    {
        return $this->log("fatal", $message, $context);
    }

    public function critical(string $message, array $context = null)
    {
        return $this->log("critical", $message, $context);
    }

    protected function log($level, string $message, array $context = null)
    {
        $data = [
            "level" => $level,
            "text" => $message,
        ];

        if ($context) {
            $data['context'] = $context;
        }
        try {
            $response = Http::withHeader('APP_ID', $this->app_token)->post("https://laas-api.up.railway.app/v1/logs", $data)->throw()->json();

            return $response['ok'];
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
}
