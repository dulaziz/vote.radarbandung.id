
@extends('layouts.main')

@section('child')

  <div class="container">

    <div class="col-md-10 mx-auto my-5">

    <h6 class="text-muted mb-5">{{ $title }}</h6>

    @if ($message = Session::get('success'))
        {{-- Allert after Vote --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong> Terimakasih telah mengikuti Polling kami.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

{{-- Looping data User Vote --}}
@foreach ($user_vote as $uv)


    {{-- Validasi Voting User --}}
    @if ($uv->user_vote == 5 )

    {{-- Looping data vote item --}}

    @foreach ($polling_item as $item)

        <form action="{{ '/pollSurvey' }}" method="post">
            @csrf

            {{-- Value Vote +1 --}}
            <input type="hidden" name="response" value="{{ $total_vote->total_vote +1 }}">
            <input type="hidden" name="vote_unit_id" value="{{ $polling_unit->id }}">
            <input type="checkbox" name="vote_item_id" id="opt-{{$item->id}}" value="{{$item->id}}">

            <div class="row">
            <div class="poll-area">
                <label for="opt-1" class="opt-{{$item->id}}">
                <div class="col-md-2 thumb">
                    <img src="/img/Dedi A Rachim.jpg" class="img-fluid img-thumbnail rounded" alt="...">
                </div>
                <div class="col-md-10 ps-3">
                    <h5 class="card-title fw-bold">{{$item->vote_name}}</h5>
                    <p class="card-text"><small class="text-muted">Wakil Wali Kota Bogor</small></p>
                    <div class="d-flex align-items-center">
                    <span class="circle"></span>
                    <p class="mb-0">Vote</p>
                    @php
                        $total_vote = $item->response / $total_user_vote * 100;
                    @endphp
                    <span class="percent ms-3">{{$total_vote}}</span>
                    </div>
                    <div class="progress" style='--w:60;'></div>
                </div>
                </label>
            </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary float-end">Simpan</button>
                </div>
            </div>
        </form>


    @endforeach

    @endif

    {{-- End Validasi --}}

@endforeach
{{-- End Looping --}}


    {{-- <div class="row">
      <div class="poll-area">
        <label for="opt-2" class="opt-2">
          <div class="col-md-2 thumb">
              <img src="/img/Atang Trisnanto.jpg" class="img-fluid img-thumbnail rounded" alt="...">
          </div>
          <div class="col-md-10 ps-3">
            <h5 class="card-title fw-bold">Atang Trisnanto</h5>
            <p class="card-text"><small class="text-muted">Wakil Wali Kota Bogor</small></p>
            <div class="d-flex align-items-center">
              <span class="circle"></span>
              <p class="mb-0">Vote</p>
              <span class="percent ms-3">50%</span>
            </div>
            <div class="progress" style='--w:50;'></div>
          </div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="poll-area">
        <label for="opt-3" class="opt-3">
          <div class="col-md-2 thumb">
              <img src="/img/Yane Ardian.jpg" class="img-fluid img-thumbnail rounded" alt="...">
          </div>
          <div class="col-md-10 ps-3">
            <h5 class="card-title fw-bold">Yane Ardian</h5>
            <p class="card-text"><small class="text-muted">Wakil Wali Kota Bogor</small></p>
            <div class="d-flex align-items-center">
              <span class="circle"></span>
              <p class="mb-0">Vote</p>
              <span class="percent ms-3">40%</span>
            </div>
            <div class="progress" style='--w:40;'></div>
          </div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="poll-area">
        <label for="opt-4" class="opt-4">
          <div class="col-md-2 thumb">
              <img src="/img/Ilustrasi.jpg" class="img-fluid img-thumbnail rounded" alt="...">
          </div>
          <div class="col-md-10 ps-3">
            <h5 class="card-title fw-bold">Lainnya</h5>
            <p class="card-text"><small class="text-muted">Lainnya</small></p>
            <div class="d-flex align-items-center">
              <span class="circle"></span>
              <p class="mb-0">Vote</p>
              <span class="percent ms-3">30%</span>
            </div>
            <div class="progress" style='--w:30;'></div>
          </div>
        </label>
      </div>
    </div> --}}


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
/* *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #6665ee;
}
::selection{
  color: #fff;
  background: #00548F;
}
.wrapper{
  background: #fff;
  border-radius: 15px;
  padding: 25px;
  max-width: 380px;
  width: 100%;
  box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
}
.wrapper header{
  font-size: 22px;
  font-weight: 600;
} */
.wrapper .poll-area{
  margin: 20px 0 15px 0;
}
.poll-area label{
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  border-radius: 5px;
  padding: 8px 15px;
  border: 2px solid #e6e6e6;
  transition: all 0.2s ease;
}
.poll-area label .thumb{
  max-width: 160px;
}
.poll-area label:hover{
  border-color: #ddd;
}
label.selected{
  border-color: #00548F!important;
}
/* label .row{
  display: flex;
  pointer-events: none;
  justify-content: space-between;
}
label .row .column{
  display: flex;
  align-items: center;
} */
.row label .circle{
  height: 19px;
  width: 19px;
  display: block;
  border: 2px solid #ccc;
  border-radius: 50%;
  margin-right: 10px;
  position: relative;
}
.row label.selected .circle{
  border-color: #00548F;
}
.row label .circle::after{
  content: "";
  height: 11px;
  width: 11px;
  background: #00548F;
  border-radius: inherit;
  position: absolute;
  left: 2px;
  top: 2px;
  display: none;
}
.row .poll-area label:hover .circle::after{
  display: block;
  background: #e6e6e6;
}
.row label.selected .circle::after{
  display: block;
  background: #00548F!important;
}
.row label span{
  font-size: 16px;
  font-weight: 500;
}
.row label .percent{
  display: none;
}
label .progress{
  height: 15px;
  width: 100%;
  position: relative;
  background: #f0f0f0;
  margin: 8px 0 3px 0;
  border-radius: 30px;
  display: none;
  pointer-events: none;
}
label .progress:after{
  position: absolute;
  content: "";
  height: 100%;
  background: #ccc;
  width: calc(1% * var(--w));
  border-radius: inherit;
  transition: all 0.2s ease;
}
label.selected .progress::after{
  background: #00548F;
}
.row label.selectall .progress,
label.selectall .percent{
  display: block;
}
input[type="radio"],
input[type="checkbox"]{
  display: none;
}
</style>


<script>
    const options = document.querySelectorAll("label");
    for (let i = 0; i < options.length; i++) {
    options[i].addEventListener("click", ()=>{
        for (let j = 0; j < options.length; j++) {
        if(options[j].classList.contains("selected")){
            options[j].classList.remove("selected");
        }
    }

    options[i].classList.add("selected");
    for (let k = 0; k < options.length; k++) {
      options[k].classList.add("selectall");
    }

    let forVal = options[i].getAttribute("for");
    let selectInput = document.querySelector("#"+forVal);
    let getAtt = selectInput.getAttribute("type");
    if(getAtt == "checkbox"){
      selectInput.setAttribute("type", "radio");
    }else if(selectInput.checked == true){
      options[i].classList.remove("selected");
      selectInput.setAttribute("type", "checkbox");
    }

    let array = [];
    for (let l = 0; l < options.length; l++) {
      if(options[l].classList.contains("selected")){
        array.push(l);
      }
    }
    if(array.length == 0){
      for (let m = 0; m < options.length; m++) {
        options[m].removeAttribute("class");
      }
    }
  });
}
</script>


</div>

</div>


@endsection
