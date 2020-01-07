@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br/>
                        <a href="{{url('/test/addpub')}}">添加秘钥</a> <a href="/test/decode">进行解密</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
