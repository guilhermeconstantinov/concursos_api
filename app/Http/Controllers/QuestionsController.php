<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use App\Http\Requests\Questions\CreateQuestionsRequest;

class QuestionsController extends Controller
{
    public function create(CreateQuestionsRequest $request)
    {
        $data = $request->all();

        try {
            $question = Questions::create($data);

            return $question;
        } catch (\Exception $exception) {
            return response([
                'message' => 'Houve um erro ao registrar a questão',
                'description' => $exception->getMessage()
            ], 400);
        }
    }

    public function list(Request $request)
    {
        $filters = $request->all();
        $filters = array_filter($filters);
        try {
            $data = Questions::with('topics.discipline');
            if (array_key_exists("search", $filters) && $filters['search'] !== '') {
                $search = $filters['search'];
                $data = $data->whereHas('topics.discipline', function ($value) use ($search) {
                    $value->where('discipline.name', 'ilike', "%{$search}%");
                });
            }

            return $data->orderBy('created_at')->paginate(20);
        } catch (\Exception $exception) {
            return response([
                'message' => 'Houve um erro na listagem de questões',
                'description' => $exception->getMessage()
            ], 400);
        }
    }
}
