<?php

namespace Modules\Slider\Repositories\WebService;

use Modules\Slider\Entities\Slider;

class SliderRepository
{
    protected $slider;

    function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function getRandomPerRequest()
    {
        return $this->slider->active()->unexpired()->started()->inRandomOrder()->take(6)->get();
    }

    /**
     * @return Slider
     */
    public function getApiSliders()
    {
        return $this->slider->active()->where('ad_group_id',null)->get();
    }
}
