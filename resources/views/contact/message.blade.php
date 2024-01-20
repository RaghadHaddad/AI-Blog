@extends('layouts.layout');
@section('section1')
contact
@endsection
@section('section2')
message
@endsection

@section('content')
<div class="row">
                    <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>message</h2>
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
                        <th>phone</th>
                        <th>message</th>
                        <th>agree</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $contacts )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$contacts->first_name}}</td>
                             <td>{{$contacts->last_name}}</td>
                            <td>{{$contacts->email}}</td>
                            <td>{{$contacts->phone}}</td>
                            <td>{{$contacts->message}}</td>
                            <td>{{$contacts->agree}}</td>
                            <td>
                                <form action="{{route('Message.destroy',$contacts->id)}}"  method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{route('Message.edit',$contacts->id)}}">add to opinon table</a>
                                    <button type="submit" class="btn btn-primary">delete </button>
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

