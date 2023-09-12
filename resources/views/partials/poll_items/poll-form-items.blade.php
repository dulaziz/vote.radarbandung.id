
        <form wire:submit.prevent="storeItems" method="post" id="image-form" enctype="multipart/form-data">
            @csrf

             {{-- Poll Item form --}}
            <div class="row d-flex align-items-center mb-3">
                <div class="col-md-3 text-center text-muted">
                <h6>Polling Items</h6>
                </div>
            </div>

            @if ($message = Session::get('success'))
                {{-- Alert After Create Item --}}
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div id="form_item_add">
                {{-- <h2>{{$vote_unit_id}}</h2> --}}
                {{-- <input type="hidden" name="vote_unit_id" value="{{$vote_unit_id}}"> --}}
                @error('vote_unit_id')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                <div class="row my-5 d-flex align-items-center">
                    <div class="preview col-md-3 d-flex justify-content-center my-3">
                        @if ($vote_image)
                            <img src="{{ $vote_image->temporaryUrl() }}" class="img-thumbnail" style="max-width: 160px; max-height: 174px;">
                        @endif
                    </div>
                  <div class="col-md-9 mb-2">
                    <input class="form-control mb-3" type="file" name="vote_image" wire:model="vote_image">
                        {{-- Response notif form input vote image --}}
                        @error('vote_image')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    <input type="text" class="form-control mb-3" placeholder="Name*" aria-label="Name" name="vote_name" value="{{ old('vote_name') }}" wire:model="vote_name">
                        {{-- Response notif form input vote name --}}
                        @error('vote_name')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    <input type="text" class="form-control mb-3" placeholder="Short desc*" aria-label="Short desc" name="short_desc" value="{{ old('short_desc') }}" wire:model="short_desc">
                        {{-- Response notif form input short desc --}}
                        @error('short_desc')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    <button type="submit" class="btn btn-primary btn-sm "><i class="fa-solid fa-plus"></i>Add Item</button>
                    {{-- <button type="button" class="btn btn-danger btn-sm remove_item_btn"><i class="fa-solid fa-trash"></i> Delete</button> --}}
                  </div>
                </div>
              </div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="/admin" class="btn btn-secondary btn-sm" type="button"><i class="fas fa-reply"></i> Back</a>
              </div>
        </form>

