<?php

namespace App;

class GildedRose
{
    public $name;
    public $quality;
    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) 
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    private function updateQuality()
    {
        switch (true) {
            case $this->isSulfuras():
                // Sulfuras never changes quality or sellIn
                break;
                
            case $this->isAgedBrie():
                $this->handleAgedBrie();
                break;
                
            case $this->isBackstagePass():
                $this->handleBackstagePass();
                break;
                
            case $this->isConjured():
                $this->handleConjured();
                break;
                
            default:
                $this->handleNormalItem();
                break;
        }
    }

    private function updateSellIn()
    {
        if (!$this->isSulfuras()) {
            $this->sellIn--;
        }
    }

    private function handleAgedBrie()
    {
        if ($this->sellIn <= 0) {
            // After sell date: increases by 2
            $this->increaseQuality(2);
        } else {
            // Before sell date: increases by 1
            $this->increaseQuality(1);
        }
    }

    private function handleBackstagePass()
    {
        if ($this->sellIn <= 0) {
            // After concert: quality drops to 0
            $this->quality = 0;
        } elseif ($this->sellIn <= 5) {
            // 5 days or less: increases by 3
            $this->increaseQuality(3);
        } elseif ($this->sellIn <= 10) {
            // 10 days or less: increases by 2
            $this->increaseQuality(2);
        } else {
            // More than 10 days: increases by 1
            $this->increaseQuality(1);
        }
    }

    private function handleConjured()
    {
        if ($this->sellIn <= 0) {
            // After sell date: degrades by 4 (twice as fast as normal items)
            $this->decreaseQuality(4);
        } else {
            // Before sell date: degrades by 2 (twice as fast as normal items)
            $this->decreaseQuality(2);
        }
    }

    private function handleNormalItem()
    {
        if ($this->sellIn <= 0) {
            // After sell date: degrades by 2
            $this->decreaseQuality(2);
        } else {
            // Before sell date: degrades by 1
            $this->decreaseQuality(1);
        }
    }

    private function increaseQuality($amount)
    {
        $this->quality = min(50, $this->quality + $amount);
    }

    private function decreaseQuality($amount)
    {
        $this->quality = max(0, $this->quality - $amount);
    }

    private function isSulfuras()
    {
        return $this->name === 'Sulfuras, Hand of Ragnaros';
    }

    private function isAgedBrie()
    {
        return $this->name === 'Aged Brie';
    }

    private function isBackstagePass()
    {
        return $this->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    private function isConjured()
    {
        return strpos($this->name, 'Conjured') === 0;
    }
}