<?php

namespace app\models;

use edustef\mvcFrame\DatabaseModel;

class Cliente extends DatabaseModel
{
  public string $dni = '';
  public string $nombre = '';
  public string $apellidos = '';
  public string $edad = '';
  public string $direccion = '';
  public string $poblacion = '';
  public string $telefono = '';
  public string $email = '';

  public function rules(): array
  {
    return [
      'dni' => [self::RULE_REQUIRED, self::RULE_UNIQUE, [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 10]],
      'nombre' => [self::RULE_REQUIRED,  [self::RULE_MAX, 'max' => 50]],
      'apellidos' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 50]],
      'edad' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
      'direccion' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 255]],
      'telefono' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 10]],
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_MAX, 'max' => 60]],
    ];
  }

  public function attributes(): array
  {
    return [
      'dni' => ['label' => 'DNI'],
      'nombre' => ['label' => 'Nombre'],
      'apellidos' => ['label' => 'Apellidos'],
      'edad' => ['label' => 'Edad'],
      'direccion' => ['label' => 'Direccion'],
      'telefono' => ['label' => 'Telefono'],
      'email' => ['label' => 'Email']
    ];
  }

  public static function tableName(): string
  {
    return 'Cliente';
  }

  public function primaryKey(): string
  {
    return 'dni';
  }
}
