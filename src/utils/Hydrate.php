<?php

namespace App\Utils;

final class Hydrate
{
    public static function arrayToObject(string $className, array $data)
    {
        $cN = "\\App\\Class\\" . $className;
        if (class_exists($cN)) {
            $obj = new $cN;

            foreach ($data as $key => $value) {
                $setter = "set" . ucfirst($key);

                // Vérifier si la propriété existe dans l'objet
                if (method_exists($obj, $setter)) {
                    // Appeler le setter pour affecter la valeur à la propriété de l'objet
                    $obj->$setter($value);
                }
            }

            return $obj;
        }
    }

    public static function convertArrayToObject(array $dataArray, string $className): array
    {
        $cN = "\\App\Class\\" . $className;
        if (class_exists($cN)) {

            $objects = [];

            foreach ($dataArray as $data) {
                $object = new $cN();

                foreach ($data as $key => $value) {
                    $setter = 'set' . ucfirst($key);

                    if (method_exists($object, $setter)) {
                        $object->$setter($value);
                    }
                }

                $objects[] = $object;
            }
            return $objects;
        }
    }
}
