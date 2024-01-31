@extends('layouts.layout');
@section('section1')
 category
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
                                        <h4 class="card-title mg-b-0"> category  </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('category.update',$Categories->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>name</strong>
                                                    <input type="text" name="name" value="{{ $Categories->name }}" class="form-control"
                                                        placeholder="name ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form_group">
                                                    <label for="">section </label>
                                                        <select name="section" id="section">
                                                        <option value="home">home</option>
                                                                <option value="news">news</option>
                                                                <option value="resource">resource</option>
                                                                <option value="blogs">blogs</option>
                                                                <option value="podcasts">podcasts</option>
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
