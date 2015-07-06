<!-- Modal Trigger -->
<div ng-repeat="feature in githubbifier.features">
    <a class="waves-effect waves-light btn modal-trigger @{{ feature.color }}" href="#modal1">@{{feature.name }} @{{feature.price | currency }}</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content #e3f2fd blue lighten-5">
            <h1> @{{ feature.name }} </h1>
            <p> @{{ feature.description }}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
</div>
