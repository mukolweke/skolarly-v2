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
        $testimonial = $this->repository->create($request->validated());

        return response()->json($testimonial, 201);
    }

    public function show(Testimonial $testimonial)
    {
        return response()->json(TestimonialTransformer::transform($testimonial), 200);;
    }

    public function update(TestimonialPostRequest $request, Testimonial $testimonial)
    {
        $testimonial = $this->repository->update($testimonial, $request->validated());

        return response()->json($testimonial, 200);
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->repository->delete($testimonial);

        return response()->json(null, 204);
    }
}
