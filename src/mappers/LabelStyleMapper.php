<?php

namespace Danydevco\Rocket\mappers;

class LabelStyleMapper {

    public function mapSize(string $size): string {
        $sizes = [
            'none' => '',
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'md' => 'text-base',
            'lg' => 'text-lg',
            'xl' => 'text-xl',
        ];

        return $sizes[$size] ?? $sizes['none'];
    }

    public function mapHierarchy(string $hierarchy = null): string {
        if ($hierarchy === 'basic') {
            return 'font-bold text-slate-500';
        }
        return '';
    }

}
