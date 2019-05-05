<?php

namespace App\Enums;

abstract class BaseEnum {


    final private function __construct() { }

    /**Retorna a descrição para a chave. Permite usar "dot notation" para busca em multi-dimensional array
     * Exemplo: base.disputa_terceiro_lugar
     *
     * @param string $valor
     * @return string
     */
    public static function getDescricao($valor)
    {
        $r = new \ReflectionClass(get_called_class());
        $descricoes = array_dot($r->getMethod('getDescricoes')->invoke(null));
        return array_get($descricoes, $valor);
    }

    /**
     * @return array
     */
    public static function getCombo()
    {
        $r = new \ReflectionClass(get_called_class());
        $descricoes = $r->getMethod('getDescricoes')->invoke(null);
        foreach ($descricoes as $key => $value) {
            $combo[] = ['chave' => $key, 'valor' => $value ];
        }
        return $combo;
    }

    /**
     * @return array
     */
    public static function getValues()
    {
        $r = new \ReflectionClass(get_called_class());
        return $r->getConstants();
    }

    /**
     * @return string
     */
    public static function getValoresPorVirgula()
    {
        $valores = self::getValues();
        $formatados = array_shift($valores);
        foreach ($valores as $valor) {
            $formatados .= ',' . $valor;
        }
        return $formatados;
    }

    /**
     * @param $valor
     * @return bool
     */
    public static function valorValido($valor)
    {
        foreach (self::getValues() as $item) {
            if ($item === $valor) {
                return true;
            }
        }
        return false;
    }

    public static function toJSON()
    {
        $r = new \ReflectionClass(get_called_class());
        $consts = $r->getConstants();
        $json = [];
        foreach ($consts as $const => $value) {
            $json[$const] = [
                'value' => $value,
                'label' => self::getDescricao($value),
            ];
        }
        return $json;
    }
}