<x-layout>
  <fieldset class="fieldset bg-base-100 border-base-300 rounded-box w-lg border p-4">
    <legend class="fieldset-legend">Login</legend>
    <form action="/login" method="post" class="flex flex-col *:*:w-full">
      @csrf
      <div class="mb-5">
        <label for="email" class="label">Email</label>
        <input type="email" name="email" id="email" class="input" placeholder="Email" />
        @error('email')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-5">
        <label for="password" class="label">Password</label>
        <input type="password" name="password" id="password" class="input" placeholder="Password" />
        @error('password')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn btn-neutral w-fit! self-end px-4 mt-4">Login</button>
    </form>
  </fieldset>
</x-layout>
