@extends('layouts.layout');
@section('section1')
 Author
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
                                        <h4 class="card-title mg-b-0"> Name details </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('Author.update',$Author->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>author_name</strong>
                                                    <input type="text" name="author_name" value="{{ $Author->author_name }}" class="form-control"
                                                        placeholder="author_name ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>author_image</strong>
                                                    <input type="text" name="author_image" value="{{ $Author->author_image }}" class="form-control"
                                                        placeholder="author_image ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>country</strong>
                                                    <input type="text" name="country" value="{{ $Author->country }}" class="form-control"
                                                        placeholder="country ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>permission</strong>
                                                    <input type="text" name="permission" value="{{ $Author->permission }}" class="form-control"
                                                        placeholder="permission ">
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
