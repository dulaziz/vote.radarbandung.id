@foreach ($vote_unit->vote_items as $item)

    <div id="form_item_add">
        {{-- <input type="hidden" name="vote_unit_id" value="{{ $vote_unit->id }}"> --}}
        <div class="row my-5 d-flex align-items-center">
            <div class="preview col-md-3 d-flex justify-content-center my-3">
                <img src="{{ asset('storage/' . $item->vote_image) }}" id="file-ip-2-preview" class="img-thumbnail" style="max-width: 160px; max-height: 174px;">
            </div>
        <div class="col-md-9 mb-2">
            <input type="text" class="form-control mb-3" placeholder="Name*" aria-label="Name" value="{{$item->vote_name}}" readonly>
                {{-- Response notif form input vote name --}}
                @error('vote_name')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            <input type="text" class="form-control mb-3" placeholder="Short desc*" aria-label="Short desc" name="short_desc" value="{{$item->short_desc}}" readonly>
                {{-- Response notif form input short desc --}}
                @error('short_desc')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            {{-- <button type="button" class="btn btn-primary btn-sm "><i class="fa-solid fa-plus"></i> Delete</button> --}}
            <button type="button" class="btn btn-danger btn-sm remove_item_btn"><i class="fa-solid fa-trash"></i> Delete</button>
            <button type="button" class="btn btn-dark btn-sm"><i class="fa-solid fa-plus"></i> Add Profile</button>
        </div>
        </div>
    </div>

@endforeach
