<div>
    <p class="lead">Complete the form below.</p>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="usr">Business Name:</label>
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="usr">Business Slogan/Motto:</label>
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="col-md-12">
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" wire:model="addon" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    I want my preferred domain name.<small>(Nb: This feature comes with an extra cost of GHS
                        100.00)</small>
                </label>
            </div>
            <hr>
        </div>

        @if(!$addon)
        <div class="col-md-6">
            <label for="usr">Website name
                <small>(https://{{$subdomain ? $subdomain : "yourname"}}.365bizconnect.com)</small></label>
            <div class="input-group mb-3">

                <input type="text" class="form-control" wire:model.defer="subdomain" placeholder="Yourname">
                <div class="input-group-append">
                    <span class="input-group-text">.365bizconnect.com</span>
                </div>
            </div>
        </div>
        @endif


        @if($addon)

        <div class="col-md-6">
            <label for="usr">Enter Domain Name
                <small>(https://{{$domain ? $domain : "yourname"}}.com)</small></label>
            <div class="input-group mb-3">

                <input type="text" class="form-control" wire:model.lazy="domain" placeholder="Yourname">
                <div class="input-group-append">
                    <span class="input-group-text">.com</span>
                </div>
            </div>
            @error('domain') <span class="error">{{ $message }}</span> @enderror
            <div><button class="btn btn-default" wire:click="checkavailability" wire:loading.attr="disabled"> -> Check
                    Availability</button></div>
            <div wire:loading.inline wire:target="checkavailability">
                check in progress
            </div>
            <div>{{$msg}}</div>
        </div>
        @endif

        <div class="col-md-12">
            <br>
            <div class="form-group">
                <label>Business Description:</label>
                <textarea class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="usr">Select Business Focus/Industry:</label>
                @foreach($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                    <label class="form-check-label" for="defaultCheck1">
                        {{$category->name}}
                    </label>
                </div>

                @endforeach
            </div>
        </div>


        <div class="col-md-6">

            <div class="form-group">
                <label for="usr">Is your business Registered?</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Yes">
                    <label class="form-check-label" for="exampleRadios1">
                        Yes
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="No">
                    <label class="form-check-label" for="exampleRadios1">
                        No
                    </label>
                </div>


            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Logo</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload ID Card</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Utility bill</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

        </div>





    </div>
</div>