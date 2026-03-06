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
        'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJndXN0YXZvLm1vcmVqb243OUBnbWFpbC5jb20iLCJjb2RpZ29TaXN0ZW1hIjoiNTgzMUYzNjhGMzJERkEzOTcyNyIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFET3lNRFkzc2pBd01nTUFPQ1BOMkFrQUFBQT0iLCJpZCI6NTE4MDAxNSwiZXhwIjoxODA0MjIzMzUxLCJpYXQiOjE3NzI3ODgxMjEsIm5pdERlbGVnYWRvIjoyODM3MjgwMjYsInN1YnNpc3RlbWEiOiJTRkUifQ.wTcFNjiSfW3KlvR1nuNy7DAHWdqf2l4HftwfdA5JnA3jERairQAqgF464FB5m2o0ZTdg-Lg6A5PzsKlqzpIFog',
        'codigoAmbiente' => 2,
        'codigoSistema' => '5831F368F32DFA39727',
        'codigoSucursal' => 0,
        'codigoModalidad' => 2,
        'puntosVenta' => [
            0 => [
                'cuis' => '657D774B',
                'cufd' => 'FBQTlDY2xjQUE=JERkEzOTcyNw==Q2UlallGSERhVUNTgzMUYzNjhGMz',
                'codigoControl' => '85CECB4914AAF74',
            ],
            1 => [
                'cuis' => '8B99CCC3',
                'cufd' => 'JBQTlDY2xjQUE=JERkEzOTcyNw==QzljWVpGSERhVUNTgzMUYzNjhGMz',
                'codigoControl' => '1EF82D4914AAF74',
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
        'codigoControl' => $puntoVenta['codigoControl'],
    ];
}
