@extends('theme.layout.app')
@push('cs')
    <style>
        .addClass{
            min-width: 100% !important;
        }
        .customStyleRow{
            width:100% !important;
            margin-bottom: 15px;
        }
        .setCustomeH3{
            padding-left: 17px;
            font-size: 20px;
        }
        .customTextArea{
            height: 150px;
            background: #F7F9FC;
            border-radius: 3px;
        }
    </style>
@endpush
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
                <input type="hidden" name="project_id" value="{{$project_id}}">
                <input type="hidden" name="personaId" value="{{$persona->id}}">
                <div class="add-users-box" style="margin-bottom: 20px;">
                    <div class="row customStyleRow">
                        <div class="col-md-6">
                            <label>PERSONA ARCHETYPE</label>
                            <input type="text" placeholder="" class="form-control addClass" name="persona_name" value="{{$persona->persona_name}}" required>
                        </div>
                        <div class="col-md-6">
                            <label>JOB</label>
                            <input type="text" placeholder="" class="form-control addClass" name="job" value="{{$persona->job}}" required>
                        </div>
                    </div>
                    <div class="row customStyleRow">
                        <div class="col-md-6">
                            <label>CAREER PATH</label>
                            <input type="text" placeholder="" class="form-control addClass" name="career_path" value="{{$persona->career_path}}" required>
                        </div>
                        <div class="col-md-6">
                            <label>FAMILY</label>
                            <input type="text" placeholder="" class="form-control addClass" name="family" value="{{$persona->family}}" required>
                        </div>
                    </div>
                </div>
                <div class="row customStyleRow">
                    <h3 class="setCustomeH3">Interest
                    </h3>
                </div>
                <div class="row customStyleRow">
                    <div class="col-md-4">
                        <div class="team-addcontent-voice" style="margin-left: 0px;margin-top:0px;width: 100%;">
                            <div>
                                <label>HOBBIES</label>
                                <textarea class="customTextArea" name="hobbies">{{$persona->hobbies}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-addcontent-voice" style="margin-left: 0px;margin-top:0px;width: 100%;">
                            <div>
                                <label>LEISURE TIME</label>
                                <textarea class="customTextArea" name="leisure_time">{{$persona->leisure_time}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row customStyleRow">
                    <div class="col-md-4">
                        <div class="team-addcontent-voice" style="margin-left: 0px;margin-top:0px;width: 100%;">
                            <div>
                                <label>MEDIA</label>
                                <textarea class="customTextArea" name="media">{{$persona->media}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-addcontent-voice" style="margin-left: 0px;margin-top:0px;width: 100%;">
                            <div>
                                <label>INFLUENCERS</label>
                                <textarea class="customTextArea" name="influencers">{{$persona->influnencrs}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-addcontent-voice" style="margin-left: 0px;margin-top:0px;width: 100%;">
                            <div>
                                <label>WEBSITE</label>
                                <textarea class="customTextArea" name="website">{{$persona->website}}</textarea>
                            </div>
                        </div>
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
    <script>
        // TAGIFY
        new Tagify(document.querySelector('textarea[name=hobbies]'))
        new Tagify(document.querySelector('textarea[name=leisure_time]'))
        new Tagify(document.querySelector('textarea[name=influencers]'))
        new Tagify(document.querySelector('textarea[name=website]'))
        new Tagify(document.querySelector('textarea[name=media]'))
    </script>
@endsection
