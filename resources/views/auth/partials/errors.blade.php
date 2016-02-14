@if(count($errors) > 0)
    <div class="alert alert-danger">
        <i class="icon-remove-sign"></i>
        <strong>抱歉！</strong> {{ $errors->first() }}
    </div>
@endif