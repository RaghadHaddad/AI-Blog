@extends('layouts.layout');
@section('section1')
contact
@endsection
@section('section2')
Asked question
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
                                        <h2>Asked question</h2>
                                    </div>
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add Asked question  </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
<div class="row">
                    <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>answer</h2>
                                    </div>
                                </div>
                            </div>
                 <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>ask</th>
                        <th>answer</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Answers as $Answer )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$Answer->ask}}</td>
                             <td>{{$Answer->answer}}</td>
                             <td>
                                <form action="{{ route('answer.destroy',$Answer->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{route('answer.edit',$Answer->id)}}">edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                        <!-- Basic modal -->
                                    <div class="modal" id="modaldemo8">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> Asked$answer  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        @csrf
                                                        <div class="form_group">
                                                            <label for=""> ask</label>
                                                            <textarea name="ask" id="ask" cols="25" rows="5"></textarea>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> answer</label>
                                                            <textarea name="answer" id="answer" cols="25" rows="5"></textarea>
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
            </div>

</div>

@endsection

