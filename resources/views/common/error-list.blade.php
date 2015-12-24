@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>{{ $error }}</strong>
</div>
@endForeach
@endif