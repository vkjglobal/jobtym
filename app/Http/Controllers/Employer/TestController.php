<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Models\Category;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index($id)
    {
        $job_id = $id;
        if (Auth::check()) {
            $categories = Category::with(['categoryQuestions' => function ($query) {
                    $query->inRandomOrder()
                        ->with(['questionOptions' => function ($query) {
                            $query->inRandomOrder();
                        }]);
                }])
                ->whereHas('categoryQuestions')
                ->get();
                // dd($categories);
    
            return view('user.test', compact('categories','job_id'));
        }
        return Redirect('user')->with('error', 'Oops! You are not Login!! Please login to attempt test.');;
    }

    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));
        $result = auth()->user()->userResults()->create([
            'job_id' => $request->job_id,
            'total_points' => $options->sum('points')
        ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                        'option_id' => $option->id,
                        'points' => $option->points
                    ]
                ];
            })->toArray();

        $result->questions()->sync($questions);

        return redirect()->route('user.results.show', $result->id);
    }
}
