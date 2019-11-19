
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
<script>
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