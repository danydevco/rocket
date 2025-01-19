<?php

namespace Danydevco\Rocket\dto;

class FontDTO
{
    public string $fontFamily;
    public string $fontSize;
    public string $fontWeight;
    public string $fontStyle;
    public string $lineHeight;
    public string $letterSpacing;
    public string $textDecoration;
    public string $textColor;

    public function __construct(
        string $fontFamily = 'Arial, sans-serif',
        string $fontSize = '16px',
        string $fontWeight = 'normal',
        string $fontStyle = 'normal',
        string $lineHeight = '1.5',
        string $letterSpacing = 'normal',
        string $textDecoration = 'none',
        string $textColor = '#000000'
    ) {
        $this->fontFamily = $fontFamily;
        $this->fontSize = $fontSize;
        $this->fontWeight = $fontWeight;
        $this->fontStyle = $fontStyle;
        $this->lineHeight = $lineHeight;
        $this->letterSpacing = $letterSpacing;
        $this->textDecoration = $textDecoration;
        $this->textColor = $textColor;
    }

    /**
     * Método estático para crear un FontDTO a partir de un array asociativo.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['fontFamily'] ?? 'Arial, sans-serif',
            $data['fontSize'] ?? '16px',
            $data['fontWeight'] ?? 'normal',
            $data['fontStyle'] ?? 'normal',
            $data['lineHeight'] ?? '1.5',
            $data['letterSpacing'] ?? 'normal',
            $data['textDecoration'] ?? 'none',
            $data['textColor'] ?? '#000000'
        );
    }
}
