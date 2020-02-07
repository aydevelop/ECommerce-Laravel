@extends('layouts.front')

@section('content')

<div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                <div class="text-center">{{ Auth::user()->name }}, {{ Auth::user()->email }}</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">

                        <form method="POST" action="{{ url('account') }}">@csrf</form>
                        <form method="POST" action="{{ url('account') }}">
                        @csrf

                          <div class="control-group">
                            <label class="control-label" for="name">Name</label>
                            <div class="controls">
                              <input value="{{ old('name') }}"type="text" id="name" name="name" placeholder="Name">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="phone">Email</label>
                            <div class="controls">
                              <input value="{{ old('password_old') }}" type="text" id="phone" name="email" placeholder="Email">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="phone">Password New</label>
                            <div class="controls">
                              <input value="{{ old('password_new') }}" type="password" id="phone" name="password_new" placeholder="Password New">
                            </div>
                          </div>

                          <div class="control-group">
                            <div class="controls">
                              <br />
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                            <div class="controls">
                                <br /><br />
                                <a href="/logout" class="btn btn-warning">Logout</a>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>


        <div class="row">
            <div class="col-md-4 col-md-offset-4 error">
                <ul style="padding-left:40px; color:red">
                    @foreach($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        </div>

        </div>
@endsection
