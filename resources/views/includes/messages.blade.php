{{--  @if(count($errors)>0))
    @foreach($errors->all() as $error)
        
        <div class="alert alert-danger">
  <strong>Danger!</strong> {{$error}}
</div>
    @endforeach
@endif  --}}
@if(session('success'))
<div class="alert alert-success">
  <strong>Success!</strong> {{session('success')}}.
</div>
@endif
 
@if(session('error'))
<div class="alert alert-danger">
  <strong>Danger!</strong> {{session('error')}}
</div>
    
@endif


