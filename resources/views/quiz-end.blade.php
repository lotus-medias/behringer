<div class="card-header rounded-0 bg-app text-light">
    Terminé
</div>
<div class="card-body bg-app-light">
    <h4>
        Merci <strong>{{ $participant->nom }} {{ $participant->prenom }} </strong> vous avez <strong>{{ $participant->participations->where('est_juste',true)->count() }}</strong> bonne réponses sur <strong>5</strong> .
    </h4>


    <div class="form-group">
        <button class="btn rounded-0 btn-lg btn-outline-primary" onclick="location.reload()">Finir</button>
    </div>


</div>