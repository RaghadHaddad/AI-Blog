@extends('layouts.layout');
@section('section1')
 Admin
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
                                        <h4 class="card-title mg-b-0"> edit admin  </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('Admin.update',$Admins->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                             <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>name</strong>
                                                    <input type="text" name="name" value="{{ $Admins->name }}" class="form-control"
                                                        placeholder="name ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>email</strong>
                                                    <input type="text" name="email" value="{{ $Admins->email }}" class="form-control"
                                                        placeholder="email ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>phone</strong>
                                                    <input type="number" name="phone" value="{{ $Admins->phone }}" class="form-control"
                                                        placeholder="phone ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>facebook</strong>
                                                    <input type="text" name="facebook" value="{{ $Admins->facebook }}" class="form-control"
                                                        placeholder="facebook ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>linkeden</strong>
                                                    <input type="text" name="linkeden" value="{{ $Admins->linkeden }}" class="form-control"
                                                        placeholder="linkeden ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>twitter</strong>
                                                    <input type="text" name="twitter" value="{{ $Admins->twitter }}" class="form-control"
                                                        placeholder="twitter ">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <strong>instagram</strong>
                                                    <input type="text" name="instagram" value="{{ $Admins->instagram }}" class="form-control"
                                                        placeholder="instagram ">
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
