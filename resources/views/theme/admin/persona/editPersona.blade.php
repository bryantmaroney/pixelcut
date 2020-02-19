@extends('theme.layout.app')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                $(function () {
                    $.toast({
                        heading: 'error',
                        text: '{{$error}}',
                        icon: 'error',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#9EC600',  // To change the background
                        position: 'top-right'
                    })
                })
            </script>
        @endforeach
    @endif
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
            <div class="dash-page-title">Edit Persona</div>

            <form method="POST" action="{{route('UpdatePersona')}}"><!-- start form -->
                @csrf
                <input type="hidden" name="personaId" value="{{$persona->id}}">
                <div class="add-users-box">
                    <div>
                        <label>PERSONA NAME</label>
                        <input type="text" placeholder="persona name" name="persona_name" value="{{$persona->persona_name}}" required>
                    </div>
                </div>

                <div class="team-addcontent-bottombuttons add-users-bottombuttoms">
                    <div>
                        <input type="submit" value="Update">
                    </div>
                </div>

            </form><!-- end form -->

        </div><!-- dash contentarea-wrapper -->
    </div>
    </div>
@endsection
