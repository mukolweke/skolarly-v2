<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\TestimonialRepository;
use App\Http\Requests\TestimonialPostRequest;
use App\Models\Testimonial;
use App\Transformers\TestimonialTransformer;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    protected $repository;

    public function __construct(TestimonialRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        return $this->repository->all($search);
    }

    public function store(TestimonialPostRequest $request)
    {
        $testimonial = $this->repository->create($request->only('name', 'content'));

        if ($request->hasFile('image')) {
            $fileName = $this->generateImageFileName($request);

            $testimonial->addMediaFromRequest('image')->usingFileName($fileName)
                ->toMediaCollection('testimonials');
        }

        return response()->json(['message' => 'Testimonial created successfully!', 'testimonial' => $testimonial], 200);
    }

    public function show(Testimonial $testimonial)
    {
        return response()->json(TestimonialTransformer::transform($testimonial), 200);
    }

    private function generateImageFileName($request)
    {
        $originalName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
        $encodedName = base64_encode($originalName);
        return $encodedName . '.' . $request->file('image')->getClientOriginalExtension();
    }

    public function update(TestimonialPostRequest $request, Testimonial $testimonial)
    {
        $testimonial = $this->repository->update($testimonial, $request->only('name', 'content'));

        if ($request->hasFile('image')) {
            if ($testimonial->hasMedia('testimonials')) {
                $testimonial->clearMediaCollection('testimonials');
            }

            $fileName = $this->generateImageFileName($request);

            $testimonial->addMediaFromRequest('image')->usingFileName($fileName)
                ->toMediaCollection('testimonials');
        }

        return response()->json(['message' => 'Testimonial updated successfully!', 'testimonial' => $testimonial], 201);
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->repository->delete($testimonial);

        return response()->json(['message' => 'Testimonial deleted successfully!', 'testimonial' => null], 204);
    }
}
