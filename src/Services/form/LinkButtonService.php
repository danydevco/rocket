<?php

namespace Danydevco\Rocket\Services\form;

class LinkButtonService {

    public static function getStyle(): array {
        return [
            'solid',
            'outline',
            'link',
        ];
    }

    public static function getSizes(): array {
        return [
            'sm'  => 'px-2 py-1 text-xs',
            'md' => 'px-3 py-2 text-sm',
            'lg'  => 'px-4 py-3 text-base',
        ];
    }

    public static function getColors(): array {
        return [
            'primary'   => 'text-white bg-primary-500 border border-transparent',
            'secondary' => 'text-white bg-secondary-500 border border-transparent',
            'success'   => 'text-white bg-success-500 border border-transparent',
            'danger'    => 'text-white bg-danger-500 border border-transparent',
            'warning'   => 'text-white bg-warning-500 border border-transparent',
            'info'      => 'text-white bg-info-500 border border-transparent',
            'light'     => 'text-gray-900 bg-gray-100 border border-transparent',
            'dark'      => 'text-white bg-gray-900 border border-transparent',
            'white'     => 'text-gray-900 bg-white border border-gray-300',
        ];
    }

    public static function getRounded(): array {
        return [
            'none'      => 'rounded-none',
            'sm'        => 'rounded-sm',
            'md'        => 'rounded-md',
            'lg'        => 'rounded-lg',
            'full'      => 'rounded-full',
        ];
    }

    public static function getShadow(): array {
        return [
            'none'      => 'shadow-none',
            'sm'        => 'shadow-sm',
            'md'        => 'shadow',
            'lg'        => 'shadow-lg',
            'xl'        => 'shadow-xl',
            '2xl'       => 'shadow-2xl',
            'inner'     => 'shadow-inner',
            'outline'   => 'shadow-outline',
        ];
    }

    public static function getHover(): array {
        return [
            'none'      => 'hover:bg-opacity-100',
            'opacity'   => 'hover:bg-opacity-75',
            'lighten'   => 'hover:bg-opacity-50',
            'darken'    => 'hover:bg-opacity-25',
        ];
    }

    public static function getActive(): array {
        return [
            'none'      => 'active:bg-opacity-100',
            'opacity'   => 'active:bg-opacity-75',
            'lighten'   => 'active:bg-opacity-50',
            'darken'    => 'active:bg-opacity-25',
        ];
    }

    public static function getFocus(): array {
        return [
            'none'      => 'focus:ring-0',
            'primary'   => 'focus:ring-primary-500',
            'secondary' => 'focus:ring-secondary-500',
            'success'   => 'focus:ring-success-500',
            'danger'    => 'focus:ring-danger-500',
            'warning'   => 'focus:ring-warning-500',
            'info'      => 'focus:ring-info-500',
            'light'     => 'focus:ring-gray-100',
            'dark'      => 'focus:ring-gray-900',
            'white'     => 'focus:ring-white',
        ];
    }

    public static function getTransition(): array {
        return [
            'none'      => 'transition-none',
            'all'       => 'transition-all',
            'color'     => 'transition-colors',
            'bg'        => 'transition-bg',
            'shadow'    => 'transition-shadow',
            'transform' => 'transition-transform',
        ];
    }

    public static function getDuration(): array {
        return [
            '75'        => 'duration-75',
            '100'       => 'duration-100',
            '150'       => 'duration-150',
            '200'       => 'duration-200',
            '300'       => 'duration-300',
            '500'       => 'duration-500',
            '700'       => 'duration-700',
            '1000'      => 'duration-1000',
        ];
    }

    public static function getEase(): array {
        return [
            'in'        => 'ease-in',
            'out'       => 'ease-out',
            'in-out'    => 'ease-in-out',
        ];
    }

    public static function getTransform(): array {
        return [
            'none'      => 'transform-none',
            'hover'     => 'transform hover:scale-105',
            'active'    => 'transform active:scale-95',
        ];
    }

    public static function getDisabled(): array {
        return [
            'cursor-not-allowed',
            'opacity-50',
        ];
    }

    public static function getAttributes($attributes): string {
        $attributesString = '';
        foreach ($attributes as $key => $value) {
            $attributesString .= $key . '="' . $value . '" ';
        }
        return $attributesString;
    }

    public static function getClasses($class): string {
        return is_array($class) ? implode(' ', $class) : $class;
    }




}
