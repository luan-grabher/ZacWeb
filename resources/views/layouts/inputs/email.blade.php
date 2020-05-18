<div class="form-group row">
    <label for="email"
           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}:</label>

    <div class="col-md-6">
        <div class="input-group">
            <input id="email_fake" type="text"
                   class="form-control @error('email') is-invalid @enderror" name="email_fake"
                   value="{{ old('email') }}" required autofocus
                   onchange="$('#email').val(this.value  +'@' + '{{env('MAIL_DOMAIN')}}')"
            >
            <div class="input-group-append">
                <label class="input-group-text">@ {{env('MAIL_DOMAIN')}}</label>
            </div>
        </div>

        <input class='d-none' id="email" name="email" type="email" value="" required>

        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
