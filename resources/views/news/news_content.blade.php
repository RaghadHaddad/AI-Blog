@extends('layouts.layout');
@section('section1')
news
@endsection
@section('section2')
content news
@endsection

@section('content')
@if (session()->has('Add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Add') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('Error'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
<div class="row">
                    <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>news_content</h2>
                                    </div>
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add details </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                 <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>title_news</th>
                        <th>author_name</th>
                        <th>category name</th>
                        <th>publicate_date</th>
                        <th>title</th>
                        <th>description</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $content )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$content->news->title}}</td>
                            <td>{{$content->news->author->author_name}}</td>
                            <td>{{$content->news->category->name}}</td>
                            <td>{{$content->news->publicate_date}}</td>
                            <td>{{$content->title}}</td>
                            <td>{{$content->description}}</td>
                            <td>
                                <form action="{{ route('news_content.destroy',$content->id) }}" method="Post">
                                     <a class="btn btn-primary" href="{{route('news_content.edit',$content->id)}}">edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
                            		<!-- Basic modal -->
                                    <div class="modal" id="modaldemo8">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> new Category  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('news_content.store')}}" method="post">
                                                        @csrf
                                                        <div class="form_group">
                                                            <label for=""> title</label>
                                                            <input type="text" class="form-control" id="title" name="title" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> description</label>
                                                            <input type="text" class="form-control" id="description" name="description" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> title_news</label>
                                                            <select  class="form-control" name="news_id" id="news_id">
                                                                @foreach ($new as $news )
                                                                <option value="{{$news->id}}">
                                                                    {{$news->title}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn  btn-primary" type="submit">ok </button>
                                                            <button class="btn  btn-secondary" data-dismiss="modal" type="button">close</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                  </div>
                            <!-- End Basic modal -->
</div>

@endsection

