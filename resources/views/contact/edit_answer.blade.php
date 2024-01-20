@extends('layouts.layout');
@section('section1')
 contact
@endsection
@section('section2')
Asked question
@endsection

@section('content')
				<!-- row -->
				<div class="row">
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0"> Asked question  </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('answer.update',$Answers->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>ask</strong>
                                                    <input type="text" name="ask" value="{{ $Answers->ask }}" class="form-control"
                                                        placeholder="ask ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>answer</strong>
                                                    <input type="text" name="answer" value="{{ $Answers->answer }}" class="form-control"
                                                        placeholder="answer ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
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
