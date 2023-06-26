<nav class="navbar navbar-expand-md navbar-dark shadow fixed-top" style="background-color: transparent">
    <div class="container">
        <a class="navbar-brand h1" href="{{ route('home') }}">
            <img src="../assets/favicon.png" width="30" height="30" class="d-inline-block align-top img-circle"
                alt="Logo">
            Angkringan Peteng
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <x-nav-item-tamu label='Home' :link="route('home')" />
                <x-nav-item-tamu label='Makanan' :link="route('makanan')" />
            </ul>
        </div>
    </div>
</nav>
