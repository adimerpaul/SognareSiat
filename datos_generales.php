<?php

declare(strict_types=1);

date_default_timezone_set('America/La_Paz');

/**
 * Configuracion SIAT centralizada.
 * Ajusta aqui CUIS/CUFD por punto de venta (0 y 1).
 */
function obtenerDatosSiat(int $codigoPuntoVenta): array
{
    $config = [
        'nit' => '283728026',
        'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJndXN0YXZvLm1vcmVqb243OUBnbWFpbC5jb20iLCJjb2RpZ29TaXN0ZW1hIjoiNTgzMUM3RkIxMkM5MTc1QTIyNyIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFET3lNRFkzc2pBd01nTUFPQ1BOMkFrQUFBQT0iLCJpZCI6NTE4MDAxNSwiZXhwIjoxODAxNDI0NjA3LCJpYXQiOjE3NzI3NTQxNzgsIm5pdERlbGVnYWRvIjoyODM3MjgwMjYsInN1YnNpc3RlbWEiOiJTRkUifQ.EJFWLqh-xK6pVpCxzc6KKWa3f4HjdjeSRCgFxfzR-DDSElfA6EyHbj3fXxeJ7w2FXkX1FcETxOLZkW8NJEgyVw',
        'codigoAmbiente' => 2,
        'codigoSistema' => '5831C7FB12C9175A227',
        'codigoSucursal' => 0,
        'codigoModalidad' => 1,
        'puntosVenta' => [
            0 => [
                'cuis' => '325D3D86',
                'cufd' => '',
            ],
            1 => [
                'cuis' => 'A2FD4AB9',
                'cufd' => '',
            ],
        ],
    ];

    if (!isset($config['puntosVenta'][$codigoPuntoVenta])) {
        throw new InvalidArgumentException('Punto de venta no configurado: ' . $codigoPuntoVenta);
    }

    $puntoVenta = $config['puntosVenta'][$codigoPuntoVenta];

    return [
        'nit' => $config['nit'],
        'token' => $config['token'],
        'codigoAmbiente' => $config['codigoAmbiente'],
        'codigoSistema' => $config['codigoSistema'],
        'codigoSucursal' => $config['codigoSucursal'],
        'codigoModalidad' => $config['codigoModalidad'],
        'codigoPuntoVenta' => $codigoPuntoVenta,
        'cuis' => $puntoVenta['cuis'],
        'cufd' => $puntoVenta['cufd'],
    ];
}
