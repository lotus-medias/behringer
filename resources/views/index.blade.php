@extends('layout')

@section('content')
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('img/header.png') }}" class="w-50 ">
        </div>
        <div class="card border-app rounded-0 mt-4 shadow-sm" id="form">
            <div class="card-header rounded-0 bg-app text-light">
                <h3 class="card-title mt-2">Participer au quiz</h3>
            </div>
            <div class="card-body bg-app-light">
                <div class="form-group">
                    <input type="text" class="form-control rounded-0 form-control-lg" placeholder="Entrez votre nom ici " id="nom_participant">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-0 form-control-lg" placeholder="Entrez votre prénom ici " id="prenom_participant">
                </div>
                <div class="form-group">
                    <button class="btn rounded-0 btn-lg btn-outline-primary" id="start_quizz">COMMENCER</button>
                </div>
            </div>
        </div>
        <input type="hidden" id="participant_id" value="">
        <div class="card border-app rounded-0 mt-4 shadow-sm" style="display: none" id="questions">
            <div id="question-body">
                <input type="hidden" id="question_id" value="{{ $question->id }}">

                <div class="card-header rounded-0 bg-app text-light">
                    {{ $question->titre }}
                </div>
                <div class="card-body bg-app-light">
                    <strong>
                        {{ $question->enonce }}
                    </strong>

                    <div class="row px-4 text-center mt-4">
                        <div class="col-md-4 d-flex justify-content-end">
                            <button class="bg-white border-1 answer-btn border-dark rounded-circle" style="height: 150px;width: 150px;"  value="1">
                                {!! $question->reponses->where('ordre',1)->first()->enonce !!}
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button class="bg-white border-2 answer-btn border-dark rounded-circle" style="height: 150px;width: 150px;" value="2">
                                {!! $question->reponses->where('ordre',2)->first()->enonce !!}
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-start">
                            <button class="bg-white border-3 answer-btn border-dark rounded-circle" style="height: 150px;width: 150px;" value="3">
                                {!! $question->reponses->where('ordre',3)->first()->enonce !!}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
            $('#start_quizz').click(function () {
                let nom = $('#nom_participant').val();
                let prenom = $('#prenom_participant').val();
                if(nom === '' && prenom === '') {
                    $('#nom_participant').addClass('is-invalid');
                    $('#prenom_participant').addClass('is-invalid');
                }
                else {
                    $.ajax({
                        method: 'post',
                        url: '{{ url('api/create-participant') }}',
                        data: {
                            nom : nom,
                            prenom: prenom
                        },
                        success:function (response) {
                            $('#form').hide(1000);
                            $('#questions').show(1000);
                            $('#nom_participant').removeClass('is-invalid');
                            $('#prenom_participant').removeClass('is-invalid');
                            $('#participant_id').val(response.id);

                        }
                    })


                }
            })
            $('.answer-btn').click(function(){
                let reponse = $(this).val();
                let question = $('#question_id').val();
                console.log('<img src="img/q' + question + '-r' + reponse +'.png">')
                Swal.fire({
                    html: '<img src="img/q' + question + '-r' + reponse +'.png">',
                    width: 1024,
                    // footer: '<a href>Why do I have this issue?</a>',
                    confirmButtonText: 'Question suivante',
                    confirmButtonColor: '#35ABE2'
                }).then(() => {
                    $.ajax({
                        method: 'post',
                        url:'{{ url('api/send-answer') }}',
                        data: {
                            question:question,
                            reponse:reponse,
                            participant: $('#participant_id').val()
                        },
                        success:function (response) {
                            $('#question-body').html(response.html);
                            // console.log(response);
                        }

                    })
                });
            });
    </script>
@endsection
