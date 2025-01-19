<?php

namespace Danydevco\Rocket\mappers;

class ButtonStyleMapper {

    public function mapSize(string $size): string {
        $sizes = [
            'sm' => 'px-2 py-1 text-xs',
            'md' => 'px-3 py-2 text-base font-bold',
            'lg' => 'px-4 py-3 text-lg',
        ];

        return $sizes[$size] ?? $sizes['md'];
    }

    public function mapColor(string $color): string {

        $colors = [
            'primary' => 'bg-blue-500 text-white',
            'secondary' => 'bg-gray-500 text-white',
            'success' => 'bg-green-500 text-white',
            'danger' => 'bg-red-500 text-white',
            'warning' => 'bg-yellow-500 text-white',
            'info' => 'bg-cyan-500 text-white',
            'light' => 'bg-gray-100 text-gray-900',
            'dark' => 'bg-gray-900 text-white',
            'white' => 'bg-white text-gray-900',
        ];

        return $colors[$color] ?? $colors['primary'];
    }

    public function mapRounded(string $rounded): string {
        $roundings = [
            'none' => 'rounded-none',
            'default' => 'rounded',
            'sm' => 'rounded-sm',
            'md' => 'rounded-md',
            'lg' => 'rounded-lg',
            'full' => 'rounded-full',
        ];

        return $roundings[$rounded] ?? $roundings['md'];
    }

    public function mapShadow(string $shadow): string {
        $shadows = [
            'none' => 'shadow-none',
            'sm' => 'shadow-sm',
            'md' => 'shadow',
            'lg' => 'shadow-lg',
            'xl' => 'shadow-xl',
            '2xl' => 'shadow-2xl',
            'inner' => 'shadow-inner',
            'outline' => 'shadow-outline',
        ];

        return $shadows[$shadow] ?? $shadows['none'];
    }

    public function mapHover(string $hover): string {
        $hovers = [
            'none' => '',
            'opacity' => 'hover:bg-blue-600',
            'lighten' => 'hover:bg-opacity-50',
            'darken' => 'hover:bg-opacity-25',
        ];

        return $hovers[$hover] ?? $hovers['none'];
    }

    public function mapActive(string $active): string {
        $actives = [
            'none' => '',
            'opacity' => 'active:bg-blue-600',
            'lighten' => 'active:bg-opacity-50',
            'darken' => 'active:bg-opacity-25',
        ];

        return $actives[$active] ?? $actives['none'];
    }

    public function mapFocus(string $focus): string {
        $foci = [
            'none' => 'focus:ring-0',
            'primary' => 'focus:ring-primary-500',
            'secondary' => 'focus:ring-secondary-500',
            'success' => 'focus:ring-success-500',
            'danger' => 'focus:ring-danger-500',
            'warning' => 'focus:ring-warning-500',
            'info' => 'focus:ring-info-500',
            'light' => 'focus:ring-gray-100',
            'dark' => 'focus:ring-gray-900',
            'white' => 'focus:ring-white',
        ];

        return $foci[$focus] ?? $foci['none'];
    }

    public function mapTransition(string $transition): string {
        $transitions = [
            'none' => 'transition-none',
            'all' => 'transition-all',
            'color' => 'transition-colors',
            'bg' => 'transition-bg',
            'shadow' => 'transition-shadow',
            'transform' => 'transition-transform',
        ];

        return $transitions[$transition] ?? $transitions['none'];
    }

    public function mapDuration(string $duration): string {
        $durations = [
            '75' => 'duration-75',
            '100' => 'duration-100',
            '150' => 'duration-150',
            '200' => 'duration-200',
            '300' => 'duration-300',
            '500' => 'duration-500',
            '700' => 'duration-700',
            '1000' => 'duration-1000',
        ];

        return $durations[$duration] ?? $durations['150'];
    }

    public function mapEase(string $ease): string {
        $eases = [
            'in' => 'ease-in',
            'out' => 'ease-out',
            'in-out' => 'ease-in-out',
        ];

        return $eases[$ease] ?? $eases['in-out'];
    }

    public function mapTransform(string $transform): string {
        $transforms = [
            'none' => 'transform-none',
            'hover' => 'transform hover:scale-105',
            'active' => 'transform active:scale-95',
        ];

        return $transforms[$transform] ?? $transforms['none'];
    }

    public function mapDisabled(bool $disabled): string {
        return $disabled ? 'opacity-50 cursor-not-allowed' : '';
    }

}
