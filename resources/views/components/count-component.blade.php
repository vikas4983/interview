@foreach ($count as $item)

    {{$data->likes->where('question_answer_id', $data->id)->count()}}
@endforeach