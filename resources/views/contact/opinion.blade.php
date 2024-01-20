@extends('layouts.layout');
@section('section1')
contact
@endsection
@section('section2')
opinion

@endsection

@section('content')
<div class="row">
                    <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>opinion</h2>
                                    </div>
                                </div>
                            </div>
                 <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($opinions as $opinion )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$opinion->first_name}}</td>
                             <td>{{$opinion->last_name}}</td>
                            <td>{{$opinion->email}}</td>
                            <td>{{$opinion->message}}</td>
                            <td>
                                <form action="{{route('Opinion.destroy',$opinion->id) }}" method="Post">
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

</div>

@endsection

