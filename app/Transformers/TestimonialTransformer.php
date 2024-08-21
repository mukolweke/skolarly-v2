<?php

namespace App\Transformers;

use App\Models\Testimonial;
use Carbon\Carbon;

class TestimonialTransformer
{
    /**
     * @param mixed $testimonials
     *
     * @return mixed
     */
    public static function transformCollection($testimonials)
    {
        return $testimonials->transform(function ($testimonial) {

            return self::transform($testimonial);
        });
    }

    /**
     * @param Testimonial $testimonial
     * @return array
     */
    public static function transform(Testimonial $testimonial)
    {
        return [
            'id' => $testimonial->id,
            'name' => $testimonial->name,
            'content' => $testimonial->content,
            'updated_date' => Carbon::parse($testimonial->updated_at)->toFormattedDateString(),
        ];
    }
}
