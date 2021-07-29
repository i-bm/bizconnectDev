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
    <div wire:loading.inline>
        check in progress
    </div>
    <div>{{$msg}}</div>
</div>
@endif

<div class="col-md-12">
    <br>
    <div class="form-group">
        <label>Business Description:</label>
        <textarea contenteditable spellcheck="true" class="form-control" rows="4"></textarea>
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




<div class="col-md-6">
    <label for="usr">Upload Business Logo</label>
    <div class="input-group mb-3">

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Upload logo</label>
        </div>
    </div>

    <div class="input-group mb-3">

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>

    <div class="input-group mb-3">

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>

</div>


<div>
    <p class="lead">Complete the form below.</p>


    <div class="row">

        <div class="col-md-6">
            <label for="usr"><b>Website Domain Setup</b></label>
            <div class="radio">
                <label><input type="radio" name="optradio" wire:model="domainchoice" value="1" checked>
                    yourname.365bizconnect.com
                    (Free)</label>
            </div>
            <div class="radio">
                <label><input type="radio" wire:model="domainchoice" value="2" name="optradio"> I want my preferred
                    domain
                    name.<small>(GHS 100.00)</small>
                </label>
            </div>
        </div>

        <div class="col-md-6">
            @if($domainchoice == 1)
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="yourname" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">.365bizconnect.com</span>
                </div>
            </div>
            @endif
            @if($domainchoice == 2)
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="yourname" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">.com</span>
                </div>
            </div>
            <button class="btn btn-warning btn-sm">check availability</button>
            <span>www.test.com</span>

            @endif


        </div>

        <div class="col-md-12">
            <hr>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="usr">Business Name:</label>
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="usr">Upload Business Logo:</label>
                <input type="file" class="form-control" accept="image/*" onchange="loadLogo(event)">
            </div>
        </div>
        <div class="col-md-1">
            <br>
            <img id="outputlogo" style="border-radius:8px; border:1px dashed #ccc; object-fit:cover;" width="50"
                height="50" />
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="usr">Business Description:</label>
                <textarea rows="5" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="usr">Business Slogan/Motto:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Business Address:</label>
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="usr">Business Phone No.:</label>
                <input type="text" class="form-control">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="usr">Business Whatsapp No.:</label>
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="usr">Business Email:</label>
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="col-md-12">
            <hr>
            <label for="usr"><b>Business Focus/scope:</b></label>
        </div>

        @foreach($categories as $category)

        <div class="col-md-3">
            <div class="checkbox">
                <label><input type="checkbox" value=""> {{$category->name}}</label>
            </div>
        </div>

        @endforeach

        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-4">
            <label for="usr"><b>Is your business registered?</b></label>
            <div class="radio">
                <label><input type="radio" wire:model="regstatus" value="1" name="optradio1"> Yes</label>
            </div>
            <div class="radio">
                <label><input type="radio" wire:model="regstatus" value="2" name="optradio1"> No</label>
            </div>
        </div>

        <div class="col-md-7">
            @if($regstatus == 1)
            <div class="form-group">
                <label for="usr">Upload Business Registration Certificate:</label>
                <input type="file" class="form-control" accept="image/*" onchange="loadReg(event)">
            </div>
            @endif
            @if($regstatus == 2)

            <div class="checkbox">
                <label><input type="checkbox" value=""> I want an agent to reach out & Assist me to register

                    my business (Optional)</label>
            </div>
            @endif

        </div>

        <div class="col-md-1">
            @if($regstatus == 1)

            <br>
            <img id="outputreg" style="border-radius:8px; border:1px dashed #ccc; object-fit:cover;" width="50"
                height="50" />
            @endif

        </div>


        <div class="col-md-12">
            <hr>
        </div>


        <div class="col-md-12">
            <div class="checkbox">
                <label><input type="checkbox" value=""> <b>I want to accept payments via my website</b></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="usr">Residential Address:</label>
                <textarea rows="3" class="form-control"></textarea>
            </div>

            <div class="checkbox">
                <label><input type="checkbox" value=""> Same as business address</label>
            </div>
        </div>


        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sel1">Nationality:</label>
                        <select class="form-control" id="nat">
                            <option>Ghanaian</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sel1">Identification Type:</label>
                        <select class="form-control" id="identification">
                            <option value="">Choose Type</option>
                            <option>Passport</option>
                            <option>Driver's License</option>
                            <option>National ID Card</option>
                            <option>Voter's ID Card</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <label for="usr">Upload Copy of identification Document:</label>
                        <input type="file" class="form-control" accept="image/*" onchange="loadID(event)">
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    <img id="outputid" style="border-radius:8px; border:1px dashed #ccc; object-fit:cover;" width="50"
                        height="50" />
                </div>


            </div>
        </div>
        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="usr">Upload Proof of Address</label>
                <input type="file" class="form-control" accept="image/*" onchange="loadProof(event)">

            </div>


        </div>

        <div class="col-md-1">
            <br>
            <img id="outputproof" style="border-radius:8px; border:1px dashed #ccc; object-fit:cover;" width="50"
                height="50" />
        </div>

        <div class="col-md-5">
            <label for="usr">Important Notice*:</label>
            <p> <small class="text-muted">Proof of address can be any of these documents, not more than 6 months old.
                    <b>The address on the uploaded document should match the business/residential address</b>
                </small>

            <ul>
                <small class="text-muted">
                    <li>Utility bill (Water or Electricity)</li>
                    <li>Bank statement showing current address.</li>
                    <li>Tax assessment</li>
                    <li>Cable TV bill such as DSTV bill</li>
                </small>
                <ul>
                    </p>

        </div>




    </div>
</div>


@push('scripts')
<script>
var loadProof = function(event) {
    var output = document.getElementById('outputproof');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

var loadID = function(event) {
    var output = document.getElementById('outputid');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

var loadReg = function(event) {
    var output = document.getElementById('outputreg');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

var loadLogo = function(event) {
    var output = document.getElementById('outputlogo');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
</script>
@endpush