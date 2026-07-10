<x-layout>
  <x-slot:title>
    Welcome
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <div class="card gap-4 mt-8">
      @isset($chirps)
        @foreach ($chirps as $chirp)
          <div class="bg-base-100 card-body shadow">
            <h1>{{ $chirp->user ? $chirp->user->name : 'Anon' }}</h1>
            <p>{{ $chirp['message'] }}</p>
            <p>{{ new DateTime($chirp->created_at)->format('j/F/Y h:m:s') }}</p>
          </div>
        @endforeach
      @endisset
    </div>
  </div>

</x-layout>
