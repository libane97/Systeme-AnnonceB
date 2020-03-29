@extends('layouts.app')

@section('content')
    <div class="container">
         <h3>Creer un annonce</h3>
         <hr>
         <form method="POST" action="{{route('store.ad')}}">
             @csrf
            <div class="form-group">
              <label for="title">title</label>
              <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}">
              @if ($errors->has('title'))
              <span class="invalid-feedback">remplir le titre de annnoce</span>
              @endif
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"></textarea>
                @if ($errors->has('description'))
                 <span class="invalid-feedback">remplir le description de annnoce</span>
                @endif
              </div>
            <div class="form-group">
              <label for="localisation">localisation</label>
              <input type="text" name="localisation" class="form-control {{ $errors->has('localisation') ? 'is-invalid' : ''}}">
                @if ($errors->has('localisation'))
                 <span class="invalid-feedback">remplir le localisation de annnoce</span>
                @endif
            </div>
            <div class="form-group">
              <label for="price">Prix</label>
              <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}">
              @if ($errors->has('price'))
              <span class="invalid-feedback">remplir le price de annnoce</span>
             @endif
            </div>
            @guest
                 <h3>Vos Informations</h3>
                 <hr>
                 <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">remplir le price de annnoce</span>
                   @endif
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">remplir le price de annnoce</span>
                   @endif
                </div>
                <div class="form-group">
                    <label for="password">password </label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback">remplir le price de annnoce</span>
                   @endif
               </div>
               <div class="form-group">
                <label for="password_confirmation">password_confirmation </label>
                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}">
                @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">remplir le price de annnoce</span>
               @endif
           </div>
            @endguest
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
