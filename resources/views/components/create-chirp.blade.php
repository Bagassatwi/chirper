<div class="card shadow rounded-md">
  <form class="card-body bg-base-100" action="/upload-chirp" method="POST">
    @csrf
    <textarea class="border border-gray-500 rounded-md p-4" name="chirp" id="chirp" cols="30" rows="10"
      placeholder="What's on your mind?"></textarea>
    @error('chirp')
      <p class="text-red-500"> {{ $message }}</p>
    @enderror
    @if (session('error'))
      <p class="text-red-500 font-bold mb-4">{{ session('error') }}</p>
    @endif
    <div class="self-end">
      <button class="btn btn-secondary">Clear</button>
      <button type="submit" class="btn btn-primary">Post</button>
    </div>
  </form>
</div>
