<?php

namespace Danydevco\Rocket\builders;

abstract class BaseBuilder {

    protected function getStylesString(?array $styles): string|null {
        if (!$styles) {
            return null;
        }

        return trim(array_reduce(array_keys($styles), function ($carry, $key) use ($styles) {
            return $carry . $key . ': ' . $styles[$key] . '; ';
        }, ''));
    }

    /**
     * Genera un, id único para un elemento.
     */
    protected function buildElementId(?string $id, string $prefix = 'element_'): string {
        $elementId = $id ?: $prefix . uniqid();
        return htmlspecialchars($elementId, ENT_QUOTES);
    }

    /**
     * Genera un string con los atributos del elemento.
     */
    protected function getAttributesString(array $attributes): string {
        return trim(array_reduce(array_keys($attributes), function ($carry, $key) use ($attributes) {
            return $carry . $key . '="' . htmlspecialchars($attributes[$key], ENT_QUOTES) . '" ';
        }, ''));
    }

    protected function arrayToString(?array $classes): string {
        if (!$classes) {
            return '';
        }
        return implode(' ', $classes);
    }

    /**
     * Agrega un atributo al array de atributos si el valor no es nulo.
     */
    protected function addAttribute(array &$attributes, string $key, ?string $value): void {
        if (!is_null($value)) {
            $attributes[$key] = $value;
        }
    }

}
