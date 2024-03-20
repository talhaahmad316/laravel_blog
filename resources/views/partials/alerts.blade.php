{{-- Add  Category Alert --}}
@if ($messege = Session::get('create'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $messege }}</strong>
    </div>
@endif
{{-- Upadate Category Alert --}}
@if ($messege = Session::get('update'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $messege }}</strong>
    </div>
@endif
{{-- Delete category --}}
@if ($messege = Session::get('delete'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $messege }}</strong>
    </div>
@endif
{{-- error in login alert --}}
@if ($errors->has('error'))
    <div class="alert alert-warning ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $errors->first('error') }}
    </div>
@endif
{{-- User Register Alert --}}
@if ($errors->has('register'))
    <div class="alert alert-success ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $errors->first('register') }}
    </div>
@endif
