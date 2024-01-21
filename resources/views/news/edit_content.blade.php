@extends('layouts.layout');
@section('section1')
 content
@endsection
@section('section2')
edit
@endsection

@section('content')
				<!-- row -->
				<div class="row">
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0"> news  </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('news_content.update',$contents->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="modal-body">
                                                    <form action="{{route('news_content.store')}}" method="post">
                                                        @csrf
                                                        <div class="form_group">
                                                            <label for=""> title</label>
                                                            <input type="text" class="form-control" id="title" name="title"
                                                            placeholder="title " value="{{ $contents->title }}" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> description</label>
                                                            <input type="text" class="form-control" id="description" name="description"
                                                            placeholder="description "  value="{{ $contents->description }}" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> title_news</label>
                                                            <select  class="form-control" name="news_id" id="news_id" value="{{ $contents->news_id }}" >
                                                                @foreach ($new as $news )
                                                                <option value="{{$news->id}}">
                                                                    {{$news->title}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                <button type="submit" class="btn btn-primary ml-3">Submit</button>

                                             </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/div-->

                        <!--div-->
                    </div>
				</div>
				<!-- row closed -->
@endsection
