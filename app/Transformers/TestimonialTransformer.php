<?php

namespace App\Transformers;

use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
        $imageUrl = $testimonial->getFirstMediaUrl('testimonials');
        dd(Storage::url('UGV4ZWxzIFBob3RvIDc2OTc0Ng==.jpeg'), 'hhs');
        return [
            'id' => $testimonial->id,
            'name' => $testimonial->name,
            'content' => $testimonial->content,
            'updated_date' => Carbon::parse($testimonial->updated_at)->toFormattedDateString(),
            'image_url' => $imageUrl,
        ];
    }
}
