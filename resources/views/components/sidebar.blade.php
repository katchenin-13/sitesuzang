<aside class="control-sidebar ">
<!-- Control sidebar content goes here -->
<div class="bg-dark" style="background-color: #64350d !important;">
    <div class="card-body bg-dark box-profile" style="background-color: #64350d !important;">
    <!-- <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{asset('images/user1-128x128.jpg')}}" alt="User profile picture">
    </div> -->

    <h3 class="profile-username text-center ellipsis">{{ userFullName() }} </h3>

    <p class=" text-center">{{getRolesName()}}</p>

    <ul class="list-group bg-dark mb-3">
        <li class="list-group-item">
        <a href="#" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
        </li>
        <li class="list-group-item">
        <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profile</b> </a>
        </li>
    </ul>

    <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        Déconnexion
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
    <!-- /.card-body -->
</div>
</aside>
