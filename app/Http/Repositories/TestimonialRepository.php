<?php

namespace App\Http\Repositories;

use App\Models\Testimonial;
use App\Transformers\TestimonialTransformer;
use Illuminate\Support\Str;

class TestimonialRepository
{
    public function all($search = '')
    {
        $query = Testimonial::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%");
        }

        $testimonials = $query->latest()->paginate();

        TestimonialTransformer::transformCollection($testimonials);

        return $testimonials;
    }

    public function create(array $data)
    {
        return Testimonial::create($data);
    }

    public function findByBy($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();

        if (!empty($testimonial)) {
            return TestimonialTransformer::transform($testimonial);
        }

        return null;
    }

    public function update(Testimonial $testimonial, array $data)
    {
        $testimonial->update($data);

        return $testimonial;
    }

    public function delete(Testimonial $testimonial)
    {
        $testimonial->delete();
    }
}
