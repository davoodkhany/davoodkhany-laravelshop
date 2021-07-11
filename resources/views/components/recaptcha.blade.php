
    <script src="https://www.google.com/recaptcha/api.js?hl=fa"></script>
        <div class="g-recaptcha @error ('g-recaptcha-response') is-invalid @enderror"  data-sitekey="{{ $sitekey }}"></div>

    @error('g-recaptcha-response')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror



