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
            <label for="usr">Website:
                <small>(https://{{$subdomain ? $subdomain : "yourname"}}.365bizconnect.com)</small></label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model="subdomain" placeholder="yourname"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">.365bizconnect.com</span>
                </div>
            </div>
            @endif
            @if($domainchoice == 2)
            <label for="usr">Website:
                <small>(https://{{$domain ? $domain : "yourname"}}.com)</small></label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model="domain" name="domain" placeholder="yourname"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">.com</span>
                </div>
            </div>
            @error('domain') <p style="color:red; font-size:10px;">{{$message}}</p>@enderror

            <button class="btn btn-warning btn-sm" wire:click="checkavailability" wire:loading.attr="disabled">check
                availability</button> @if($msg)<span>{{$msg}}</span>@endif

            <div wire:loading.inline wire:target="checkavailability">
                check in progress
            </div>
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
                <input type="file" class="form-control" name="logo" accept="image/*" wire:model="logo">
            </div>
        </div>
        <div class="col-md-1">
            <br>
            <div style="border-radius:8px; border:1px dashed #ccc; width: 53px; height: 53px;">

                @if($logo)

                <img src="{{$logo->temporaryUrl()}}" width="50" height="50"
                    style="object-fit:cover;border-radius:8px;" />
                @endif

            </div>
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

        <div class="col-md-5">
            <label for="usr"><b>Is your business registered?</b></label>
            <div class="radio">
                <label><input type="radio" wire:model="regstatus" value="1" name="optradio1"> Yes</label>
            </div>
            <div class="radio">
                <label><input type="radio" wire:model="regstatus" value="2" name="optradio1"> No</label>
            </div>
        </div>

        <div class="col-md-6">
            @if($regstatus == 1)
            <div class="form-group">
                <label for="usr">Upload Business Registration Certificate:</label>
                <input type="file" class="form-control" name="cert" accept="image/*" wire:model="cert">
            </div>
            @endif
            @if($regstatus == 2)

            <div class="checkbox">
                <br>
                <label><input type="checkbox" value=""> I want an agent to reach out & Assist me to register

                    my business (Optional)</label>
            </div>
            @endif

        </div>
        @if($regstatus == 1)

        <div class="col-md-1">
            <br>
            <div style="border-radius:8px; border:1px dashed #ccc; width: 53px; height: 53px;">
                @if($regstatus == 1)
                @if($cert)

                <img src="{{$cert->temporaryUrl()}}" width="50" height="50"
                    style="object-fit:cover;border-radius:8px;" />
                @endif
                @endif
            </div>

        </div>
        @endif


        <div class="col-md-12">
            <hr>

        </div>


        <div class="col-md-12">
            <div class="checkbox">
                <label><input type="checkbox" wire:model="acceptpayment"> <b>I want to accept payments via my
                        website</b></label>
            </div>
        </div>
        @if($acceptpayment)

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
                        <input type="file" class="form-control" accept="image/*" wire:model="idcard">
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    <div style="border-radius:8px; border:1px dashed #ccc; width: 53px; height: 53px;">

                        @if($idcard)

                        <img src="{{$idcard->temporaryUrl()}}" width="50" height="50"
                            style="object-fit:cover;border-radius:8px;" />
                        @endif

                    </div>
                </div>


            </div>
        </div>
        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-7">
            <div class="form-group">
                <label for="usr">Upload Proof of Address</label>
                <input type="file" class="form-control" accept="image/*" wire:model="proof">

            </div>

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



        <div class="col-md-5">
            <br>
            <div class="rounded mx-auto d-block" style="border:1px dashed #ccc; width: 260px; height: 260px;">

                @if($proof)

                <img src="{{$proof->temporaryUrl()}}" class="rounded mx-auto d-block" width="250" height="250"
                    style="object-fit:cover;" />
                @endif

            </div>

        </div>
        @endif



    </div>
</div>


@push('scripts')
<script>

</script>
@endpush