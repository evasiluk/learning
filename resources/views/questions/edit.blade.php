@extends('master')
@section('title', 'Редактирование вопроса')

@section('content')
 <div class="container col-md-8 col-md-offset-2">
     <div class="well well bs-component">
         <form class="form-horizontal" method="post">
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
         @foreach($errors->all() as $error)
            <p class="alert alert-danger">{!! $error !!}</p>
         @endforeach
         @if(session('status'))
            <p class="alert alert-success">{!! session('status') !!}</p>
         @endif


         <fieldset>
             <legend>Редактирование вопроса</legend>
             <div class="form-group">
                 <label for="exampleFormControlSelect1" class="col-lg-2 control-label">Рубрика</label>
                 <div class="col-lg-10 col-lg-offset-2">
                     <select name="rubric" class="form-control" id="exampleFormControlSelect1">
                         @foreach($rubrics as $i => $rub)
                             <option @if($rub->id == $question->rubric) selected @endif value = "{!! $rub->id !!}" >{!! $rub->name !!}</option>
                         @endforeach
                     </select>
                 </div>
             </div>
             <div class="form-group">
                <label class="col-lg-2 control-label">Вопрос</label>
                 <div class="col-lg-10">
                     <textarea class="form-control" rows="10" name="question">{{ $question->question }}</textarea>
                 </div>
             </div>
             <div class="form-group">
                <label class="col-lg-2 control-label">Ответ</label>
                  <div class="col-lg-10">
                       <textarea class="form-control" rows="10" name="answer">{{ $question->answer }}</textarea>
                  </div>
             </div>
             <div class="form-group">
                <label class="col-lg-2 control-label">Публикуется</label>
                   <div class="col-lg-10">
                        <input type="checkbox" name="status" @if($question->status) checked @endif>
                   </div>
             </div>
             <div class="form-group">
                 <div class="col-lg-10 col-lg-offset-2">
                     <button class="btn btn-default">Cancel</button>
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </div>
         </fieldset>
         </form>
     </div>
</div>
@endsection