@extends('layouts.layout');
@section('section1')
news
@endsection
@section('section2')
All news
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
                                        <h2>news</h2>
                                    </div>
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add news</a>
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
                        <th>author_name</th>
                        <th>category name</th>
                        <th>title</th>
                        <th>overview</th>
                        <th>section</th>
                        <th>publicate_date</th>
                        <th>reading_time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($new as $news )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$news->author->author_name}}</td>
                            <td>{{$news->category->name}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{$news->overview}}</td>
                            <td>{{$news->section}}</td>
                            <td>{{$news->publicate_date}}</td>
                            <td>{{$news->reading_time}}</td>
                            <td>
                                <form action="{{ route('news.destroy',$news->id) }}" method="Post">
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
                                                    <form action="" method="post" enctype="multipart/form-data" >
                                                        @csrf
                                                        <div class="form_group">
                                                            <label for=""> title</label>
                                                            <input type="text" class="form-control" id="title" name="title" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> overview</label>
                                                            <input type="text" class="form-control" id="overview" name="overview" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> reading_time </label>
                                                            <input type="number" name="reading_time">
                                                        </div
                                                        <div class="form_group">
                                                            <label for="">section </label>
                                                            <select name="section" id="section">
                                                                <option value="today_news">today_news</option>
                                                                <option value="posts">posts</option>
                                                                <option value="Main_news">Main_news</option>
                                                            </select>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> Author_name</label>
                                                            <select  class="form-control" name="author_id" id="author_id">
                                                                @foreach ($authors as $author )
                                                                <option value="{{$author->id}}">
                                                                    {{$author->author_name}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> category_name</label>
                                                            <select  class="form-control" name="category_id" id="category_id">
                                                                @foreach ($categories as $category )
                                                                <option value="{{$category->id}}">
                                                                    {{$category->name}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> image</label>
                                                            <input type="file" name="image">
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> publicate date</label>
                                                            <input type="date" name="publicate_date">
                                                        </div
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

