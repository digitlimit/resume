<?php namespace App\Helpers;

use Exception;

class Path
{
    protected static function entities()
    {
        return ['individual', 'sme', 'corporate', 'property', 'landing', 'logo'];
    }

    public static function images($entity, $type)
    {
        $entities = self::entities();

        $config = "nsss.paths.images.{$entity}.{$type}";

        if(!in_array($entity, $entities)){
            throw new Exception("Invalid config key - {$config}");
        }

        return config($config);
    }

    public static function documents($entity, $type)
    {
        $entities = self::entities();

        $config = "nsss.paths.documents.{$entity}.{$type}";

        if(!in_array($entity, $entities)){
            throw new Exception("Invalid config key - {$config}");
        }

        return config($config);
    }

    public static function passport($entity)
    {
        return self::images($entity, 'passport_photo');
    }

    public static function logo($entity)
    {
        return self::images($entity, 'logo');
    }

    public static function slider($entity)
    {
        return self::images($entity, 'sliders');
    }

    public static function themeLogo($entity)
    {
        return self::images($entity, 'logos');
    }

    public static function utilityBill($entity)
    {
        return self::documents($entity, 'utility_bill');
    }

    public static function identification($entity)
    {
        return self::documents($entity, 'identification');
    }

    public static function disabilityCertificate($entity)
    {
        return self::documents($entity, 'disability_certificate');
    }

    public static function certificate($entity)
    {
        return self::documents($entity, 'certificate');
    }

    public static function certification($entity)
    {
        return self::documents($entity, 'certification');
    }

    public static function taxCertificate($entity)
    {
        return self::documents($entity, 'tax_certificate');
    }
}