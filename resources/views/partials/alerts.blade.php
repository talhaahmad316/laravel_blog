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