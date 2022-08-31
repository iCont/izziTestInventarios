@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif(session('status_success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="box-container">
                @if ($user_auth[0]['profile_id']==1)
                <a class="box_a" href="{{route('users.index')}}">
                    <div class="col-4 box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        <i class="fas fa-users iconos"></i>
                        <h2 class="perfiles_title">USUARIOS</h2>
                    </div>
                </a>
                @endif
                @if ($user_auth[0]['profile_id']==1 || $user_auth[0]['profile_id']==2)
                    @if ($user_auth[0]['profile_id']==1)
                    <a class="box_a" href="{{route('products.index')}}">
                        @else
                        <a class="box_a" href="{{route('products.create')}}">
                    @endif
                    <div class="col-4 box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        <i class="fas fa-user iconos"></i>
                        <h2 class="perfiles_title">REGISTRAR</h2>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
@endsection
