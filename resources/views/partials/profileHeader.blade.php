<div class="jumbotron">
    <div class="row">
        <div class="col-sm-6">
            <h1><span class="glyphicon glyphicon-user text-success"></span> {{ $user->f_name }} {{ $user->l_name }}</h1>
            <p><span class="glyphicon glyphicon-envelope"></span> {{ $user->email }}</p>
            <p><a class="btn btn-primary" href="#myProfileModal" data-toggle="modal" role="button">Edit Profile</a></p>
        </div>
        <div class="col-sm-6">
            <div id="completeness" class="text-center hidden-xs" data-text="{{ $nulls }}%" data-percent="{{ $nulls }}" data-info="Profile Completeness" data-fill="#CFDBC5" data-dimension="225" data-animationstep="2" data-fontsize="42"></div>
        </div>
    </div>
</div>