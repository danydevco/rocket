<?php

namespace Danydevco\Rocket\mappers;

class InputStyleMapper {

    public function getHierarchy(string $hierarchy): string {
        $bases = [
            'none' => '',
            'basic' => '',
            'floating' => '',
        ];

        return $bases[$hierarchy] ?? $bases['none'];

    }

    public function mapSize(string $size): string {
        $sizes = [
            'none' => '',
            'sm' => 'px-2 py-1 text-xs',
            'md' => 'px-3 py-2 text-base',
            'lg' => 'px-4 py-3 text-lg',
        ];

        return $sizes[$size] ?? $sizes['none'];
    }

    public function mapHierarchy(string $hierarchy = null): string {
        if ($hierarchy === 'basic') {
            return 'block w-full font-normal leading-6 bg-white border rounded-md appearance-none transition-colors ease-in-out duration-150 focus:outline-none focus:border-gray-400';
        }
        return '';
    }

}
