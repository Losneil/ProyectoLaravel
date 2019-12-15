@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1><b>Interacción con los usuarios<b></h1>
                <form action="{{ route('user.index') }}" method="GET" id="buscador">
                    <div class="row searchbox">
                        <div class="form-group col">
                            <input type="text" id="search" class="form-control" />
                        </div>
                        <div class="form-group col btn-search">
                            <input type="submit" value="Buscar" class="btn btn-success"/>
                        </div>
                    </div>
                </form>
            <hr>
            @foreach ($users as $user)
                <div class="data-user">
                    @if($user->image)
                        <div class="container-avatar-profile">
                            <img src="{{ route('user.avatar',['filename'=>$user->image]) }}">
                        </div>
                    @endif
                    <div class="user-info">
                        <h2>{{ '@'. $user->nick }}</h2>
                        <h3 class="username">{{ $user->name .' '. $user->surname }}</h3>
                        <p class="union">{{ 'Se unió '.\FormatTime::LongTimeFilter($user->created_at) }}</p>
                        <a href="{{ route('profile', ['id' => $user->id]) }}" class="btn btn-success view-profile">Ver perfil</a>
                    </div>
                    <br><br>
                </div>
                <hr>
            @endforeach
            <div class="clearfix"></div>
            <div class="links">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection
