@include ('frontend.include.header')

<div class="container">
    <h5><u>পেমেন্ট সংগ্রহ করুন</u> </h5>
    <div class="row">

        <div class="col-md-4">
            <label for="service_charge" class="col-form-label">নিবন্ধন চার্জ (টাকা)</label>
            <input type="text" name="service_charge" id="service_charge" value="" class="form-control">
        </div>
        <div class="col-sm-4">
            <label for="payment_type" class="col-form-label">পেমেন্ট প্রকার <span style="color: red">*</span></label>
            <select name="payment_type" id="payment_type" class="form-control" required>
                <option value="" selected disabled>নির্বাচন করুন</option>
                @forelse($payment_methods as $method)
                    <option value="" >{{ $method->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div><br><br>
</div>


@include ('frontend.include.footer')
