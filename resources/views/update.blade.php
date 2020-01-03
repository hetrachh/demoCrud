<form action="{{ url('/edit',array($Employee->id)) }}" method="POST">
  {{ csrf_field() }}
  @if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
  @endif
  <label for="title">Email</label>
    <input type="text"  name="email" value="<?php echo $Employee->EmailId ?>"  placeholder="Enter Email">
  <label for="desc">Contact Number</label>
    <input type="text"  name="phno" value="<?php echo $Employee->ContactNumber ?>" placeholder="Enter Phno">
  <button type="submit" >Update</button>
  <a href="{{ url('/') }}"  >Back</a>
</form>