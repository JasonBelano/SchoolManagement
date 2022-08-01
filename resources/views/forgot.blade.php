@extends('layout.blank')

@section('content')

<form>
    <!-- Name input --> 
   <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="form5Example2" class="form-control" />
      <label class="form-label" for="form5Example2">Email address</label>
    </div>
    <!-- Checkbox -->
    <!-- Submit button -->
    <div>
    <button type="submit" class="btn btn-primary btn-block mb-4">Send Verification</button>
    <button type="submit" class="btn btn-primary btn-block mb-4" onclick="window.location='/login.php';">Back</button>
    </div>
  </form>
   
@endsection