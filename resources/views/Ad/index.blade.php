@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form">
                    <form action="{{route('ad.search')}}" method="POST" onsubmit="search(event)" id="searchform">
                        @csrf
                         <div class="form-group">
                            <input type="text" class="form-control" id="words">
                         </div>
                         <div class="form-group">
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                         </div>
                    </form>
                </div>
               <div id="resulte">
                @foreach ($ads as $ad)
                <div class="card mb-3" style="width: 100%;">
                    <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$ad->title}}</h5>
                    <small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans()}}</small>
                    <p class="card-text">{{$ad->localisation}}</p>
                    <p class="card-text">{{$ad->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
               </div>
                {{ $ads->links() }}
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
   <script>
        function search(event){
             event.preventDefault();
             const words = document.querySelector('#words').value
             const url = document.querySelector('#searchform').getAttribute('action');
             axios.post(`${url}`, {
                words: words
              })
              .then(function (response) {
                const ads = response.data.ads
                const resulte = document.querySelector('#resulte')
                resulte.innerHTML = ''
                for(let i = 0; i < ads.length; i++){
                     let card = document.createElement('div')
                     let cardbody = document.createElement('div')
                     cardbody.classList.add('card-body')
                     card.classList.add('card','mb-3')
                     let image = document.createElement('img')
                     image.classList.add('card-img-top')
                     image.innerHTML = ads[i].image
                     let title = document.createElement('h5')
                     title.classList.add('card-title')
                     title.innerHTML = ads[i].title
                     let description = document.createElement('p')
                     description.classList.add('p')
                     description.innerHTML = ads[i].description
                     cardbody.appendChild(title)
                     cardbody.appendChild(description)
                     cardbody.appendChild(image)
                     card.appendChild(cardbody)
                     resulte.appendChild(card)
                }
              })
              .catch(function (error) {
                console.log(error);
              });
        }
   </script>
@endsection
