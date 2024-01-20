@extends('layouts.layout');
@section('section1')
Admin
@endsection
@section('section2')
All Admin
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
                                        <h2>Admin</h2>
                                    </div>
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add Admin</a>
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
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>facebook</th>
                        <th>linkeden</th>
                        <th>twitter</th>
                        <th>instagram</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Admins as $Admin )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$Admin->name}}</td>
                            <td>{{$Admin->email}}</td>
                            <td>{{$Admin->phone}}</td>
                            <td>{{$Admin->facebook}}</td>
                            <td>{{$Admin->linkeden}}</td>
                            <td>{{$Admin->twitter}}</td>
                            <td>{{$Admin->instagram}}</td>
                            <td>
                                <form action="{{ route('Admin.destroy',$Admin->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{route('Admin.edit',$Admin->id)}}">edit</a>
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
                                                    <h6 class="modal-title"> new Admin  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        @csrf
                                                        <div class="form_group">
                                                            <label for=""> name</label>
                                                            <input type="text" class="form-control" id="name" name="name" required>
                                                        </div>
                                                        <div class="form_group">
                                                             <label for=""> email</label>
                                                            <input type="text" class="form-control" id="email" name="email" required>
                                                        </div>
                                                        <div class="form_group">
                                                             <label for=""> phone</label>
                                                            <input type="number" class="form-control" id="phone" name="phone" required>
                                                        </div>
                                                        <div class="form_group">
                                                             <label for=""> facebook</label>
                                                            <input type="text" class="form-control" id="facebook" name="facebook" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> linkeden</label>
                                                            <input type="text" class="form-control" id="linkeden" name="linkeden" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> twitter</label>
                                                            <input type="text" class="form-control" id="twitter" name="twitter" required>
                                                        </div>
                                                        <div class="form_group">
                                                            <label for=""> instagram</label>
                                                            <input type="text" class="form-control" id="instagram" name="instagram" required>
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

