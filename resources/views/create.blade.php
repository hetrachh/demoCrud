<form action="{{ url('/insert') }}" method="POST">
  {{ csrf_field() }}
    @if (count($errors)>0)
      @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
    @endif
  <label for="name">Name</label>
    <input type="text" class="form-control" name="name"  placeholder="Enter name">
  <label for="email">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Enter Email">
  <label for="phno">Contact Number</label>
    <input type="text" class="form-control" name="phno" placeholder="Enter ContactNumber">
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ url('/') }}"  class="btn btn-primary">Back</a>
</form>
