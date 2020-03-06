@extends('theme.layout.app')
@section('content')
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
            <div class="dash-page-title">PERSONAS</div>
            <div class="dash-page-addcontent" onclick="window.location.href='{{route('add-persona')}}'">ADD PERSONA <span></span></div>

            <div class="dash-page-listarea">

                <table class="table table-striped">
                    <thead>
                    <tr class="customTheadTr">
                        <th scope="col">Persona Name</th>
                        <th scope="col">Job</th>
                        <th scope="col">Career Path</th>
                        <th scope="col">Family</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($data) < 1)
                        <tr class="customTrStyle">
                            <td colspan="7">No Record Found</td>
                        </tr>
                    @endif
                    @foreach($data as $k => $v)
                        <tr class="customTrStyle">
                            <td >{{$v->persona_name}}</td>
                            <td >{{$v->job}}</td>
                            <td >{{$v->career_path}}</td>
                            <td >{{$v->family}}</td>
                            <td>{{\Carbon\Carbon::parse($v->creatd_at)->toDateString()}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('editPersona',$v->id)}}"  class="dash-page-listactions ml-1"> EDIT</a>
                                    <a href="{{route('deletePersona',$v->id)}}"  class="dash-page-listactions ml-1"> Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row ml-0 mt-2">
                    {{ $data->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
