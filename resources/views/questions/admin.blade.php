@extends('master')
@section('title', 'Questions list')

@section('content')

<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2> Список вопросов </h2>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>№</th>
                <th>Вопрос</th>
                <th>Рубрика</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{!! $question->id !!}</td>
                    <td><a href="{!! action('QuestionsController@edit', $question->id) !!}">{!! $question->question !!}</a></td>
                    <td>{!! $rubrics_ar[$question->rubric] !!}</td>
                    <td>{!! $question->status? 'Публикуется' : 'Не публикуется'  !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection