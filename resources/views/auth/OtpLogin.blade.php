<div>
    <h1>Login with mobile</h1>
    @if(session('error'))
        <div style='color: red'>
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('otp.generate') }}" method="post">
        @csrf
        <label>Enter Mobile</label>
        <br>
        <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" require placeholder="Enter your registered mobile no.">
        <br>
        @error('mobile_no')
            <strong style='color: red'>
                {{ $message }}
            </strong>
        @enderror
        <br>
        <button type="submit">Generate OTP</button>
    </form>
</div>