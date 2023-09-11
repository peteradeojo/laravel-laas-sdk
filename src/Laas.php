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
    public function info(string $message, array $context = [])
    {
        return $this->log("info", $message, $context);
    }

    public function error(string $message, array $context = [])
    {
        return $this->log("error", $message, $context);
    }

    public function warning(string $message, array $context = [])
    {
        return $this->log("warn", $message, $context);
    }

    public function debug(string $message, array $context = [])
    {
        return $this->log("debug", $message, $context);
    }

    public function emergency(string $message, array $context = [])
    {
        return $this->log("fatal", $message, $context);
    }

    public function critical(string $message, array $context = [])
    {
        return $this->log("critical", $message, $context);
    }

    protected function log($level, string $message, array $context = [])
    {
        try {
            $response = Http::withHeader('APP_ID', $this->app_token)->post("https://laas-api.up.railway.app", [
                "level" => $level,
                "message" => $message,
                "context" => $context,
            ])->throw()->json();

            return $response['ok'];
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
}
