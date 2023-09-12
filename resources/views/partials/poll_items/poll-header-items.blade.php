<link rel="stylesheet" href="css/global.css">

  {{-- Polling Unit header --}}
<div class="row my-2 d-flex align-items-center">
    {{-- Thumbnail Poll Unit --}}
    <div class="preview col-md-4 d-flex justify-content-center my-3">
        <img src="{{ asset('storage/' . $vote_unit->thumbnail)}}" id="file-ip-1-preview" class="img-thumbnail" style="max-width: 260px; max-height: 274px;">
    </div>
    <div class="col-md-8 mb-2">
        {{-- Response notif form input thumbnail --}}
        @error('thumbnail')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
      {{-- Input title --}}
      <input type="text" class="form-control mb-3" placeholder="Title*" aria-label="Title" name="title" value="{{ $vote_unit->title }}" readonly>
        {{-- Response notif form input title --}}
        @error('title')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
      {{-- Input description --}}
      <textarea class="form-control mb-3" placeholder="Description" id="floatingTextarea2" style="height: 100px" name="description" value="{{ $vote_unit->description }}" readonly>{{ $vote_unit->description }}</textarea>
      {{-- Input date --}}
      <div class="row">

        @php
          $epoch_start = $vote_unit->date_start;
          $dt = new DateTime("@$epoch_start");  // convert UNIX timestamp to PHP DateTime
          $date_start = $dt->format('d/m/Y');

          $epoch_end = $vote_unit->date_end;
          $dt = new DateTime("@$epoch_end");  // convert UNIX timestamp to PHP DateTime
          $date_end = $dt->format('d/m/Y');

          // $date = new DateTime('07/09/2022'); // format: MM/DD/YYYY
          // echo $date->format('U');

          //    echo time();

          $times = round(microtime(true));
          $ts = new DateTime("@$times");
          $today = $ts->format('d-m-Y');

      @endphp

      <div class="col-md-6">
        <div class="form-floating">
          <input class="form-control-edit" type="hidden" name="date_start_old" id="floatingInput" value="{{ $date_start }}">
          <input class="form-control-edit" type="text" name="date_start" id="floatingInput" placeholder="{{$date_start}}" readonly>
          <label for="floatingInput title-text" class="label-form-control-input">Start Date</label>
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-floating">
          <input class="form-control-edit" type="hidden" name="date_end_old" id="floatingInput" value="{{ $date_end }}">
          <input type="text" class="form-control-edit" id="floatingInput" placeholder="{{ $date_end }}" name="date_end" readonly>
          <label for="floatingInput title-text" class="label-form-control-input">Expired</label>
        </div>
      </div>
      </div>
    </div>
  </div>

    <hr>

      {{-- Card sub title --}}
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" placeholder="Text" name="subtitle" value="{{ $vote_unit->subtitle }}" readonly>
    <label for="floatingInput">Sub Title*</label>
     {{-- Response notif form input title --}}
     @error('subtitle')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
  </div>


